<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property integer $input_sum
 *
 * @property Input[] $inputs
 */
class Form extends \yii\db\ActiveRecord
{
    const NOT_ACTIVE = 0;
    const ACTIVE = 1;

    public $input_sum;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form';
    }

    public function afterDelete() {
        parent::afterDelete();
        $inputs = $this->inputs;
        foreach ($inputs as $input) {
            $input->delete();
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if (!$insert) {
            $models = [];
            $post = Yii::$app->request->post('Input');
            for ($i = 0; $i < count($post); $i++) {
                $models[$i] = Input::findOne($post[$i]['id']);
                if (!$models[$i] || !$models[$i]->load($post, $i)) {
                    return false;
                }
            }
            foreach ($models as $model) {
                if (!$model->save()) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            ['input_sum', 'required', 'when' => function($model) {
                return $model->isNewRecord;
            }],
            [['status', 'input_sum'], 'integer'],
            [['name'], 'string', 'max' => 50],
            ['status', 'default', 'value' => self::NOT_ACTIVE],
            ['input_sum', 'number', 'min' => 1, 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'input_sum' => 'Inputs quantity'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInputs()
    {
        return $this->hasMany(Input::className(), ['form_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FormQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FormQuery(get_called_class());
    }
}
