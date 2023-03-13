<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Repositories\Classes\ChapterRepository;
use App\Repositories\Interfaces\ChapterRepositoryInterface;
use App\Models\Chapter;
use App\Repositories\Interfaces\MangaChapterRepositoryInterface;
use App\Models\MangaChapter;
use App\Repositories\Classes\MangaChapterRepository;

class ChapterController extends BaseController
{
    private ChapterRepositoryInterface $repository;
    private MangaChapterRepositoryInterface $repositoryMangaChapters;
    public function __construct()
    {
        $this->repository = new ChapterRepository(new Chapter());
        $this->repositoryMangaChapters = new MangaChapterRepository(new MangaChapter());
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
        'manga_id' => ['required', "numeric"],
        'name' => ['required', 'alpha_numeric_space']
        ])) {
            $data = $this->repository->insert($this->request->getPost(['name']));
            $this->repositoryMangaChapters->insert(['manga_id' => $this->request->getPost(['manga_id']), 'chapter_id' => $data]);
            if ($data)
                return $this->response->setJSON(['message' => "Created Successfully"]);
            return $this->response->setJSON(['message' => "Cannot Create New"]);
        }
        return $this->response->setJSON(["Not VAlidated DAta"]);
    }
    public function update(int $id)
    {
        if ($this->validate([
        'name' => ['required', 'alpha_numeric_space']
        ])) {
            $data = $this->repository->update($id, $this->request->getPost());
            if ($data) {
                return $this->response->setJSON(['message' => "Updated Successfully"]);
            }
            return $this->response->setJSON(['message' => "Cannot Update"]);
        }
    }
    public function delete(int $id)
    {
        $data = $this->repository->delete($id);
        if ($data) {
            return $this->response->setJSON(['message' => "Deleted Successfully"]);
        }
        return $this->response->setJSON(['message' => "Cannot Delete"]);
    }


}
