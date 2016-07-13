<?php
$f = \yii\bootstrap\ActiveForm::begin();
    echo $f->field($model, "name");
    echo $f->field($model, "email")->textInput(['placeholder'=>'email@domain.com']);
    echo $f->field($model, "phone")->input('number');
    echo $f->field($model, "promo")->input('number', ['class'=>'MyClass']);
    echo $f->field($model, "status")->dropDownList(['active' => 'Активный', 'inactive' => 'Не Активный']);
    echo $f->field($model, "inn")->input('number');
    echo \yii\helpers\Html::submitButton('Send');
$f = \yii\bootstrap\ActiveForm::end();
?>
