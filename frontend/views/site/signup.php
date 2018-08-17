<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Hospital;
use yii\helpers\ArrayHelper;	

$this->title = 'Register Doctor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register and create an account for a doctor:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-create']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($modelB, 'hospital_id')->dropDownList(
            ArrayHelper::map(Hospital::find()->asArray()->all(), 'id', 'name')
            ) ?>

            <?= $form->field($modelB, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelB, 'middle_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelB, 'last_name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
