<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Dropdown;

use kartik\icons\Icon;

?>
<?php $form = ActiveForm::begin([
  //'method'=>'POST',
  'action'=>'series',
]); ?>


<div class="row">
  <div class="col-sm-8">
    <?=$form->field($model,'title')?>
    <?=$form->field($model,'titleStartsWith')?>
    <?php //=$form->field($model,'comics')?>
    <?php //=$form->field($model,'stories')?>
  </div>
  <div class="col-sm-4">
    <div class="row">
      <div class="col-sm-12">
        <?=$form->field($model,'startYear')?>
        <?=$form->field($model,'modifiedSince')?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
    <?=$form->field($model,'seriesType')->dropDownList($model->getSeriesTypes());?>
  </div>
  <div class="col-xs-4">
    <?=$form->field($model,'contains')->dropDownList($model->getContainsTypes());?>
  </div>
  <div class="col-xs-4">
    <?=$form->field($model,'orderBy')->dropDownList($model->getOrderByTypes());?>
  </div>
</div>


<div class="row display-table">
  <div class="col-xs-4 col-xs-offset-1 display-cell text-center">
    <?=$form->field($model,'limit')->dropDownList($model->getLimitByTypes());?>
    <?=$form->field($model,'id')->hiddenInput()->label(false)?>
    <?php //=$form->field($model,'offset')->hiddenInput()->label(false)?>
    <?=$form->field($model,'offset')?>
  </div>
  <div class="col-xs-6 display-cell text-center">
    <p><b>Search Marvels Database</b></p>
    <?php echo Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-success shadow']) ?>
  </div>
</div>
<?php ActiveForm::end(); ?>
<hr class="comics-divider">
