<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Place;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:owner');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required',  'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile'=> $data['mobile'],
            'fullname'=>$data['fullname'],
            'city_id'=>$data['city_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register2', ['url' => 'admin']);
    }

    public function showOwnerRegisterForm()
    {
        $place = Place::get();
        return view('auth.register2', ['url' => 'owner'],compact('place'));
    }

    protected function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required'
        ]);
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
       
        return redirect()->back();
    }

    protected function createOwner(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:owners',
            'password' => 'required',
            'place_id' => 'required'


        ]);
        $owner = Owner::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'place_id' => $request['place_id'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
