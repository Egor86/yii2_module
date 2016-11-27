<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inputs_data".
 *
 * @property string $id
 * @property string $input0
 * @property string $input1
 * @property string $input2
 * @property string $input3
 * @property string $input4
 * @property string $input6
 * @property string $form_id
 *
 * @property Form $form
 */
class InputsData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inputs_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_id'], 'required'],
            [['form_id'], 'integer'],
            [['input0', 'input1', 'input2', 'input3', 'input4', 'input6'], 'string', 'max' => 255],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Form::className(), 'targetAttribute' => ['form_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'input0' => 'Input0',
            'input1' => 'Input1',
            'input2' => 'Input2',
            'input3' => 'Input3',
            'input4' => 'Input4',
            'input6' => 'Input6',
            'form_id' => 'Form ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Form::className(), ['id' => 'form_id']);
    }
}
