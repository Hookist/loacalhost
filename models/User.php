<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 13.07.2016
 * Time: 10:12
 */

namespace app\models;


use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public function rules()
    {
        return [
            [
                ['email', 'password', 'phone', 'name'], 'required', "message" => 'поле обязательно'

            ],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^(\+?38\s?|)(|\()[0-9]{3}(|\))\s?(|\-)[0-9]{3}\s?(|\-)[0-9]{2}\s?(|\-)[0-9]{2}$/'],
            ['name', 'string', 'min' => 2, 'max' => 12],
            ['status', 'in', 'range' => ['active', 'inactive']],
            ['city_id', 'integer']
        ];
    }

    public function beforeSave($insert)
    {
        $this->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        return true;
    }
}