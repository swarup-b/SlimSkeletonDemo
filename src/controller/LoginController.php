<?php
class CURDUser{
	public function createUser($adminDetails,$db){
         $sth = $db->prepare("SELECT * FROM admin WHERE email = :email");
         $sth->bindParam("email",$adminDetails->email);
         $sth->execute();
       	 if($sth->fetchColumn()==0){
	        $createAdmin = "INSERT INTO admin (name,email,password) VALUES (:name,:email,:password)";
	        $stmt = $db->prepare($createAdmin);
	        $stmt->bindParam("name", $adminDetails->name);
	        $stmt->bindParam("email",$adminDetails->email);
	        $stmt->bindParam("password",$adminDetails->password);
	        $stmt->execute();
	        $input['id'] = $this->db->lastInsertId();
	        return $input;
         }else{
         	$data=["result"=>"Email already exist"];
         	 return $data;
         }


	}
	public function updateUser(){

	}
	public function getAllUser(){

	}public function deleteUser(){

	}
}