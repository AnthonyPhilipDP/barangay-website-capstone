<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
        //$this->middleware('guest');
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
            'middle' => ['nullable', 'string', 'max:255'],
            'suffix' => ['required', 'string', 'max:255'],
            'block' => ['required_if:house,null'],
            'lot' => ['required_with:subdivision'],
            'phase' => ['required_with:subdivision'],
            'house' => ['required_if:block,null'],
            'street' => ['nullable', 'string', 'max:255'],
            'subdivision' => ['required_with:block,lot,phase'],
            'barangay' => ['required', 'string', 'max:255'],
            'city_muni' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'pobcity' => ['required', 'string', 'max:255'],
            'pobprovince' => ['required', 'string', 'max:255'],
            'civilstatus' => ['required', 'string', 'max:255'],
            'citizenship' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'admin' => ['required', 'string', 'max:255'],
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
        $monthArr = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $dob = Carbon::parse($data['dob']);
        $age = $dob->age;
        $year = $dob->format('Y');
        $month = (int)$dob->format('m');
        $day = $dob->format('d');
        $dob = $monthArr[$month] ." ". $day .", ". $year;

        return User::create([
            'name' => $data['name'],
            'middle' => $data['middle'],
            'lastname' => $data['lastname'],
            'suffix' => $data['suffix'],
            'block' => $data['block'],
            'lot' => $data['lot'],
            'phase' => $data['phase'],
            'house' => $data['house'],
            'street' => $data['street'],
            'subdivision' => $data['subdivision'],
            'barangay' => $data['barangay'],
            'city_muni' => $data['city_muni'],
            'province' => $data['province'],
            'dob' => $dob,
            'pobcity' => $data['pobcity'],
            'pobprovince' => $data['pobprovince'],
            'age' => $age,
            'civilstatus' => $data['civilstatus'],
            'citizenship' => $data['citizenship'],
            'email' => $data['email'],
            'admin' => $data['admin'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
