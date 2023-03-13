<?php

namespace App\Repositories\Interfaces;


interface MainRepositoryInterface {
    function getAll();
    function getOne(int $id);
    function insert(array $arr);
    function update(int $id,array $array);
    function delete(int $id);
}