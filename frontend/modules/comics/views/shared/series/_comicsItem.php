<?php
  use yii\helpers\Html;
?>

<?php if(!empty($comics['items'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Comics In This Series (<?=$comics['available']?>)</h3>
    </div>
    <div class='panel-body'>
      <div class="row creators text-center">
        <?php  foreach($comics['items'] as $comic) : ?>
          <div class="col-sm-6"><?=$comic['name']; ?></div>
        <?php  endforeach ?>
      </div>
    </div>
    <div class='panel-footer'>
      <p class="text-center"><span class="text-center limited-to">Limited to <b><?=$comics['returned']?></b> results. </span>
        &nbsp;
      <span class="text-center view-all">
        <?=Html::a('View More',
          ['comics','id'=>$id]);?>
      </span></p>
    </div>
  </div>
<?php endif ?>
