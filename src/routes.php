<?php
require "controller/UserController.php";
require "controller/LoginController.php";
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

   
// get all Employee
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




      //Login admin
    $app->post('/Admins/login', function ($request, $response) {
        $adminDetails = json_decode($request->getBody());
         $user= new LoginController();
         $data=$user->login($adminDetails, $this->db);
         return $this->response->withJson($data,200);
        
    });

      //create admin
    $app->post('/Admins/create', function ($request, $response) {
        $adminDetails = json_decode($request->getBody());
         $user= new LoginController();
         $data=$user->create($adminDetails, $this->db);
         return $this->response->withJson($data,200);
        
    });

