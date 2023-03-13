<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"INT",
                "constraint"=>"11"
            ],
            "name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"50"
            ],
            "address"=>[
                "type"=>"VARCHAR",
                "constraint"=>"225"
            ],
            "created_at timestamp not null default current_timestamp",
            "updated_at timestamp not null default current_timestamp"
        ]);
        $this->forge->createTable("employees");
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey("name");
        
    }

    public function down()
    {
        $this->forge->dropTable("employees",true);
    }
}
