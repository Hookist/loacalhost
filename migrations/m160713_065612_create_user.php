<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 * Has foreign keys to the tables:
 *
 * - `city`
 */
class m160713_065612_create_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'city_id' => $this->integer(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'phone' => $this->string(),
            'status' => 'enum("active", "unactive")',
            'inn' => $this->integer(),
        ]);

        // creates index for column `city_id`
        $this->createIndex(
            'idx-user_city_id',
            'user',
            'city_id'
        );

        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-user_city_id',
            'user',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `city`
        $this->dropForeignKey(
            'fk-user_city_id',
            'user'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            'idx-user_city_id',
            'user'
        );

        $this->dropTable('user');
    }
}
