<?php

class DefaultController extends Controller{

    public function indexAction(){
        include  CURR_VIEW_PATH ."home.php";
		exit();
    }

    public function testDBAction(){
        $employeeModel = new EmployeeModel("business_solutions");
        $employees = $employeeModel->getEmployees();
        print_r($employees);
       
		exit();
    }

}