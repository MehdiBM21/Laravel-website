<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\AccountController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;




//ces fonctions sont dans le controlleur secondcontroller
Route::get('/',[DataController::class, 'create'])->name('home.index');//si on a /: on appelle la methode index du SecondController 
Route::get('/about',[SecondController::class, 'about' ])->name('home.about');//->name est pour le layout(voir navbar de layout.blade.php)
Route::get('/portfolio',[SecondController::class, 'portfolio' ]);
//Route::get('/test',[SecondController::class, 'test' ]);
Route::get('/contact',[SecondController::class, 'contact' ])->name('home.contact');
Route::resource('data', DataController::class);//resource('data') nous permettra d'aller vers n'importe quelle data/xxx (elle génère tous les data/xxx)
Route::resource('account', AccountController::class);
//EMAIL -->
//Route::get('/login',[DataController::class, 'create']);//create a modifier avec un login form
Route::get('/email/verify', function () {
    return view('email.index');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('login');//a modifier vers une dashboard
})->middleware(['auth', 'signed'])->name('verification.verify');
//Route::get('/create2',[DataController::class, 'create2']);
//Route::post('/account/store/{dataid}', 'AccountController@store')->name('account.store');


Route::get('/info', [DataController::class, 'info'])->name('home.info');
Route::get('/test', function(){
    return view('data.test');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    $filter= request('style');
    if(isset($filter)){
    return 'this text will change to <span style="color: red"> '.strip_tags($filter).'</span> voila';
}
return 'write ?style=chno_briti';
});

Route::get('/main/{sport?}/{category?}', function ($sport=null, $category=null) {
    $filter= request('style');
    if(isset($category)){
        if(isset($category)){
    return 'this text will change to <span style="color: red"> '.strip_tags($filter). strip_tags($sport). strip_tags($category).'</span> voila';
}
 return 'this text will change to <span style="color: red"> '.strip_tags($filter). strip_tags($sport). strip_tags($category).'</span> voila';
}
return 'write ?style=chno_briti';
});

*/Auth::routes([
    'verify' =>true,
]);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
