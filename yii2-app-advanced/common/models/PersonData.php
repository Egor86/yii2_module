<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person_data".
 *
 * @property string $id
 * @property string $name
 * @property string $surname
 * @property string $birth_date
 * @property string $phone
 * @property string $email
 * @property integer $status
 */
class PersonData extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_IN_PROCESSED = 1;
    const STATUS_DONE = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_data';
    }

    public static function getStatus()
    {
        return [
            self::STATUS_NEW => 'Не обработана',
            self::STATUS_IN_PROCESSED => 'Обработана',
            self::STATUS_DONE => 'Закрыта',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'birth_date', 'phone', 'email',], 'required'],
            [['birth_date'], 'safe'],
            ['email', 'email'],
            ['status', 'default', 'value' => self::STATUS_NEW],
            [['status'], 'integer'],
            [['name', 'surname', 'email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
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
            'surname' => 'Surname',
            'birth_date' => 'Birth Date',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
