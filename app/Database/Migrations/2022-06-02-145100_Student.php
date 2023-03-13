<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                "type"=>"int",
                "primary_key"=>true,
                "auto_increment"=>true
            ],
            "name"=>[
                'type'=>"varchar",
                'constraint'=>110
            ],
            "address"=>[
                'type'=>"varchar",
                'constraint'=>255
            ],
            "created_at timestamp not null default current_timestamp",
            "updated_at timestamp default current_timestamp"
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey("name");
        $this->forge->createTable("students");
    }

    public function down()
    {
        $this->forge->dropTable("students");
    }
}
