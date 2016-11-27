<?php

namespace backend\modules\forms\controllers;

use Yii;
use common\models\Input;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InputController implements the CRUD actions for Input model.
 */
class InputController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Creates a new Input model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($form_id, $input_sum)
    {
        $models = array_fill(
            0,
            $input_sum,
            new Input(['form_id' => $form_id])
        );

        return $this->render('create', [
            'models' => $models,
        ]);
    }

    public function actionSave()
    {
        if (Yii::$app->request->post()) {
            $models = [];
            $post = Yii::$app->request->post('Input');
            for ($i = 0; $i < count($post); $i++) {
                $models[$i] = new Input();
                if (!$models[$i]->load($post, $i)) {
                    return $this->redirect(['create',
                        'form_id' => $post[$i]['form_id'],
                        'input_sum' => count($post),
                    ]);
                }
            }

            foreach ($models as $model) {
                if (!$model->save()) {
                    return $this->render('create', [
                        'models' => $models,
                    ]);
                }
            }
            return $this->redirect(['form/view', 'id' => $models[0]->form_id]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Input model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Input the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Input::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
