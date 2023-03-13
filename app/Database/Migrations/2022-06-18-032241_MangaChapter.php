<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MangaChapter extends Migration
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
                "manga_id" =>[
                    "type"=>"bigint",
                    
                    "null"=>false
                ],
                "chapter_id" =>[
                    "type"=>"bigint",
                    
                    "null"=>false
                ],
                "created_at timestamp default current_timestamp",
                "updated_at timestamp ON update current_timestamp"
            ]
            );
        $this->forge->addPrimaryKey("id");
        $this->forge->addForeignKey("manga_id",'manga','id','cascade','cascade');
        $this->forge->addForeignKey("chapter_id",'chapter','id','cascade','cascade');
        $this->forge->createTable('manga_chapter');
    }
    
    public function down()
    {
        $this->forge->dropTable('manga_chapter');
    }
}
