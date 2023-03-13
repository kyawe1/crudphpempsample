<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use CodeIgniter\HTTP\Request;

class Employee extends BaseController
{
    public function index()
    {
        $model=new EmployeeModel();
        $array=$model->findAll();
        // dd($array);
        return $this->response->setJSON($array);
    }

    public function create(Request $request){
        $request-
    }
}
