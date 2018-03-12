<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{	
	public function user();
	public function register($name, $email, $password,$phone,$address,$dob,$type);
	public function updateuser($id,$name, $email, $password,$phone,$address,$dob,$type);
	public function deleteuser($id);
	public function getUserById($id);
}