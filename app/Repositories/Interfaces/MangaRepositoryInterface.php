<?php

namespace App\Repositories\Interfaces;


interface MangaRepositoryInterface extends MainRepositoryInterface{
    function getSeriesRelatedChapter(int $id);

}