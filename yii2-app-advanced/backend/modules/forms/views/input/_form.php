<?php

use common\models\Input;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var array $models  */
/* @var $form yii\widgets\ActiveForm */
/* @var array $models */

?>

<div class="input-form">

    <?php $form = ActiveForm::begin(['action' => 'save']); ?>

        <?php foreach ($models as $index => $model) : ?>

            <?= $form->field($model,
                "[$index]form_id")->hiddenInput(['value' =>
                $models[$index]->form_id])->label('Input '.++$index) ?>

            <?= $form->field($model, "[$index]input_id")->dropDownList(Input::getInputsName()) ?>

            <?= $form->field($model, "[$index]default")
                ->textInput(['maxlength' => true, 'options' => ['style' => 'width: 30%']])
                ->hint('Для select и checkbox значение будет использовано как лейбл') ?>

            <?= $form->field($model, "[$index]placeholder")
                ->textInput(['maxlength' => true])
                ->hint('Если выбран select, необходимо через пробел указать options') ?>

            <?= $form->field($model, "[$index]required")->checkbox() ?>
        <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
