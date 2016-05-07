<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Dropdown;

use kartik\icons\Icon;

?>
<?php $form = ActiveForm::begin([
  //'method'=>'POST',
  'action'=>'',
]); ?>

<div class="row">
  <div class="col-sm-12">
    <?=$form->field($model,'modifiedSince')?>
  </div>
</div>

<div class="row">
  <div class="col-sm-3">
    <?=$form->field($model,'comics')?>
  </div>
  <div class="col-sm-3">
    <?=$form->field($model,'events')?>
  </div>
  <div class="col-sm-3">
    <?=$form->field($model,'creators')?>
  </div>
  <div class="col-sm-3">
    <?=$form->field($model,'characters')?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-2 text-center">
        <?=$form->field($model,'orderBy')->dropDownList($model->getOrderByTypes());?>
        <?=$form->field($model,'offset')->hiddenInput()->label(false)?>
      </div>
      <div class="col-sm-4 text-center">
        <?=$form->field($model,'limit')->dropDownList($model->getLimitByTypes());?>
        <?=$form->field($model,'seriesId')->hiddenInput()->label(false)?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 text-center">
    <h3><?php echo Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-success shadow']) ?></h3>
  </div>
</div>
<?php ActiveForm::end(); ?>
<hr class="comics-divider">
