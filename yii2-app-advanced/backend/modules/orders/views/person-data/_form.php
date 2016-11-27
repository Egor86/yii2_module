<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->input('date') ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(),[
        'name' => 'phone',
        'mask' => '(999) 999-99-99',
        'clientOptions' => [
            'removeMaskOnSubmit' => true,
        ]]); ?>

    <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
        'name' => 'email',
        'clientOptions' => ['alias' =>  'email']
    ]);  ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\PersonData::getStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
