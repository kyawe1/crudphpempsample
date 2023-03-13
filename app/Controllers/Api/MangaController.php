<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Repositories\Interfaces\MangaRepositoryInterface;
use App\Repositories\Classes\MangaRepository;
use App\Models\Manga;

class MangaController extends BaseController
{
    public MangaRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new MangaRepository(new Manga());
    }
    public function index()
    {
        // dd($this->request->getGet(['name', 'password']));
        $data = $this->repository->getAll();
        if ($data)
            return $this->response->setJSON(['data' => $data]);
        return $this->response->setJSON(['message' => "No Data Found"]);
    }
    public function create()
    {
        if ($this->validate([
        'name' => ['required', 'alpha_numeric_space']
        ])) {
            $data = $this->repository->insert($this->request->getPost());
            if ($data)
                return $this->response->setJSON(['message' => "Created Successfully"]);
            return $this->response->setJSON(['message' => "Cannot Create New"]);
        }
    }
    public function update(int $id)
    {
        if($this->validate([
            'name'=>['required','alpha_numeric_space']
        ])){
            $data=$this->repository->update($id,$this->request->getPost());
            if($data){
                return $this->response->setJSON(['message' => "Updated Successfully"]);
            }
            return $this->response->setJSON(['message' => "Cannot Update"]);
        }
    }
    public function delete(int $id)
    {
        $data=$this->repository->delete($id);
        if($data){
            return $this->response->setJSON(['message' => "Deleted Successfully"]);
        }
        return $this->response->setJSON(['message' => "Cannot Delete"]);
    }
    public function detail(int $id){
        $data=$this->repository->getSeriesRelatedChapter($id);
        return $this->response->setJSON([$data]);
    }
}
