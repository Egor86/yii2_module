<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FormData]].
 *
 * @see FormData
 */
class FormDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FormData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FormData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
