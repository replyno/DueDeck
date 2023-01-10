<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Demoform extends Component
{
    public $name,$firm_name,$email,$contact_no,$message,$ip,$originalcaptcha,$enteredcaptcha,$city,$membership_no,$company_url;

    public function render()
    {
        return view('livewire.demoform');
    }

    public function mount()
    {
        // $bytes = pow(2048,3);
        // $precision = 2;
        // $a = '';
        // if ($bytes > pow(1024,3)){
        //     $a =  round($bytes / pow(1024,3), $precision)."GB";
        // }else if ($bytes > pow(1024,2)){
        //     $a = round($bytes / pow(1024,2), $precision)."MB";
        // } 
        // else if ($bytes > 1024){
        //     $a = round($bytes / 1024, $precision)."KB";
        // } 

        // $size = 5120;
        // $units = array( 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        // $power = $size > 0 ? floor(log($size, 1024)) : 0;
        // $a = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
        // dd($a);
    }

    public function saveform()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'ip_address' => $this->ip,
            'message' => $this->company_url,
            'captcha' => $this->enteredcaptcha
        ];

        $rules = [
            'name' => 'required | max:50|',
            'email' => 'required|email|max:50',
            'contact_no' => 'required|digits:10|regex:/^[7-9][0-9]{9}$/|',
            'message' => 'nullable|max:255',
            'captcha' => 'required|max:255',
        ];

        $attributeNames = array(
            'name' => 'Name',
            'contact_no' => 'Contact No.',
            'email' => 'Email',
            'message' => 'Message',
            'captcha' => 'Captcha',
         );

        $validation = Validator::make( $data, $rules);
        $validation->setAttributeNames($attributeNames);
        if ($validation->fails()) {
            $error = $validation->errors()->first();
            $this->dispatchBrowserEvent('iztoast', ['title' => $error, "status" => 0]);
            $validation->validate(); // What for this line ? Looks like we really need it ?
        }

        if($this->enteredcaptcha != $this->originalcaptcha){
            $this->dispatchBrowserEvent('iztoast', ['title' => 'Invalid Captcha. Try Again', "status" => 0, "refresh" => 1]);
            return false;
        }

        $url = config('constants.DEFAULT_URL');
        $response = Http::post($url."/website/senddemorequest", [
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'firm_name' => $this->firm_name,
            'membership_no' => $this->membership_no,
            'city' => $this->city,
            'ip_address' => $this->ip,
            'message' => $this->company_url,
        ]);

        $this->dispatchBrowserEvent('iztoast', ["sweetalert" => 1, "refresh" => 1]);
        $this->clearfilters();
    }

    public function clearfilters()
    {
        $this->name = '';
        $this->email = '';
        $this->contact_no = '';
        $this->firm_name = '';
        $this->membership_no = '';
        $this->company_url = '';
        $this->city = '';
        $this->enteredcaptcha = '';
    }

    public function getcaptcha()
    {
        dd('ok');
    }
}
