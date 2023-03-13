<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Manga extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                "id" =>[
                    "type"=>"bigint",
                    "auto_increment"=>true,
                    "null"=>false
                ],
                'name'=>[
                    "type"=>"varchar",
                    "constraint"=>250,
                    'null'=>false
                ],
                "created_at timestamp default current_timestamp",
                "updated_at timestamp ON update current_timestamp"
            ]
            );
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable('manga');
    }


    public function down()
    {
        $this->forge->dropTable("manga",true);
    }
}
