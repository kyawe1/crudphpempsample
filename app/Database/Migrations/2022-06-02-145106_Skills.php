<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skills extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'integer',
                'auto_increment'=>true
            ],
            'name'=>[
                'type'=>'varchar',
                'constraint'=> 200
            ],
            "created_at timestamp default current_timestamp",
            "updated_at timestamp default current_timestamp"
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey("name");
        $this->forge->createTable("skills");
    }

    public function down()
    {
        $this->forge->dropTable("skills");
    }
}
