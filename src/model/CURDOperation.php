<?php
class CURDUser{
	public function createEmployee($adminDetails,$db){
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
	        $input['id'] =$db->lastInsertId();
	        return $input;
         }else{
         	$data=["result"=>"Email already exist"];
         	 return $data;
         }


	}
	public function updatemployee($adminDetails,$id,$db){
		$sql = "UPDATE admin SET name=:name,email=:email,password=:password WHERE admin_id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->bindParam("name", $adminDetails->name);
        $stmt->bindParam("email",$adminDetails->email);
        $stmt->bindParam("password",$adminDetails->password);
        $stmt->execute();
        $admin['id'] = $id;
        return $admin;

	}
	public function getAllEmployee($db){
		 $sth = $db->prepare("SELECT * FROM admin ");
         $sth->execute();
         $allAdmin = $sth->fetchAll();
        return $allAdmin;

	}public function deleteEmployee($id,$db){
		 $sth = $db->prepare("DELETE FROM admin WHERE admin_id=:id");
        $sth->bindParam("id",$id);
        $sth->execute();
        $data=["result"=>"successfully deleted"];
        return $this->response->withJson($data);

	}
}