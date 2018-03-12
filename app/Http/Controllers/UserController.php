<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class UserController extends Controller
{
    private $userservice;

    public function __construct(UserServiceInterface $user)
    {
    	$this->userservice = $user;
    }

    public function user(Request $request)
    {
    	$user = $this->userservice->user();

    	return Response::json($user);
    }

    public function showlogin()
    {
        return view('login');
    } 

    public function adduser(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;
        $dob = $request->dob;
        $type = $request->type;
        $user = $this->userservice->register($name, $email, $password,$phone,$address,$dob,$type);

        return Response::json($user);
    }

    public function updateuser(Request $request)
    {   $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;
        $dob = $request->dob;
        $type = $request->type;
        $user = $this->userservice->updateuser($id,$name, $email, $password,$phone,$address,$dob,$type);

        return Response::json($user);
    }

    public function deleteuser(Request $request)
    {
        $id = $request->id;
        $user = $this->userservice->deleteuser($id);

        return Response::json($user);
    }

    public function getUserById(Request $request) {
        $id = $request->id;
        $user = $this->userservice->getUserById($id);

        return Response::json($user);
    }

}
