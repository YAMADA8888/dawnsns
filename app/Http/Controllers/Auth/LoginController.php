<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");
    }


    // バリデーション
     protected function validator(array $data)
    {
        return Validator::make($data, [

            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ],
        [
            'mail.required' => '必須項目です',
            'password.required' => '必須項目です',
            'password.min' => '4文字以上で入力してください',
        ]
    );
    }
}
