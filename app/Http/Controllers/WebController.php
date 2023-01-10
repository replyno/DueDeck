<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index()
    {
        // $response = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/getPackages');
        // $array = $response->collect();
        // $packages = $array['package'];
        // return view('index', compact('packages'));
        return view('index');
    }

    public function getcheckout($id)
    {
        $response = Http::acceptJson()->get(config('constants.DEFAULT_URL').'/website/checkoutPackage/'.$id);
        $object = $response->collect();
        $package = $object['package'];
        $addons = $object['addon'];
        $addonmodules = $object['addonmodules'];
        return view('checkout', compact('package', 'addons', 'addonmodules', 'id'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function trialrequest()
    {
        return view('trial-request');
    }

    public function login()
    {
        return redirect()->to(config('constants.DEFAULT_URL'));
    }
}
