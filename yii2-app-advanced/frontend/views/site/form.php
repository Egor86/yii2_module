<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\form\models\PersonData */
/* @var $form ActiveForm */
?>
<div class="coomon-modules-form-views-persone-data-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'surname') ?>
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
        ]); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- coomon-modules-orders-views-persone-data-orders -->
