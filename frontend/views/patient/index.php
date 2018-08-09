<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <!--
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'middle_name',
            'last_name',
            'birthdate',
            //'sex',
            //'civil_status',
            //'place_of_birth',
            //'nationality',
            //'religion',
            //'address_line1',
            //'address_line2',
            //'city',
            //'province',
            //'zip',
            //'email:email',
            //'phone_no',

            ['class' => 'yii\grid\ActionColumn',
		'template'=>'{view} ' ],
        ],
    ]); ?>
</div>
