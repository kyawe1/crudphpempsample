<?php

namespace App\Repositories\Classes;
use App\Repositories\Interfaces\MangaRepositoryInterface;
use App\Models\Manga;


class MangaRepository implements MangaRepositoryInterface {
    private Manga $model;
    public function __construct(Manga $model){
        $this->model=$model;
    }
    public function getAll(){
        $arr=$this->model->findAll();
        if($arr){
            return $arr;
        }
        return false;
    }
    public function getOne(int $id){
        $arr=$this->model->find($id);
        if($arr){
            return $arr;
        }
        return false;
    }
    public function insert(array $arr){
        $bool=$this->model->insert($arr);
        return $bool;
    }
    public function update(int $id,array $array){
        $bool=$this->model->update($id,$array);
        return $bool;
    }
    public function delete(int $id){
        $bool=$this->model->delete($id);
        return $bool;
    }
    public function getSeriesRelatedChapter(int $id){
        $data=$this->getOne($id);
        if($data){
            $data["chapters"]=$this->model->join('manga_chapter',"manga_chapter.manga_id=manga.id",'left')->join('chapter','chapter.id=manga_chapter.chapter_id','left')->where("manga.id",$id)->select("chapter.name as chapter_name,chapter.id as chapter_id,chapter.created_at as chapter_created_at")->findAll();
        return $data;

        }
        // dd($this->model->join('manga_chapter',"manga_chapter.manga_id=manga.id",'left')->join('chapter','chapter.id=manga_chapter.chapter_id','left')->where("manga.id",$id)->select("chapter.name as chapter_name,manga.id as manga_id,chapter.id as chapter_id,chapter.created_at as chapter_created_at")->findAll());
        return false;
    }

}