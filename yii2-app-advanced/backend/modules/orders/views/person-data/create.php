<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonData */

$this->title = 'Create Person Data';
$this->params['breadcrumbs'][] = ['label' => 'Person Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
