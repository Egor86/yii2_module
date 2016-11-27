<?php

/** @var array $inputs */
/** @var $input \common\models\Input*/
/** @var integer $form_id */

use common\models\Input;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<?php $form = ActiveForm::begin(['action' => 'save']); ?>
    <div class="form-group">
        <input type="hidden" name="InputsData[form_id]" value="<?= $form_id?>">
    <?php foreach ($inputs as $index => $input) : ?>

        <?php if (in_array($input->input_id, [Input::INPUT, Input::CHECKBOX, Input::DATE])) : ?>

            <?php if (in_array($input->input_id, [Input::CHECKBOX, Input::DATE])) {?>
                <div class="form-group">
                    <label class="control-label" for="input"><?= $input->placeholder?></label>
                    <input class="form-control" id="input" type="<?= Input::getInputsName()[$input->input_id]?>"
                           name="InputsData[input<?= $index?>]" value="<?= $input->default?>" <?= $input->required ? 'required' : ''?>>
                </div>
            <?php continue; }?>

            <div class="form-group">
                <input class="form-control" id="input" type="text"
                       name="InputsData[input<?= $index?>]"
                       value="<?= $input->default?>"
                    <?= $input->required ? 'required' : ''?>
                       placeholder="<?= $input->placeholder?>">
            </div>

        <?php continue; endif;?>

        <?php if ($input->input_id === Input::TEXT_AREA) : ?>
            <div class="form-group">
            <textarea class="form-control"
                      name="InputsData[input<?= $index?>]"
                      placeholder="<?= $input->placeholder?>"
                <?= $input->required ? 'required' : ''?>><?= $input->default?></textarea>
            </div>
        <?php continue; endif;?>

        <?php if ($input->input_id === Input::OPTION) : ?>
        <div class="form-group">
            <label class="control-label" for="select"><?= $input->placeholder?></label>
            <select id="select" class="form-control" name="InputsData[input<?= $index?>]" <?= $input->required ? 'required' : ''?>>
                <?php $options = explode(' ', $input->default);?>
                <?php foreach ($options as $key => $option) {?>
                    <option value="<?= $key?>"><?= $option?></option>
                <?php }?>
            </select>
        </div>
        <?php continue; endif;?>
    <?php endforeach;?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>