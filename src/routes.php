<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


  // Add a new employee
    $app->post('/create', function ($request, $response) {
    	$adminDetails = json_decode($request->getBody());
    	 $sth = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
         $sth->bindParam("email",$adminDetails->email);
         $sth->execute();
       	 if($sth->fetchColumn()==0){
	        $createAdmin = "INSERT INTO admin (name,email,password) VALUES (:name,:email,:password)";
	        $stmt = $this->db->prepare($createAdmin);
	        $stmt->bindParam("name", $adminDetails->name);
	        $stmt->bindParam("email",$adminDetails->email);
	        $stmt->bindParam("password",$adminDetails->password);
	        $stmt->execute();
	        $input['id'] = $this->db->lastInsertId();
	        return $this->response->withJson($input,201);
         }else{
         	$data=["result"=>"Email already exist"];
         	 return $this->response->withJson($data,200);
         }
    });
//Login admin


    // Add a new employee
    $app->post('/login', function ($request, $response) {
    	$adminDetails = json_decode($request->getBody());
    	 $sth = $this->db->prepare("SELECT * FROM admin WHERE email = :email and password=:password");
         $sth->bindParam("email",$adminDetails->email);
         $sth->bindParam("password",$adminDetails->password);
         $sth->execute();
       	 if($sth->fetchColumn()==0){
	       $data=["result"=>"Invalid email and password"];
         	return $this->response->withJson($data,200);

         }else{
         	$data=["result"=>"success"];
         	 return $this->response->withJson($data,200);
         }
    });

