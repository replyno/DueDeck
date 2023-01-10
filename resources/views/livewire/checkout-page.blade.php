<div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="row mt-4">
          <div class="col-12 border-bottom mb-4">
              <h2 class="h4 font-bold">Checkout</h2>
          </div>
        <div class="col-md-4">
            <p class="font-medium font-18">Plan Details</p>
            <div class="card pricing-card">
          <div class="card-header text-center">
              <h4 class="plan-name">{{ $package['name'] }}</h4>
              <p class="price"><strike style="margin-right: 20px;">₹
                  @if($package['amount'] == 4999.00)  
                    9,999.00
                  @endif
                  @if($package['amount'] == 5999.00)  
                    11,999.00
                  @endif
                  @if($package['amount'] == 7999.00)  
                    15,999.00
                  @endif
                </strike>  ₹
                {{ $package['amount'] }}</p>
          </div>
          <div class="card-body border-bottom font-15">
                @foreach(collect($package['packages'])->where('isaddon', 0)->where('isactive', 1)->where('function_id', '!=', 5)->sortBy('function.functionorder') as $feature)
                  <div class="d-flex justify-content-between">
                    <p class="font-medium mb-0">{{ $feature['function']['name'] }} Count</p>
                    <p class="mb-0">Upto 
                    <?php if($feature['function']['name'] == 'Space'){  
                        $size = $feature['no_of_count'];
                        $units = array( 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                        $power = $size > 0 ? floor(log($size, 1024)) : 0;
                        $space = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                        echo $space;
                      }else{
                        echo $feature['no_of_count'];
                      }   
                    ?>
                    {{ $feature['function']['name'] }}</p>
                  </div>
                @endforeach
          </div>
          <div class="card-body border-bottom">
              <h4 class="text-center font-medium font-18 mb-3">Modules</h4>
              <div class="row justify-content-center">
                @foreach (explode(",", $package['modulenames']) as $menu)
                <div class="col-md-6">
                  <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span> {{ $menu }}</p>
                </div>
                @endforeach
                <div class="col-md-6">
                  <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span> Email 
                  @if($package['name'] == 'Scale')
                    & Phone
                    @endif
                  Support</p>
                </div>
                <div class="col-md-6">
                  <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span> Recorded Training Content</p>
                </div>
              </div>
          </div>
          <div class="card-body text-center">
          <h4 class="font-medium font-16">Mobile Application</h4>
          <p class="font-14">Client charged from Play Store - Upcoming</p>

          </div>
      </div>
        </div>
        <div class="col-md-5">
            <h4 class="font-18 mb-4 font-medium">Get Addon</h4>
            <div class="card">
                @if(sizeof($addons) == 0)
                <div class="card-body border-bottom">
                    <div class="row align-items-center">
                        <p style="text-align: center;">No Addons found</p>
                    </div>
                </div>
                @endif
                @foreach ($addons as $addon)
              <div class="card-body border-bottom">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    <label class="mb-0">{{ $addon['function']['name'] }}</label>
                    <p class="mb-2 childclass" style="font-size: 12px;">( ₹
                        {{ number_format($addon['amount'] / $addon['no_of_count'], 2) }}/
                        @if ($addon['function_id'] == 3)
                            MB
                        @else
                            {{ $addon['function']['name'] }}
                        @endif

                        @if ($addon['function_id'] == 2)
                            , Per Year
                        @endif
                        )
                    </p>
                </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <button class="btn btn-outline-secondary" wire:click="plusminus({{ $addon['function_id'] }}, -1, {{ $addon['amount'] }}, {{ $addon['no_of_count'] }})" type="button">-</button>
                        <input type="number" class="count" onKeyPress="if(this.value.length==5) return false;" min="0"
                        oninput="this.value = Math.abs(this.value)"
                        wire:model="addonfunction.addon.{{ $addon['function_id'] }}.quantity"
                        value="1" id="{{ $addon['id'] }}input"
                        wire:input="plusminus({{ $addon['function_id'] }}, 0, {{ $addon['amount'] }}, {{ $addon['no_of_count'] }})">
                      <button class="btn btn-outline-secondary" type="button" wire:click="plusminus({{ $addon['function_id'] }}, 1, {{ $addon['amount'] }}, {{ $addon['no_of_count'] }})">+</button>
                    </div>
                  </div>
                  @if($addonfunction['addon'])
                  <div class="col-md-3">
                    <label class="mb-0" style="float: right">₹ {{ number_format($addonfunction['addon'][$addon['function_id']]['total'], 2) }}</label>
                  </div>
                  @endif
                </div>
              </div>
              @endforeach
            @if (collect($addonmodules)->isNotEmpty())
            <div class="card-body border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <b style="font-size: 16px;">
                            Addon Modules
                        </b>
                    </div>
                </div>
            </div>
            @endif
            @foreach ($addonmodules as $addonmodule)

                <div class="card-body border-bottom">
                    <div class="row align-items-center">
                      <div class="col-md-6">
                    <b>{{ $addonmodule['modules']['mastermodule_name'] ?? '' }}</b>
                    <p class="mb-2 childclass">( ₹
                        {{ number_format($addonmodule['package']['amount'] / $addonmodule['package']['no_of_count'], 2) }}/
                        Per Year
                        )
                    </p>
                </div>
                    <div class="col-md-2">
                        <div class="form-check" style="float:right !important">
                            <input class="form-check-input addonsformodules" type="checkbox"
                                onchange="addasaddon({{ $addonmodule['package']['function_id'] }},$(this).is(':checked'),{{ $addonmodule['id'] }},{{ $addonmodule['package']['amount'] }}, {{ $addonmodule['package']['no_of_count'] }})">
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: end; ">
                        <p style="float:right !important" class="col-md-12 childclass">₹
                            {{ array_key_exists($addonmodule['id'], $pickedmodules) ? number_format($pickedmodules[$addonmodule['id']]['total'], 2) : 0.0 }}
                        </p>
                    </div>
            </div>
        </div>
            @endforeach
        </div>

    </div>
        <div class="col-md-3">
        <h4 class="font-18 mb-4 font-medium">Order Detail</h4>
            <div class="card">
                <div class="card-body">
                <div class="input-group mb-3">
                    <label class="m-7 col-sm-5">Select Validity</label>
                    <select wire:model="validity" id="" class="form-control col-sm-6">
                        @foreach ($validities as $year)
                            <option value="{{ $year['id'] }}">{{ $year['validity_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <form wire:submit.prevent="applydiscount()">
                <div class="input-group mb-3">
                        <input type="text" class="form-control" wire:model="coupon_code" maxlength="20" required placeholder="Apply Coupon Code" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Apply</button>                    
                </div>
                </form>
                <div class="input-group" style="margin-bottom: -20px;margin-left: 5px;">
                <p id="invalid" style="color:red;"></p>
                <p id="valid" style="color:#02be11;"></p>
            </div>

                <div class="card p-3 bg-light border-0">
                    <div class="card-header bg-light mb-2 ps-0">
                        <h4 class="font-16">Order Summary</h4>
                    </div>
                    <table>
                        <tr>
                            <td class="py-2">Total:</td>
                            <td class="text-end py-2">&#8377; {{ number_format($total_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="py-2">Discount:</td>
                            <td class="text-end">&#8377; {{ number_format($discount_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="py-2">SubTotal:</td>
                            <td class="text-end py-2">&#8377; {{ number_format($subtotal_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="py-2">Tax:</td>
                            <td class="text-end">&#8377; {{ number_format($CGST + $SGST, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Grand Total:</td>
                            <td class="text-end font-medium">&#8377; {{ number_format($grandtotal, 2) }}</td>
                        </tr>
                    </table>

                </div>
                <div class="text-center mt-3">
                        <button class="btn btn-duedeck" data-bs-toggle="modal" data-bs-target="#companyDetail">Procced to Checkout</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- company Detail Modal  -->
    <div class="modal fade" id="companyDetail" wire:ignore.self tabindex="-1" aria-labelledby="companyDetailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-medium" id="companyDetailLabel">Company Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closebtn"
                    aria-label="Close"></button>
            </div>


            <div class="modal-body form-style">
                <form wire:submit.prevent="saveform()">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Comapny Name <r style="color: red;">*</r></label>
                        <input type="text" class="form-control" wire:model="branch.branch_name" required
                            placeholder="Enter Comapny Name" maxlength="50">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Owner/Admin Name <r style="color: red;">*</r></label>
                        <input type="text" class="form-control" wire:model="branch.name" maxlength="50" required placeholder="Enter Admin Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Contact No. <r style="color: red;">*</r></label>
                        <input type='tel' pattern="[789][0-9]{9}" class="form-control" wire:model="branch.contact_no"
                        maxlength="10" required placeholder="Enter Contact No.">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Email ID <r style="color: red;">*</r></label>
                        <input type="email"  pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" class="form-control" wire:model="branch.email" required placeholder="Enter Email ID">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">GST No. </label>
                        <input type="text" class="form-control" wire:model="branch.gstno" maxlength="15" placeholder="Enter GST No.">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">PAN No. </label>
                        <input type="text" class="form-control" wire:model="branch.pan_no" maxlength="10"
                        style="text-transform:uppercase;" placeholder="Enter PAN No.">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Membership No. </label>
                        <input type="text" class="form-control" maxlength="6" wire:model="branch.membership_no" placeholder="Enter Membership No.">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">State <r style="color: red;">*</r></label>
                        <select class="form-select" wire:model="branch.branchstate" wire:click="getcities()" aria-label="Default select example">
                            <option value="" selected>Select</option>
                            @foreach ($states as $state)
                                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">City <r style="color: red;">*</r></label>
                        <select class="form-select" wire:model="branch.city_id" {{ $disablecity }} aria-label="Default select example">
                            <option value="" selected>Select</option>
                            @if(isset($cities))
                                @foreach ($cities as $city)
                                    <option value="{{ $city['id'] }}">{{ $city['city'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Pincode <r style="color: red;">*</r></label>
                        <input type="text" class="form-control" oninput="this.value = Math.abs(this.value)" maxlength="6" wire:model="branch.pincode" required placeholder="Enter Pincode">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="">Address <r style="color: red;">*</r></label>
                        <input type="text" class="form-control" wire:model="branch.address" maxlength="100" required placeholder="Enter Address">
                    </div>
                    <div class="col-12 pt-3">
                        <p class="font-medium">Contact Person Details</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Contact Person Name <r style="color: red;">*</r></label>
                        <input type="text" class="form-control" wire:model="branch.contact_person_name" required
                            placeholder="Enter Contact Person Name" maxlength="50">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Contact No. <r style="color: red;">*</r></label>
                        <input type='tel' pattern="[789][0-9]{9}" maxlength="10" class="form-control" wire:model="branch.contact_person_no" required
                            placeholder="Enter Contact No.">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Email ID <r style="color: red;">*</r></label>
                        <input type='email' pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" maxlength="50" class="form-control" wire:model="branch.contact_person_email" required placeholder="Enter Email ID">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Captcha <r style="color: red;">*</r></label>
                        <input type='text' maxlength="50" class="form-control" wire:model="captcha" required placeholder="Enter Captcha">
                    </div>

                    <div class="col-md-4 mb-3">
                        <br>
                        <div id="captcha"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p>The DueDeck would like to keep you informed with personalized emails about
                            products and services. See our <a href="/privacypolicy"
                                target="_blank">Privacy Policy</a> for more details.</p>
                        <p><input type="checkbox" required> I agree that I have read and accepted the <a
                                href="/termsconditions" target="_blank">Terms & Conditions.</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-duedeck" type="submit" wire:loading.attr="disabled"
                wire:target="saveform">Proceed to Payment</button>
            </div>
        </form>
        </div>
    </div>
</div>

</div>

<style>
    input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        display: none;

      }
      .count{
        width: 50px!important;
        text-align: center;
      }
      .m-7{
        margin: 7px;
      }
      /* #captcha{
        background: linear-gradient(90deg, rgb(2 0 36 / 63%) 0%, rgb(121 81 9) 35%, rgba(0,212,255,1) 100%);
        height: 34px;
        width: 100%;
      } */
</style>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
<script>

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


    window.addEventListener('unselectcheckboxes', function(e) {
        $(".addonsformodules").prop('checked', false);
    })

    function addasaddon(function_id, status, packagemastermodule_id, amount, no_of_count) {
        Livewire.emit('assignaddonmodule', function_id, status, packagemastermodule_id, amount, no_of_count);
    }

    window.addEventListener('iztoast', function(e) {
    if(e.detail.status == 0){
      iziToast.error({displayMode: 1, position: "center", message: e.detail.title});
    }
    if(e.detail.status == 1){
      iziToast.success({displayMode: 1,position: "center", message: e.detail.title});
    }
    if(e.detail.close == 1){
        $('#closebtn').click();
    }

    if(e.detail.coupon == 0){
        $('#invalid').html(e.detail.title);
    }

    if(e.detail.coupon == 1){
        $('#valid').html(e.detail.title);
    }

    if(e.detail.refresh == 1){
        createCaptcha();
    }
});

window.addEventListener('razorpay', function(e) {

    var amount = @this.grandtotal;

console.log(amount * 100);
var options = {
    "key": "rzp_live_U88cXlzkto7hqh", // Enter the Key ID generated from the Dashboard
    //"key": "rzp_test_loGomvWSDOcJu0",
    "amount": parseFloat(amount * 100).toFixed(
        2
    ), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Eligo Apptech Pvt. Ltd.",
    "description": "Live Transaction",
    "image": "{{ asset('images/eligo_favicon.png') }}",
    "handler": function(response) {

        var razorpayid = response.razorpay_payment_id;
        console.log(razorpayid);

            Livewire.emit('proceedtopayment', razorpayid);
    },
    "prefill": {
        "name": @this.branch['branch_name'],
        "email": @this.branch['email'],
        "contact": @this.branch['contact_no']
    },
    "notes": {
        "address": "Pune"
    },
    "theme": {
        "color": "rgb(4,204,244)"
    }
};

var rzp1 = new Razorpay(options);
rzp1.open();
// e.preventDefault();
});
</script>
