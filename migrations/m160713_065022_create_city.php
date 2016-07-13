<?php

use yii\db\Migration;

/**
 * Handles the creation for table `city_table`.
 */
class m160713_065022_create_city extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'cityName' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}
