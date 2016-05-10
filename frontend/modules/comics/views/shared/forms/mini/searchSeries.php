
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Dropdown;

use kartik\icons\Icon;

?>
<div class="well well-sm">
  <?php $form = ActiveForm::begin([
    //'method'=>'POST',
    'id'=>'series-mini-search-form',
    'action'=>'/comics/series',
  ]); ?>

  <?=$form->field($model,'titleStartsWith')?>

  <?php echo Html::submitButton(Icon::show('search').' Search', ['class' => 'btn btn-success shadow']) ?></h3>

  <?php ActiveForm::end(); ?>
</div>
