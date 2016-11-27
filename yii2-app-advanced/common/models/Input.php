<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "input".
 *
 * @property string $id
 * @property string $form_id
 * @property integer $input_id
 * @property string $default
 * @property string $placeholder
 * @property integer $required
 *
 * @property Form $form
 */
class Input extends \yii\db\ActiveRecord
{
    const INPUT = 0;
    const DATE = 1;
    const CHECKBOX = 2;
    const OPTION = 3;
    const TEXT_AREA = 4;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'input';
    }

    public static function getInputsName()
    {
        return [
            self::INPUT => 'text',
            self::DATE => 'date',
            self::CHECKBOX => 'checkbox',
            self::OPTION => 'select',
            self::TEXT_AREA => 'textarea'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_id', 'input_id'], 'required'],
            [['form_id', 'input_id', 'required'], 'integer'],
            [['default', 'placeholder'], 'string', 'max' => 50],
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
            'form_id' => 'Form ID',
            'input_id' => 'Input type',
            'default' => 'Default',
            'placeholder' => 'Placeholder',
            'required' => 'Required',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Form::className(), ['id' => 'form_id']);
    }

    /**
     * @inheritdoc
     * @return InputQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InputQuery(get_called_class());
    }
}
