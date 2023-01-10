<?php
use App\Http\Livewire\EnquiryForm;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebController::class, 'index']);
Route::get('/checkout/{id}', [WebController::class, 'getcheckout']);
Route::get('/trial-request', [WebController::class, 'trialrequest']);
Route::get('/contact', [WebController::class, 'contact']);
Route::post('/savedetails', [WebController::class, 'save']);

Route::get('enquiry_form', EnquiryForm::class);

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/termsconditions', function () {
    return view('termconditions');
});

Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/login', [WebController::class, 'login']);