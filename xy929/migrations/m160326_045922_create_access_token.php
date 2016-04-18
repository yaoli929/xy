<?php

use yii\db\Migration;

class m160326_045922_create_access_token extends Migration
{
    public function up()
    {
        $this->createTable('access_token', [
            'id' => $this->primaryKey(),
            'access_token' => $this->string()->notNull()->unique(),
            'expire_time' => $this->integer()->notNull(),
            'create_time' => $this->integer()->notNull(),
            'update_time' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('access_token');
    }
}
