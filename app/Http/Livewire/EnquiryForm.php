<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;
use App\Models\Enquiry;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EnquiryForm extends Component
{
    public $name,$email,$contact_no,$message,$ip,$originalcaptcha,$enteredcaptcha;

    protected $listeners = [
                            'getvalidate'
                         ];

    public function render()
    {
        return view('livewire.enquiry-form');
    }

    public function submitdetails()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'ip_address' => $this->ip,
            'message' => $this->message,
        ];

        $rules = [
            'name' => 'required | max:50|',
            'email' => 'required|email|max:50',
            'contact_no' => 'required|digits:10|regex:/^[7-9][0-9]{9}$/|',
            'message' => 'nullable|max:255',
        ];

        $attributeNames = array(
            'name' => 'Name',
            'contact_no' => 'Contact No.',
            'email' => 'Email',
            'message' => 'Message',
         );

        $validation = Validator::make( $data, $rules);
        $validation->setAttributeNames($attributeNames);
        if ($validation->fails()) {
            $error = $validation->errors()->first();
            $this->dispatchBrowserEvent('iztoast', ['title' => $error, "status" => 0]);
            $validation->validate(); // What for this line ? Looks like we really need it ?
        }

        if($this->enteredcaptcha == ""){
            $this->dispatchBrowserEvent('iztoast', ['title' => 'The Captcha field is required', "status" => 0]);
            return false;
        }

        if($this->enteredcaptcha != $this->originalcaptcha){
            $this->dispatchBrowserEvent('iztoast', ['title' => 'Invalid Captcha. Try Again', "status" => 0]);
            return false;
        }

        // Enquiry::create($data);

        $response = Http::post(config('constants.DEFAULT_URL').'/website/sendcontact', [
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'ip_address' => $this->ip,
            'message' => $this->message,
        ]);

        session()->flash('success', 'Thank you. The form has been submitted successfully. Our representative will get in touch with you shortly.');
        $this->dispatchBrowserEvent('iztoast', ["animate" => 1, 'sweetalert' => 1]);
        $this->clearform();
    }

    public function getvalidate()
    {
        $this->dispatchBrowserEvent('captcha', ['validate' => 2]);
    }

    public function clearform()
    {
        $this->name = '';
        $this->email = '';
        $this->contact_no = '';
        $this->message = '';
        $this->enteredcaptcha = '';
        $this->dispatchBrowserEvent('captcha', ['status' => 2, 'createcaptcha' => 1]);
    }
}
