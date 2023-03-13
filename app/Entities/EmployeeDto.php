<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EmployeeDto extends Entity
{
    protected $attributes=[
        'id'=>null,
        'name'=>null,
        'address'=>null,
    ];
    // protected $dates=[
    //     'created_at',
    //     'updated_at'
    // ];
    protected $casts=[
        'id'=>'int',
        "name"=>'string',
        'address'=>'string',
        
    ];
}
