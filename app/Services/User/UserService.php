<?php 

namespace App\Services\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Contracts\Dao\User\UserDaoInterface;

class UserService implements UserServiceInterface
{
	private $UserDao;

	public function __construct(UserDaoInterface $user)
	{
		$this->UserDao = $user;
	}

	public function user()
	{
		return $this->UserDao->user();
	}	

	public function register($name, $email, $password,$phone,$address,$dob,$type)
	{
		return $this->UserDao->register($name, $email, $password,$phone,$address,$dob,$type);
	}

	public function updateuser($id,$name, $email, $password,$phone,$address,$dob,$type)
	{
		return $this->UserDao->updateuser($id,$name, $email, $password,$phone,$address,$dob,$type);
	}

	public function deleteuser($id)
	{
		return $this->UserDao->deleteuser($id);
	}

	public function getUserById($id) {
		return $this->UserDao->getUserById($id);
	}
}