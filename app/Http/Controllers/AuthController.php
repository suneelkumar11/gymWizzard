<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session, Auth, Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index() {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration() {
        if (Auth::check()) {
            return redirect('/');
        }
        
        return view('auth.register');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request) {  
        $rules = [
            'email' => 'required|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
        ];
        $messages = [];

        $validator = Validator::make( $request->all(), $rules, $messages );


        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        } else {


           
            $data = $request->all();
            $check = $this->create($data);
             
            return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        }
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard() {
        if(Auth::check()){
            return view('views.dashboard.index');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
