<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

   use ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'getLogout']);
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
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function login(){
        // return 'Auth Login Panel';
        return view('auth.login')
                    ->with('title', 'Login');
    }


    /**
     * Annoynimous login
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function doLogin(Request $request)
    {
        $rules = array
        (
            'name'    => 'required',
        );
        $allInput = $request->all();

        $validation = Validator::make($allInput, $rules);

        if ($validation->fails())
        {

            return redirect()->route('login')
                        ->withInput()
                        ->withErrors($validation);
        } else
        {
            //$remember = (\Input::has('remember')) ? true : false;

            if( $allInput['name'] != "Admin"){
                $this->saveNewUser($allInput['name']);


                $credentials = array
                (
                    'name'    => $allInput['name'],
                    'password' => "1234"
                );

                if (Auth::attempt($credentials, true))
                {
                    return redirect()->intended('dashboard')->with('success','Welcome to Crowdsource Translator');
                }else
                {
                    return redirect()->route('login')
                        ->withInput()
                        ->withErrors('Error in Email Address or Password.');
                }
            }else{
                return redirect()->back()->with('warning', 'You cant login with this name');

            }

           

        }

    }





    public function secureLogin(Request $request){
        $rules = array
        (
            'username'    => 'required',
            'password' => 'required'
        );
        $allInput = $request->all();

        $validation = Validator::make($allInput, $rules);

        if ($validation->fails())
        {

            return redirect()->route('login')
                ->withInput()
                ->withErrors($validation);
        } else
        {
           // $remember = (\Input::has('remember')) ? true : false;

            $credentials = array
            (
                'username'    => $allInput['username'],
                'password' => $allInput['password']
            );

            if (Auth::attempt($credentials, true))
            {
                return redirect()->intended('dashboard')->with('success','Welcome to  Crowdsource Translator');
            } else
            {
                return redirect()->route('login')
                    ->withInput()
                    ->withErrors('Error in Username or Password.');
            }
        }
    }






    public static function saveNewUser($name){
        //new User
        $user = User::where('name', $name)->count();
        if($user == 0){
            $newUser = new User();
            $newUser->name =$name;
            $newUser->username = str_slug($name);
            $newUser->email = str_slug($name).'@mail.com';
            $newUser->sessionID = "1234";
            $newUser->save();
        }
    }






    public function logout(){
        Auth::logout();
        return redirect()->route('login')
                    ->with('success',"You are successfully logged out.");
        // return 'Logout Panel';
    }






    public function dashboard(){
        return view('dashboard')
                    ->with('title','Dashboard')
                    ->with('user', Auth::user())
                    ->with('success',"You are successfully logged out.");
        // return 'Dashboard';
    }





    public function changePassword(){
        return view('auth.changePassword')
                    ->with('title',"Change Password")->with('user', Auth::user());
        // return 'Change Password';
    }





    public function doChangePassword(Request $request){
        $rules =[
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $user = Auth::user();
            $user->password = Hash::make($data['password']);

            if($user->save()){
                Auth::logout();
                return redirect()->route('login')
                            ->with('success','Your password changed successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
         // return 'Do Change Password';

    }




    public function profile() {
        return view('auth.profile')->with('title', "Profile")->with('user', Auth::user());
    }


}
