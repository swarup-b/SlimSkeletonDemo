<?php 
include($_SERVER['DOCUMENT_ROOT'].'/EmployeeRegistration/src/model/CURDOperation.php');

class UserController{

	public function create($adminDetails,$db){
		if (empty($adminDetails->name) || empty($adminDetails->email) || empty($adminDetails->password)) {
            return $result=['error' => true, 'message' => 'Name ,Email or Password is empty.'];
        }else{
		 $createObj=new CURDUser();
		 return $createObj->createEmployee($adminDetails,$db);
		}
	}

	public function allEmployee($db){
		 $allEmp=new CURDUser();
		 return $allEmp->getAllEmployee($db);
	}

	public function update($adminDetails,$id,$db){
		if (empty($adminDetails->name) || empty($adminDetails->email) || empty($adminDetails->password)) {
            return $result=['error' => true, 'message' => 'Name ,Email or Password is empty.'];
        }else if (empty($id)) {
        	return $result=['error' => true, 'message' => 'ID is required.'];
        }else{
		 $updateEmp=new CURDUser();
		 return $updateEmp->updatemployee($adminDetails,$id,$db);
		}

	}
	public function delete($id,$db){
		 $deleteEmp=new CURDUser();
		 return $deleteEmp->deleteEmployee($id,$db);
	}
}?>