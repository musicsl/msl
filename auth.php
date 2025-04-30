// Database

public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('qty');
            $table->decimal('price');
            $table->text('description');
            $table->timestamps();
        });
    }
	
//Models:

//product

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
}


//authController

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{

    public function index() {

        return view('welcome');
    }
    public function registerPage() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $password1 = $request -> input('password');
        $password2 = $request -> input('password2');

        if($password1 != $password2){
            return redirect(route('user.register')) -> with('error' , "password not matched");

        }

        $data = $request->validate([
            "name" => "required",
            "email" => "required|email|",
            "password" => "required" 
        ]);

        $data['password'] = Hash::make($data['password']);
 
        $user = User::create($data);
        return redirect(route('user.login'));
    }

    public function loginPage(){

        return view('auth.login'); 
    }


    public function login(Request $request){
        $credentials = $request -> validate([
            'email' => 'required|email',
            "password" => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('index'));
        }

        return redirect()->back()->with('error' , 'email or password incorrect');
        //
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect() -> route('user.login');
    } 

    public function resetPass(){
        return view('auth.passreset');
    }

    public function reset(Request $request){
        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();
        if(Auth::attempt(['email'=>$email, 'password'=>$request->input('prePassword')])){
            if($request->input('password') == $request->input('password2')){
                $user->password = Hash::make($request->input('password2'));
                $user->save();
                return redirect()->route('login');
            }
            return redirect()->back()->with('error', 'password not matches');
        }
        return redirect()->back()->with('error', 'token not set');

    }
}


//Views:

//login

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Login page</div><br>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <input type="text" name="email" id="" placeholder="email">
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="password">
        </div>
        <div>
            <input type="submit" value="login">
        </div>
    </form>
    <br><br>
    @if (session()->has('error'))
        <div>{{session('error')}}</div>
    @endif
    <br><br>
    <p>if you don't have an account? please <a href="/register">register</a></p>
</body>
</html>


//passreset

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Login page</div><br>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <input type="text" name="email" id="" placeholder="email">
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="password">
        </div>
        <div>
            <input type="submit" value="login">
        </div>
    </form>
    <br><br>
    @if (session()->has('error'))
        <div>{{session('error')}}</div>
    @endif
    <br><br>
    <p>if you don't have an account? please <a href="/register">register</a></p>
</body>
</html>


//register

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        Register web application
    </div>
    <br>
    <form action="{{route('register')}}" method="post">
        @csrf
        <div>
            <input type="text" name="name" id="" placeholder="name">
        </div>
        <div>
            <input type="text" name="email" id="" placeholder="email">
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="password">
        </div>
        <div>
            <input type="password" name="password2" id="" placeholder="re-type password" />
        </div>
        <div>
            <input type="submit" value="register">
        </div>
    </form>

    <br><br>
        <div>
            @if (session() -> has('error'))
                <div>{{session('error')}}</div>
            @endif
        </div>
    <br><br>
    <p>if you alread have an account: <a href="/login">login</a></p>
</body>
</html>


//web

<?php

use App\Http\Controllers\authController;
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

Route::get('/', [authController::class, 'index'])->name('index');

Route::get('/register', [authController::class ,'registerPage']) -> name('user.register');
Route::post('/register', [authController::class, 'register']) -> name('register'); 

Route::get('/login', [authController::class, 'loginPage']) -> name('user.login');
Route::post('/login', [authController::class, 'login']) -> name('login');

Route::post('/logout', [authController::class, 'logout']) -> name('user.logout');
Route::post('/reset', [authController::class, 'reset']) -> name('reset');

Route::get('/resetPass', [authController::class,'resetPass']) -> name('reset.pass');


//channels

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


//api

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
