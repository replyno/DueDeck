<div>
    <div class="card-body" id="enquiry_form">
        <h3 class="font-18 font-medium mb-3">Send Inquiry Now</h3>
        <form wire:submit.prevent="submitdetails()" class="needs-validation" novalidate>
            <div class="row">
                <!-- @if($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                </div>
                @endif -->
                <div class="col-md-12">
                    <div class="form-floating mb-3 has-validation">
                        <input type="text" class="form-control" wire:model="name" maxlength="50" id="yourName"
                            autocomplete="off" placeholder="full Name" required>
                        <label for="yourName">Your Name *</label>
                    </div>
                    {{-- <div class="invalid-feedback">Please enter your name</div> --}}

                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3 has-validation">
                        <input type="email" class="form-control" wire:model="email"  maxlength="50" id="BusineesEmail"
                            autocomplete="off" placeholder="email id" required>
                        <label for="BusineesEmail"> Email id *</label>
                    </div>
                    {{-- <div class="invalid-feedback">Please enter email id</div> --}}
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3 has-validation">
                        <input type="tel" class="form-control" wire:model="contact_no" id="MobileNo"
                            autocomplete="off" placeholder="email id"  maxlength="10" required>
                        <label for="MobileNo">Mobile Number *</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control h-auto" rows="3"  maxlength="255" wire:model="message" autocomplete="off" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Message</label>
                    </div>
                    @error('message')
                        <div class="alert alert-danger danger-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Enter Captcha" wire:model="enteredcaptcha" id="cpatchaTextBox" required/>
                    </div>
                    <div class="col-sm-4">
                    <div id="captcha"></div>
                    </div>
                </div>
                <div wire:ignore class="alert alert-danger" id="captchavalue" style="display: none;">The Captcha field is required.</div>
                <div wire:ignore class="alert alert-danger" id="invalid" style="display: none;">Invalid Captcha. Try Again</div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" wire:loading.attr="disabled" style="cursor: pointer;" wire:target="submitdetails" class="btn btn-duedeck px-5 py-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .swal2-styled.swal2-confirm {
    background-color: #0789b5;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
<script type="text/javascript">
    var code;
function createCaptcha() {
  //clear the contents of captcha div first
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  @this.originalcaptcha = code;
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}
function validateCaptcha() {
  event.preventDefault();
  debugger
  if (document.getElementById("cpatchaTextBox").value == code) {
    document.getElementById("invalid").style.display = "none";

  }else{
    // alert("Invalid Captcha. try Again");
    createCaptcha();
    document.getElementById("invalid").style.display = "block";

  }
}

window.addEventListener('iztoast', function(e) {
    if(e.detail.status == 0){
      iziToast.error({title: 'Error', displayMode: 1,position: "center", message: e.detail.title});
    }
    if(e.detail.animate == 1){
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }

    if(e.detail.sweetalert == 1){
        Swal.fire({
            imageUrl: "{{ asset('images/duedeck-R.svg') }}",
            imageWidth: 180,
            imageHeight: 50,
            imageAlt: 'Custom image',
            title: 'Thank you.',
            html: 'The form has been submitted successfully. Our representative will get in touch with you shortly.',
        })
    }
    
});


window.addEventListener('captcha', function(e) {
    console.log(e.detail.status);
    if(e.detail.status == 0){
        document.getElementById("captchavalue").style.display = "block";
    }
    if(e.detail.status == 1){
        validateCaptcha();
        document.getElementById("captchavalue").style.display = "none";
    }
    if(e.detail.status == 2){
        $('.alert-danger').hide();
    }
    if(e.detail.validate == 1){
        iziToast.show({
            title: 'Hey',
            message: 'What would you like to add?'
        });

        Livewire.emit('getvalidate');
    }
    if(e.detail.validate == 2){
        $('.danger-message').hide();
    }

    if(e.detail.createcaptcha == 1){
        createCaptcha();
    }
    
})

document.addEventListener('livewire:load', function(){

$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
    // Convert key-value pairs to JSON
    // https://stackoverflow.com/a/39284735/452587
    data = data.trim().split('\n').reduce(function(obj, pair) {
        pair = pair.split('=');
        return obj[pair[0]] = pair[1], obj;
    }, {});
    console.log(data.ip);
    // if(isset(@this.ip)){
        @this.ip = data.ip
    // }
    // $('.group_name').val(data.ip);
});

});
  </script>
