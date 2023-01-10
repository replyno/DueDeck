<div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-body shadow px-4 py-4">
            <form wire:submit.prevent="saveform()" class="needs-validation">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" wire:model="name" autocomplete="off"  maxlength="50" id="yourName"
                                placeholder="full Name" required>
                            <label for="yourName">Your Name *</label>
                        </div>
                        <div class="invalid-feedback">Please enter your name</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 has-validation">
                            <input type="email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" autocomplete="off"  class="form-control" wire:model="email" id="BusineesEmail"
                                placeholder="email id" maxlength="50" required>
                            <label for="BusineesEmail">Business Email id *</label>
                        </div>
                        <div class="invalid-feedback">Please enter email id</div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text text-success"><i
                                    class="bi bi-whatsapp"></i></span>
                            <div class="form-floating  has-validation">
                                <input type="tel" pattern="[789][0-9]{9}" class="form-control" autocomplete="off"  maxlength="10" wire:model="contact_no" id="whatsappNo"
                                    placeholder="WahtasApp No." required>
                                <label for="whatsappNo">WhatsApp No *</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3  has-validation">
                            <input type="text" class="form-control" autocomplete="off"  wire:model="city" id="CityName" maxlength="10" placeholder="City"
                                required>
                            <label for="CityName">City/Town *</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3  has-validation">
                            <input type="text" class="form-control" autocomplete="off"  wire:model="firm_name" id="FirmName"
                                placeholder="email id" maxlength="50" required>
                            <label for="FirmName">Firm Name *</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 "> 
                            <input type="text" class="form-control" autocomplete="off"  maxlength="10" wire:model="membership_no" id="MembershipNo"
                                placeholder="ICAI Membership name">
                            <label for="MembershipNo">ICAI Membership No.</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text text-success"><i
                                    class="bi bi-link-45deg"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" autocomplete="off"  maxlength="100" wire:model="company_url" id="CompanyURL"
                                    placeholder="WahtasApp No.">
                                <label for="CompanyURL">Company URL</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" autocomplete="off" class="form-control" placeholder="Enter Captcha" wire:model="enteredcaptcha" id="cpatchaTextBox" required/>
                                <label for="CompanyURL">Enter Captcha</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div id="captcha"></div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-duedeck px-5 py-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
<script>
    var code;

    document.addEventListener('livewire:load', function(){
        createCaptcha();
    });

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
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
  @this.originalcaptcha = code;
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
    if(e.detail.refresh == 1){
        createCaptcha();
    }
    if(e.detail.sweetalert == 1){
        Swal.fire({
            imageUrl: "{{ asset('images/duedeck-R.svg') }}",
            imageWidth: 180,
            imageHeight: 50,
            imageAlt: 'Custom image',
            title: 'Thank you for the details',
            html: 'Our representative will call you to schedule demo as per your convenience.',
        })
    }
});

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