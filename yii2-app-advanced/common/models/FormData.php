<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_data".
 *
 * @property string $id
 * @property string $input
 * @property string $date
 * @property string $checkbox
 * @property string $option
 * @property string $textarea
 */
class FormData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['textarea'], 'string'],
            [['input', 'checkbox', 'option'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'input' => 'Input',
            'date' => 'Date',
            'checkbox' => 'Checkbox',
            'option' => 'Option',
            'textarea' => 'Textarea',
        ];
    }

    /**
     * @inheritdoc
     * @return FormDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FormDataQuery(get_called_class());
    }
}
