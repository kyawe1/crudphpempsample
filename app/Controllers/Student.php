<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Student as StudentModel;
use CodeIgniter\HTTP\Response;

class Student extends BaseController
{
    public function index()
    {
        $model=model(StudentModel::class);
        $students=$model->findAll();
        return $this->response->setJSON($students);
    }
    public function detail(int $id){
        $model=model(StudentModel::class);
        $student=$model->where("id",$id)->first();
        if($student){
            return $this->response->setJSON($student);
        }
        return $this->response->setJSON(["status"=>"200","body"=>"No Data"]);
    }
    public function update(int $id){
        $model=model(StudentModel::class);
        $bool=$this->validate([
            "name"=>"required",
            "address"=> 'required'
        ]);
        if($this->validator->withRequest($this->request)->run())
            dd("this request validated");
        
        
    }
    public function store(){
        if($this->validate([
            "name"=>"required|string",
            "address"=>"required"
        ]))
        {
            $model=model(StudentModel::class);
            $model->save([
                "name"=>$this->request->getPostGet("name"),
                "address"=>$this->request->getPostGet("address")
            ]);
            return $this->response->setJSON("created");
        }
        return $this->response->setJSON("not created");
    }
    public function destroy(int $id)
    {
        $model = new StudentModel();
        $model->delete($id);
        return $this->response->setJSON("deleted");
    }
    
}
