<?php
namespace App\Repositories\Classes;

use App\Repositories\Interfaces\ChapterPictureRepositoryInterface;
use App\Models\ChapterPicture;



class ChapterPictureRepository implements ChapterPictureRepositoryInterface{
    public function __construct(private ChapterPicture $model){

    }
    public function getAll(){
        return $this->model->findAll();
    }
    public function getOne(int $id){
        return $this->model->find($id);
    }
    public function insert(array $array){
        return $this->model->insertBatch($array);
    }
    public function update(int $id, array $array){

    }
    public function delete(int $id){
        return $this->model->delete($id);
    }
}