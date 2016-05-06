<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Dropdown;

use kartik\icons\Icon;


?>
<?php $form = ActiveForm::begin([
  'method'=>'GET',
]); ?>

<div class="row">
  <div class="col-sm-12">
    <h2 class="title">Marvel API (/comics) : <span class="lead">Fetches lists of comics with optional filters</span></h2>
  </div>
  <div class="col-sm-6">
    <?=$form->field($comicsModel,'title')?>
    <?=$form->field($comicsModel,'titleStartsWith')?>
  </div>
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-6">
        <?=$form->field($comicsModel,'issueNumber')?>
        <?=$form->field($comicsModel,'format')->dropDownList($comicsModel->getFormats());?>
      </div>
      <div class="col-xs-6">
        <?=$form->field($comicsModel,'upc')?>
        <?=$form->field($comicsModel,'formatType')->dropDownList($comicsModel->getFormatTypes());?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <?=$form->field($comicsModel,'orderBy')->dropDownList($comicsModel->getOrderByTypes());?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 text-center">
    <?= Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-primary shadow']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
