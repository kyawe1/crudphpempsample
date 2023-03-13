<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Repositories\Interfaces\ChapterPictureRepositoryInterface;
use App\Repositories\Classes\ChapterPictureRepository;
use App\Models\ChapterPicture;
class ChapterPicsController extends BaseController
{
    private ChapterPictureRepositoryInterface $repository;
    public function __construct()
    {
        $repository=new ChapterPictureRepository(new ChapterPicture());
    }
    public function create(){
        $data=$this->request->getFiles();
        if($this->validate([
            "manga_id"=>"required|numeric",
            "chapter_id"=>"required|numeric",
        ])){
            return $this->response->setJSON(['data' => "valid"]);
        }
        return $this->response->setJSON(['data' => "not valid"]);
    }
}
