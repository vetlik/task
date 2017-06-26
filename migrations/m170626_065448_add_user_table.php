<?php

use yii\db\Schema;
use yii\db\Migration;

class m170626_065448_add_user_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'surname' => Schema::TYPE_STRING,
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'role' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 1',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        if(Yii::$app->controller->confirm("Add test user 'root'?")){
            $now = time();
            $this->insert('{{%user}}',[
                'username' => 'root',
                'surname' => 'root',
                'auth_key' => Yii::$app->security->generateRandomString(32),
                'password_hash' => Yii::$app->security->generatePasswordHash('root'),
                'email' => 'root@mail.com',
                'status' => 10,
                'role' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
