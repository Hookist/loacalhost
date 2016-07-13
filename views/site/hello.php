<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 01.07.2016
 * Time: 9:53
 */
$f = \yii\widgets\ActiveForm::begin();

echo $f->field($form, 'name');
echo $f->field($form, 'email');

echo \yii\helpers\Html::submitButton('Send');
\yii\widgets\ActiveForm::end();
?>

