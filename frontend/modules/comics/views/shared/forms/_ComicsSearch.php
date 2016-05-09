
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Dropdown;

use kartik\icons\Icon;

?>
<?php $form = ActiveForm::begin([
  //'method'=>'POST',
  'id'=>'comics-search-form',
  'action'=>'',
]); ?>

<div class="row">
  <div class="col-sm-12">
    <h3>Filter Comics:</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <?=$form->field($model,'titleStartsWith')?>
    <?=$form->field($model,'title')?>

  </div>
  <div class="col-sm-6">


    <div class="row">
      <div class="col-xs-6">
        <?=$form->field($model,'issueNumber')?>
      </div>
      <div class="col-xs-6">
        <?=$form->field($model,'noVariants')->dropDownList($model->getNoVariantsTypes());?>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-6">
        <?=$form->field($model,'format')->dropDownList($model->getFormats());?>
      </div>
      <div class="col-xs-6">
        <?=$form->field($model,'formatType')->dropDownList($model->getFormatTypes());?>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-4">
    <?=$form->field($model,'diamondCode')?>
  </div>
  <div class="col-sm-4">
    <?=$form->field($model,'digitalId')?>
  </div>
  <div class="col-sm-4">
    <?=$form->field($model,'upc')?>
  </div>
</div>



<div class="row">
  <div class="col-sm-4 col-sm-offset-2">
    <?=$form->field($model,'orderBy')->dropDownList($model->getOrderByTypes());?>
    <?=$form->field($model,'offset')->hiddenInput()->label(false)?>
    <?=$form->field($model,'seriesId')->hiddenInput()->label(false)?>
  </div>
  <div class="col-sm-4">
    <?=$form->field($model,'limit')->dropDownList($model->getLimitByTypes());?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 text-center">
    <h3><?php echo Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-success shadow']) ?></h3>
  </div>
</div>
<?php ActiveForm::end(); ?>
<hr class="comics-divider">
