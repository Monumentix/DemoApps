
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
    <h3>Filter Characters:</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <?=$form->field($model,'nameStartsWith')?>
  </div>
  <div class="col-sm-3">
    <?=$form->field($model,'orderBy')->dropDownList($model->getOrderByTypes());?>
  </div>
  <div class="col-sm-3">
    <?=$form->field($model,'limit')->dropDownList($model->getLimitByTypes());?>
  </div>
</div>
<div class="row hidden">
  <div class="col-xs-12">
    <?=$form->field($model,'offset')->hiddenInput()->label(false)?>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 text-center">
    <h3><?php echo Html::submitButton(Icon::show('filter').' Filter', ['class' => 'btn btn-success shadow']) ?></h3>

  </div>
</div>
<?php ActiveForm::end(); ?>
<hr class="comics-divider">
