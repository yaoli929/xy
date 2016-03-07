<?php

use yii\db\Migration;

class m160301_032530_create_admin extends Migration
{
    public function up()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'email' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'create_time' => $this->string()->notNull(),
            'update_time' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('admin');
    }
}
