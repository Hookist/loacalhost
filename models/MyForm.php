<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 01.07.2016
 * Time: 10:09
 */

namespace app\models;


use yii\base\Model;

class MyForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $promo;
    public $status;
    public $inn;

    public function IsInn($att)
    {

        if($this->$att == "123321")
        {
            return true;
        }
        else
        {
            $this->addError($att, "Error, incorect INN");
            return false;
        }

    }

    public function rules()
    {
        return[
            [['email', 'phone', 'name'], "required", "message" => 'Поле Обязательное'],
            ['email', 'email'],
            ['name', 'string', "min" => 6, "max" => 16],
            ['promo', 'number', "min" => 20, "max" => 40],
            ['email', 'trim'],
            ['phone', 'match', 'pattern' => '/^(\+?38\s?|)(|\()[0-9]{3}(|\))\s?(|\-)[0-9]{3}\s?(|\-)[0-9]{2}\s?(|\-)[0-9]{2}$/'],
            ['status', 'in', 'range' => ['active', 'inactive']],
            ['inn', 'IsInn', "message" => 'Поле Обязательное']
        ];
    }
}