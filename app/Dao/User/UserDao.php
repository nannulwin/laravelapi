<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use DB;

class UserDao implements UserDaoInterface
{
	public function user()
	{
		return DB::table('users')->select()->where('delflg', 0)->get();
	}

	public function register($name, $email, $password,$phone,$address,$dob,$type)
	{
		
		$adduser = DB::table('users')->insert([
            'name'            => $name,
            'password'        => bcrypt($password),
			'email'           => $email,
			'phone_number'	  => $phone,
			'address'         => $address,
			'date_of_birth'			  => $dob,
			'user_type'		  => $type, 
			'delflg'		  => 0,
            'created_user_id' => '',
            'updated_user_id' => '',
        ]);
        return $adduser;
	}

	public function updateuser($id,$name, $email, $password,$phone,$address,$dob,$type)
	{
		if($password != null) {
			$password = bcrypt($password);
		}
		$updateuser = DB::table('users')
		->where('id', $id)
		->update([
			'name'            => $name,
            'password'        => $password ,
			'email'           => $email,
			'phone_number'	  => $phone,
			'address'         => $address,
			'date_of_birth'	  => $dob,
			'user_type'		  => $type, 
            'created_user_id' => '',
            'updated_user_id' => '',
        ]);
        return $updateuser;
	}

	public function getUserById($id)
	{
		$user = DB::table('users')
		->select()
		->where('id', $id)
		->get();
        return $user;
	}

	public function deleteuser($id)
	{
		$deleteuser = DB::table('users')
		->where('id', $id)
		->update([
			'delflg' => '1'
        ]);
		return DB::table('users')->select()->where('delflg', 0)->get();
	}
}