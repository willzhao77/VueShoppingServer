<?php

// email 设置可为空
// request 和 response 都是 json 格式
// api_token 设置可插入数据库

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login', 'register');
    }

    protected function username()
    {
        return 'name';
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $api_token = Str::random(80);
        $data = array_merge($request->all(), compact('api_token'));
        $this->create($data);

        return compact('api_token');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users',],
//            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::forceCreate([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 1,
            'api_token' => hash('sha256', $data['api_token']),
        ]);
    }

    public function logout()
    {
        auth()->user()->update(['api_token' => null]);

        return ['message' => '退出登录成功'];
    }

    public function login()
    {
        try{
          $user = User::where($this->username(), request($this->username()))
              ->firstOrFail();
              if (!password_verify(request('password'), $user->password)) {
                  return response()->json(['error' => '抱歉，账号名或者密码错误！'],
                      403);
              }

              $api_token = Str::random(80);
              $user->update(['api_token' => hash('sha256', $api_token)]);

              return compact('api_token');



        }catch(ModelNotFoundException $ex) {
          // Error handling code
        }

    }

    public function refresh()
    {
        $api_token = Str::random(80);
        auth()->user()->update(['api_token' => hash('sha256', $api_token)]);

        return compact('api_token');
    }
}
