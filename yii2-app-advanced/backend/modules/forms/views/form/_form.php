<?php

use common\models\Input;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Form */
/* @var $form yii\widgets\ActiveForm */
/* @var array $models  */
?>

<div class="form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->radioList(['NOT_ACTIVE', 'ACTIVE']) ?>

    <?= $model->isNewRecord ? $form->field($model, 'input_sum')->input('number') : '' ?>

    <?php if (!$model->isNewRecord) : ?>
        <?php foreach ($models as $index => $model) : ?>

            <?= $form->field($model,
                "[$index]id")->hiddenInput(['value' =>
                $models[$index]->id])->label(false) ?>

            <?= $form->field($model,
                "[$index]form_id")->hiddenInput(['value' =>
                $models[$index]->form_id])->label('Input '. ($index+1)) ?>

            <?= $form->field($model, "[$index]input_id")->dropDownList(Input::getInputsName()) ?>

            <?= $form->field($model, "[$index]default")
                ->textInput(['maxlength' => true, 'options' => ['style' => 'width: 30%']])
                ->hint('Если выбран select, необходимо через пробел указать options') ?>

            <?= $form->field($model, "[$index]placeholder")
                ->textInput(['maxlength' => true])
                ->hint('Для select, date и checkbox значение будет использовано как лейбл') ?>

            <?= $form->field($model, "[$index]required")->checkbox() ?>
        <?php endforeach; ?>
    <?php endif;?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
