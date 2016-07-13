<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 13.07.2016
 * Time: 10:41
 */
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'name') ?>

<?= $form->field($user, 'email') ?>

<?= $form->field($user, 'inn') ?>

<?= $form->field($user, 'password') ?>

<?= $form->field($user, 'phone') ?>

<?= $form->field($user, 'status') ?>

<?= $form->field($user, 'city_id')
    ->dropDownList(
        ArrayHelper::map($cities, 'id', 'cityName')
    );
?>

<div class="form-group">
    <?= Html::submitButton() ?>
</div>

<?php ActiveForm::end(); ?>




