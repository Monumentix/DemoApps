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
    <h2 class="title">Marvel API (/series) : <span class="lead">Fetches lists of comic series with optional filters.</span></h2>
  </div>
  <div class="col-sm-6">
    <?php //=$form->field($seriesModel,'title')?>
    <?php //=$form->field($seriesModel,'titleStartsWith')?>
  </div>
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-6">
        <?php //=$form->field($seriesModel,'issueNumber')?>
        <?php //=$form->field($seriesModel,'format')->dropDownList($seriesModel->getFormats());?>
      </div>
      <div class="col-xs-6">
        <?php //=$form->field($seriesModel,'upc')?>
        <?php //=$form->field($seriesModel,'formatType')->dropDownList($seriesModel->getFormatTypes());?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <?php //=$form->field($seriesModel,'orderBy')->dropDownList($seriesModel->getOrderByTypes());?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 text-center">
    <?php echo Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-primary shadow']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
