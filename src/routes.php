<?php
require "controller/UserController.php";
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

   
// get all admin
    $app->get('/employees', function ($request, $response, $args) {
         $user= new UserController();
        $data=$user->allEmployee($this->db);
         return $this->response->withJson($data,200);
         
    });


  // Add a new employee
    $app->post('/employees', function ($request, $response) {
    	$empDetails = json_decode($request->getBody());
        $user= new UserController();
        $data=$user->create($empDetails, $this->db);
         return $this->response->withJson($data,200);
    });

    
// Update admin with given id
    $app->put('/employees/[{id}]', function ($request, $response, $args) {
        $empDetails = json_decode($request->getBody());
         $user= new UserController();
         $data=$user->update($empDetails,$args['id'], $this->db);
         return $this->response->withJson($data,200);
       
    });

     // DELETE a admin with given id
    $app->delete('/employees/[{id}]', function ($request, $response, $args) {
       $user= new UserController();
        $data=$user->update($args['id'], $this->db);
        return $this->response->withJson($data,204);
    });




    /*  //Login admin
    $app->post('/employees/login', function ($request, $response) {
        $adminDetails = json_decode($request->getBody());
         $sth = $this->db->prepare("SELECT * FROM admin WHERE email = :email and password=:password");
         $sth->bindParam("email",$adminDetails->email);
         $sth->bindParam("password",$adminDetails->password);
         $sth->execute();
         if($sth->fetchColumn()==0){
           $data=["result"=>"Invalid email and password"];
            return $this->response->withJson($data);

         }else{
            $data=["result"=>"success"];
             return $this->response->withJson($data,200);
         }
    });*/

