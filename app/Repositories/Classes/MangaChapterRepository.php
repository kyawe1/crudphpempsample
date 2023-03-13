<?php


namespace App\Repositories\Classes;

use App\Models\MangaChapter;
use App\Repositories\Interfaces\MangaChapterRepositoryInterface;

class MangaChapterRepository implements MangaChapterRepositoryInterface
{
    private MangaChapter $model;
    public function __construct(MangaChapter $model){
        $this->model=$model;
    }

    public function getAll(){
        
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