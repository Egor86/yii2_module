<?php

namespace frontend\modules\forms\controllers;

use common\models\InputsData;
use common\models\Form;
use common\models\Input;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `forms` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'save' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionForm($id)
    {
        $form = Form::findOne($id);
        if ($form && $form->status == Form::ACTIVE) {
            $inputs = Input::findAll(['form_id' => $form->id]);
            return $this->render('form', ['inputs' => $inputs, 'form_id' => $form->id]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSave()
    {
        $model = new InputsData();
        \Yii::$app->session->setFlash('error', 'Form was not saved');
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->removeAllFlashes();
            \Yii::$app->session->setFlash('success', 'Form was saved successful!');
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }
}
