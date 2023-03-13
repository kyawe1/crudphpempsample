<?php


namespace App\Repositories\Classes;

use App\Models\Chapter;
use App\Repositories\Interfaces\ChapterRepositoryInterface;

class ChapterRepository implements ChapterRepositoryInterface
{
    private Chapter $model;
    public function __construct(Chapter $model){
        $this->model=$model;
    }

    public function getAll(){
        return $this->model->findAll();
    }
    public function getOne(int $id){

    }
    public function insert(array $array){
        return $this->model->insert($array);
    }
    public function update(int $id,array $array){
        
    }
    public function delete(int $i){

    }
   
}