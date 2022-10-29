<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\QrCodes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    //Show Register/Create Form

    public function create(){
        return view('/users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //Create User
        $user = User::create($formFields);
        //Login
        auth()->login($user);

        $user_id = (string)Auth::id();
        $qr_id = $user_id . "_" . date("Ymd");
        $path = public_path('storage/qr_codes/'. $qr_id .'.svg');
        QrCode::size(500)->generate($user_id, $path); 

        $qrFields = new QrCodes;

        $qrFields = [
        'users_id' => $user_id,
        'path' => $path,
       ];

        QrCodes::create($qrFields);

        return redirect('/qr_blade')->with('message', 'User created and logged in successfully.');
    }

     public function login(){
        return view('/users.login');
    }

    public function authenticate(Request $request){
         $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/qr_blade')->with('message', 'Logged in');
        }

        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');


    }

    public function logout(Request $request){
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/register')->with('message', 'Logged out successfully.');   
    }
  
    public function show() {
        return view('menu.show-info');
    }

    //QR Page
    public function qrCode(){
        $users_id= strval(Auth::id());
        $query = DB::table('qrcodes')->where('users_id', '=', $users_id)->value('path');
        $strArrPath = explode("/", strval($query), 10); 
        $path = $strArrPath[9];


        return view('menu.show-qr', ["qr" => $path]);
    }

    public function show_gallary(){
        return view('menu.show-gallary');
    }

    public function profileUpdate(Request $request){
        //validation rules
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users')->ignore(auth()->id()),],
            'password' => 'required|confirmed|min:6'
        ]);
         //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = Auth::user();
        
        $user->update($formFields);
        return redirect('/show_account')->with('message', 'Account update successfully');
    }

    public function index(){

        return redirect('/gallary');
    }
}
