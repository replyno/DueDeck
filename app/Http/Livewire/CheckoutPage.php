<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CheckoutPage extends Component
{
    public $package_id,$branch,$package,$addons,$addonmodules,$validity=1,$validities,$addonfunction,$tabselectionstatus;
    public $addon_amount,$total_amount,$package_amount,$discount,$discount_amount,$coupon_code,$originalcaptcha,$captcha;
    public $addonfunctiondata,$defaultmodules;
    public $subtotal_amount,$grandtotal,$CGST,$SGST,$ismoduleperyear=1;
    public $states,$cities,$branch_id;
    public $extrafeatures = 'disabled';
    public $disablecity = 'disabled';
    public $pickedmodules = [];

    protected $listeners = [
        'proceedtopayment',
        'assignaddonmodule',
    ];

    public $attributeNames = array(
        'branch_name' => 'Company Name',
        'name' => 'Admin Name',
        'contact_no' => 'Admin Contact No.',
        'email' => 'Admin Email',
        'branchstate' => 'State',
        'city_id' => 'City',
        'address' => 'Address',
        'pincode' => 'Pincode',
        'gstno' => 'GST No.',
        'pan_no' => 'PAN Card No.',
        'contact_person_name' => 'Contact Person Name',
        'contact_person_no' => 'Contact Person No.',
        'contact_person_email' => 'Contact Person Email',
        'paymentoption' => 'Payment Method',
     );

    public function mount()
    {
        $this->addonfunction['default'] = [];
        $this->addonfunction['addon'] = [];

        $response = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/checkoutPackage/'.$this->package_id);
        $object = $response->collect();
        
        $this->package = $object['package'];
        $this->addons = $object['addon'];
        $this->addonmodules = $object['addonmodules'];

        $this->defaultmodules = $object['defaultmodules'];
        $this->validities = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/getValidity')->collect();
        
        $this->states = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/getState')->collect();
        //set onn and off for extra features
        if($this->validity > 0){
            $this->extrafeatures = "";
        }else{
            $this->extrafeatures = "disabled";
        }
        $this->buynow($this->package_id);
        // $this->plusminus(1, 0, 10, 1,false);
        
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }

    public function getcities()
    {
        if (isset($this->branch['branchstate'])) {
            $this->disablecity = '';
            $this->cities = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/getCity', ['state_id' => $this->branch['branchstate']])->collect();
        }
    }

    public function plusminus($id, $value, $amount, $no_of_count,$noaddon=true)
    {
        $validity = $this->validity;

        if($validity == 0){
            $this->dispatchBrowserEvent('iztoast', ['title' => "Please select validity", "status" => 0]);
            return false;
        }
        if(array_key_exists($id,$this->addonfunction['addon'])){
            if($value >= 0 || $this->addonfunction['addon'][$id]['quantity'] >= 0){
                $this->addonfunction['addon'][$id]['quantity'] = intval($this->addonfunction['addon'][$id]['quantity']) + $value;

                if($this->addonfunction['addon'][$id]['quantity'] == -1){
                    $this->addonfunction['addon'][$id]['quantity'] = 0;
                }
                if($this->addonfunction['addon'][$id]['isyear'] == 1){
                    $this->addonfunction['addon'][$id]['total'] = (intval($this->addonfunction['addon'][$id]['quantity']) * $amount/$no_of_count) * $validity;
                }else{
                    $this->addonfunction['addon'][$id]['total'] = (intval($this->addonfunction['addon'][$id]['quantity']) * $amount/$no_of_count);
                }
                $this->calcuteaddonvalues();
                
                $this->total_amount = $this->package_amount + $this->addon_amount;
                if($noaddon==true){
                    $this->applydiscount();
                }
            }
        }
    }

    public function updatedValidity($id)
    {
        $this->buynow($this->package_id,$id);
    }

    public function buynow($id,$validity=NULL)
    {
        $getaddons = false; //added for gettig addon modules
        //get data if validity changed
        if($validity){
            $this->validity=$validity;
        }else{
            $this->validity = $this->validity;
            $getaddons = true;
        }

        //if $getaddons = true then get addons data

        if($getaddons == true){
            // while changing packages empty the addons and selected modules
            $this->pickedmodules = [];
            //get addons and defaults of package
            $this->getaddons($id);

        }
        //make addon amount 0
        $this->emptyaddons();

            $this->disabledselect = '';
            //$package = PackageName::find($id);
            $this->package_name = $this->package['name'];
            //newly added code for validity wise price
            $this->package_amount = $this->package['amount'] * $this->validity;
            // $this->calcuteaddonvalues();
            $this->total_amount = $this->package_amount + $this->addon_amount;
            
            //only reload data of addons
            $this->getselectedaddons();
            //calculate total
            $this->applydiscount();
            // $this->total_amount = $this->package_amount + $this->addon_amount;
    }

    public function getaddons($package_id){
        $this->addonfunction['default'] = [];
        $this->addonfunction['addon'] = [];
        $this->addonfunction = [];
        $this->addons = [];
        $response = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/checkoutPackage/'.$package_id);
        $object = $response->collect();
        
        $addonfunctiondata = $object['addonfunctiondata'];
        $this->addons = $object['addon'];
        //get addons of package
        foreach ($addonfunctiondata as $value) {
            $value['quantity'] = 0;
            $value['total'] = 0;
            $value['isyear'] = $value['function']['isyear'];
            $value['packagemastermodule_id'] = NULL;
            if($value['isaddon']==0){
                $this->addonfunction['default'][$value['function_id']]=$value;
            }else{
                $this->addonfunction['addon'][$value['function_id']]=$value;
            }
        }
        
        //get already default modules
        foreach($this->defaultmodules as $defaultpackage){
                    $data = $defaultpackage['package']['function'];
                    $data['no_of_count'] = $defaultpackage['package']['no_of_count'];
                    $data['amount'] = $defaultpackage['package']['amount'];
                    $data['quantity'] = 1;
                    $data['total'] = 0;
                    $data['isactive'] = 1;
                    $data['isaddon'] = 0;
                    $data['packagemastermodule_id'] = $defaultpackage['id'];
                    $this->pickedmodules[$defaultpackage['id']]=$data;
                }
                // dd($this->addonfunction);               
    }

    public function emptyaddons(){
        $this->addon_amount = 0;
        //make total amount = 0;
        $this->total_amount = 0;
        //make package_amount = 0
        $this->package_amount = 0;
    }

    public function getselectedaddons(){
        //false added for no discount value
        foreach($this->addonfunction['addon'] ?? [] as $addonmodule){
            $this->plusminus($addonmodule['function_id'], 0,$addonmodule['amount'],$addonmodule['no_of_count'],true);
        }
        //get addon modules
        foreach($this->addonmodules as $addonmodule){
            if(array_key_exists($addonmodule['id'],$this->pickedmodules)){
                if($this->pickedmodules[$addonmodule['id']]['isactive']==1){
                    $this->assignaddonmodule($addonmodule['package']['function_id'],true,$addonmodule['id'],$addonmodule['package']['amount'], $addonmodule['package']['no_of_count'],true);
                }
            }
        }
    }

    public function assignaddonmodule($function_id=NULL,$status=NULL,
    $packagemastermodule_id=NULL,$amount=0,$no_of_count=0,$isvaliditychanged=NULL)
    {
    //    dd($this->addonfunction['addon']);
        if($function_id && $packagemastermodule_id){
            if(!array_key_exists($packagemastermodule_id,$this->pickedmodules)){
                // dd("inside");
                $data = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/getPackageFunction/'.$function_id)->collect()->toArray();
             
                $data['no_of_count'] = $no_of_count;
                $data['amount'] = $amount;
                $data['quantity'] = $no_of_count;
                //if value is per year then ismoduleperyear = 1 else 0
                if($this->ismoduleperyear == 1){
                    $data['total'] = (intval($no_of_count) * $amount/$no_of_count) * $this->validity;
                }else{
                    $data['total'] = (intval($no_of_count) * $amount/$no_of_count);
                }
                // $data['total'] = $amount;
                $data['isactive'] = $status ? 1 : 0;
                $data['isaddon'] = 1;
                $data['packagemastermodule_id'] = $packagemastermodule_id;

                //add everything into all addon data
                $this->pickedmodules[$packagemastermodule_id]=$data;
                //add values in addon
                $this->calcuteaddonvalues();
                //gettotal by validitycount
                $this->total_amount = $this->package_amount + $this->addon_amount;
                
                $this->applydiscount();
            }else{
                $this->pickedmodules[$packagemastermodule_id]['isactive'] = $status ? 1 : 0;
                if($this->pickedmodules[$packagemastermodule_id]['isactive']==0){
                    //calculate total again
                    $this->pickedmodules[$packagemastermodule_id]['total'] = 0;
                    //add values in addon
                    $this->calcuteaddonvalues();
                    //gettotal by validitycount
                    $this->total_amount = $this->package_amount + $this->addon_amount;
                    
                }else{
                    //if value is per year then ismoduleperyear = 1 else 0
                    //calculate total again
                    if($this->ismoduleperyear == 1){
                        $this->pickedmodules[$packagemastermodule_id]['total'] = (intval($no_of_count) * $amount/$no_of_count) * $this->validity;
                    }else{
                        $this->pickedmodules[$packagemastermodule_id]['total'] = (intval($no_of_count) * $amount/$no_of_count);
                    }

                    //add values in addon
                    $this->calcuteaddonvalues();
                    //gettotal by validitycount
                    $this->total_amount = $this->package_amount + $this->addon_amount;
                    
                }
                $this->applydiscount();
            }
        }
    }

    public function applydiscount()
    {
        if($this->discount_amount == $this->discount){
            $msg = "noalert";
        }else{
            $msg = "";
        }
        $this->discount_amount=0;
        $this->subtotal_amount=0;
        $this->grandtotal=0;
        if($this->validity == '' || $this->validity == "0"){
            $this->dispatchBrowserEvent('iztoast', ['title' => "Please select validity before applying discount", "status" => 0]);
            return false;
        }

        $diff_amt = $this->total_amount;
        if(trim($this->coupon_code) != ""){
            $response = Http::post(config('constants.DEFAULT_URL').'/website/applycoupon', 
            ['promocode' => trim($this->coupon_code), 
            'package_subtotal' => $this->total_amount]);
            $responsemsg = $response->collect();
            $this->dispatchBrowserEvent('iztoast', ['title' => $responsemsg['message'], "coupon" => $responsemsg['status']]);
        }
        // else{
        //     $this->dispatchBrowserEvent('iztoast', ['title' => "Please enter coupon code", "coupon" => 0]);
        // }

        if(isset($responsemsg['package_discount_amount'])){
            $this->discount = $responsemsg['package_discount_amount'];   
        }else{
            $this->discount = '';   
        }
             
        if($this->discount == ""){
            $this->discount_amount = 0;
            $this->subtotal_amount = $diff_amt;
        }else{
            if($diff_amt > $this->discount){
                $this->discount_amount = $this->discount;
                $this->subtotal_amount = $diff_amt - $this->discount;
            }else{
                $this->discount_amount = 0;
                $this->subtotal_amount = $diff_amt;
                $this->dispatchBrowserEvent('iztoast', ['title' => "Discount amount should be less than Total Amount", "status" => 0]);
            }
        }
        $this->taxamount();
    }

    public function taxamount()
    {        
        $this->CGST = (9/100) * $this->subtotal_amount;
        $this->SGST = (9/100) * $this->subtotal_amount;
        $gt = $this->subtotal_amount + $this->CGST +$this->SGST;
        $this->grandtotal = sprintf('%0.2f', $gt);
    }

    public function calcuteaddonvalues(){
        $this->addon_amount = 0;
        //addon functions
        if(isset($this->addonfunction['addon'])){
            foreach ($this->addonfunction['addon'] as  $value) {
                $this->addon_amount += $value['total'];
            }
            
            //get addon modules
            
            foreach($this->addonmodules as $addonmodule){
                if(array_key_exists($addonmodule['id'],$this->pickedmodules)){
                    if($this->pickedmodules[$addonmodule['id']]['isactive']==1){
                        $this->addon_amount += $this->pickedmodules[$addonmodule['id']]['total'];
                    }
                }
            }
        }
    }

    public function saveform()
    {
        
        $rules = [
            'branch_name' => 'required|max:50',
            'contact_person_name' => 'required|max:50',
            'contact_person_no' => 'required|digits:10|regex:/^[7-9][0-9]{9}$/|max:10',
            'contact_person_email' => 'required|email|max:50',
            'branchstate' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address' => 'required|max:250',
            'pincode' => 'required|max:6',
            'gstno' => 'nullable|max:15|regex:/^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([a-zA-Z0-9]){3}$/',
            'pan_no' => 'nullable|max:10|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'name' => 'required|max:50',
            'membership_no' => 'nullable|digits:6',
            'contact_no' => 'required|different:contact_person_no|digits:10|regex:/^[7-9][0-9]{9}$/|max:10',
            'email' => 'required|max:50|email',
        ];

        $this->branch['created_by'] = 1;
        $this->branch['updated_by'] = 1;

        $validation = Validator::make($this->branch,$rules);
        $validation->setAttributeNames($this->attributeNames);
        
        if ($validation->fails()) {
            $error = $validation->errors()->first();
            $this->dispatchBrowserEvent('iztoast', ["title" => $error, 'status' => 0]);
            $validation->validate(); // What for this line ? Looks like we really need it ?
        }

        if($this->captcha != $this->originalcaptcha){
            $this->dispatchBrowserEvent('iztoast', ["title" => 'Please enter valid captcha', 'status' => 0, 'refresh' => 1]);
            return false;
        }

        $branch = Http::post(config('constants.DEFAULT_URL').'/website/checkaccount', ['email' => trim($this->branch['email'])])->collect();
        
        if(sizeof($branch) != 0){
            if($branch['status'] == false){
                if ($branch['branch_id'] != 0) {
                    $this->branch_id = $branch['branch_id'];
                    $this->dispatchBrowserEvent('razorpay');
                    return false;
                }
            }
        }

        $response = Http::post(config('constants.DEFAULT_URL').'/website/createbranch', ['branchdata' => $this->branch]);
        $responsemsg = $response->collect();
        if($responsemsg['status'] == 401){
            foreach ($responsemsg['data'] as $key => $value) {
                $this->dispatchBrowserEvent('iztoast', ["title" => $value[0], 'status' => 0]);
                return false;
            }
        }

        $this->branch_id = $responsemsg['branch_id'];
        $this->dispatchBrowserEvent('razorpay');
        
    }

    public function proceedtopayment($razorpayid)
    {
        if($this->grandtotal <= 0){
            $this->dispatchBrowserEvent('iztoast', ['title' => "The total amount should be greater than 0", "status" => 0]);
            return false;
        }
        // dd($this->pickedmodules,$this->addonfunction,$this->total_amount);
        // Data for Transaction Payment
        $end = date('Y-m-d', strtotime('+'.$this->validity.' years'));

        if($this->discount){
            $discount = $this->discount;
        }else{
            $discount = 0;
        }
        $paramsdata = [
            'razorpay_id' => $razorpayid,
            'transaction_status' => 1,
            'validity_id' => $this->validity,
            'package_name_id' => $this->package_id,
            'purchased_date' => date('Y-m-d'),
            'expiry_date' => $end,
            'total_amount' => $this->total_amount,
            'discount' => $discount,
            'subtotal_amount' => $this->subtotal_amount,
            'cgst' => $this->CGST,
            'sgst' => $this->SGST,
            'amount' => $this->grandtotal,
            'branch_id' => $this->branch_id,
        ];

        $response = Http::post(config('constants.DEFAULT_URL').'/website/branchpayment', [
            'paymentdata' => $paramsdata,
        ]);

        $data = $response->collect();
        if(isset($data['transaction_id'])){
            $menuformdata['transaction_id'] = $data['transaction_id'];
            $menuformdata['package_name_id'] = $this->package_id;
            $menuformdata['branch_id'] = $this->branch_id;

            $response = Http::post(config('constants.DEFAULT_URL').'/website/addfunctions', [
                'menuformdata' => $menuformdata,
                'addontransaction_id' => NULL,
                'addonfunction' => $this->addonfunction['addon'],
                'pickedmodules' => $this->pickedmodules,
                'renewal' => true,
                'addons' => false
            ]);

            //dd($response->collect());
            $this->dispatchBrowserEvent('iztoast',["title" => 'Congratulations!!! DueDeck Subscription Payment successful.', 'status' => 1, 'refresh' => 1, 'close' => 1]);
            
        }else{
            $this->dispatchBrowserEvent('iztoast', ['title' => $branchdata['message'] ?? "Something went wrong please try again", "status" => 0]);
            return false;
        }
        //add packages nad menus for transaction
    }

    public function addpackageandmodulesfortransaction($id){
        //Package Details Added in Trnsaction Function
        // Author : Adarsh Solankurkar
        // Created Date : 20/12/2022

        $response = Http::post(config('constants.DEFAULT_URL').'/website/addpackagemodule', [
            'id' => $id,
            'package_id' => $this->package_id,  
            'branch_id' => $this->branch_id,
            'addonfunction' => $this->addonfunction['addon'],
            'pickedmodules' => $this->pickedmodules

        ]);
        
    }
}
