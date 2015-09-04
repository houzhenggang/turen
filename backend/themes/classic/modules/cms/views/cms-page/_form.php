<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\cms\CmsClass;
use common\components\helpers\General;

/* @var $this yii\web\View */
/* @var $model common\models\cms\CmsPage */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord) {
    $model->status = true;
    $model->order = 10;
}
//type = 0为单页
//$items = ArrayHelper::map(General::recursiveObj(CmsClass::find()->where(['type'=>0])->orderBy(['order'=>SORT_ASC])->all()), 'id', 'name');
?>

<div class="row cms-page-form">
    <div class="col-md-12">
        <?php 
		//广泛布局
		$form = ActiveForm::begin([
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label} {beginWrapper} {input} {hint} {error} {endWrapper}",
				'horizontalCssClasses' => [
					'label' => 'col-sm-2',
					'offset' => 'col-sm-offset-2',
					'wrapper' => 'col-sm-8',
					'error' => '',//col-sm-8 col-sm-offset-2
					'hint' => '',//col-sm-8 col-sm-offset-2
				],
			],
		]);
		?>
        
        <?php //echo $form->field($model, 'cms_class_id')->dropDownList($items) ?>
        <?php //echo $form->field($model, 'cmsClass.name')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'pic_url')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
        <?= $form->field($model, 'order')->input('number') ?>
    
        <?= $form->field($model, 'status')->checkbox()->label($model->getAttributeLabel('status').str_repeat('&nbsp;', 6).'<i class="fa fa-info-circle"></i> '.Yii::t('cms', 'Don\'t show in the frontend,If you don\'t choose')) ?>
        
        <div class="form-group">
	        <div class="col-sm-8 col-sm-offset-2">
	        	<?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
        </div>
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
