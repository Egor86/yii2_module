<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/** @var array $models */

$this->title = 'Create Input';
$this->params['breadcrumbs'][] = ['label' => 'Inputs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
