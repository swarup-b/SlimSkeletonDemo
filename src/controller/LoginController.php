<?php
include($_SERVER['DOCUMENT_ROOT'].'/EmployeeRegistration/src/model/LoginAdmin.php');
class LoginController{

	public function create($adminDetails,$db){
		if (empty($adminDetails->name) || empty($adminDetails->email) || empty($adminDetails->password)) {
			return $result=['error' => true, 'message' => 'Name ,Email or Password is empty.'];
		}else{
			$createObj=new LoginAdmin();
			return $createObj->createAdmin($adminDetails,$db);
		}
	}




	public function login($adminDetails,$db){
		if (empty($adminDetails->email) || empty($adminDetails->password)) {
			return $result=['error' => true, 'message' => 'Name ,Email or Password is empty.'];
		}else{
			$obj= new LoginAdmin();
			return $obj->login( $adminDetails , $db);
		}
	}

}