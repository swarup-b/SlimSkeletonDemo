<?php 
include($_SERVER['DOCUMENT_ROOT'].'/EmployeeRegistration/src/model/CURDOperation.php');

class UserController{

	public function create($empDetails,$db){
		 $createObj=new CURDUser();
		 return $createObj->createEmployee($empDetails,$db);
	}

	public function allEmployee($db){
		 $createObj=new CURDUser();
		 return $createObj->getAllEmployee($db);
	}

	public function update($empDetails,$id,$db){
		 $createObj=new CURDUser();
		 return $createObj->updatemployee($empDetails,$id,$db);
		 return $id;

	}
	public function delete($id,$db){
		 $createObj=new CURDUser();
		 return $createObj->deleteEmployee($id,$db);
	}
}?>