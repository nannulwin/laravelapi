<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface 
{
	public function user();
	public function register($name, $email, $password,$phone,$address,$dob,$type);
	public function updateuser($id,$name, $email, $password,$phone,$address,$dob,$type);
	public function deleteuser($id);
	public function getUserById($id);
}