<?php
  use yii\helpers\Html;
?>

<?php if(!empty($comics['items'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Other Comics In This Series: <span class="pull-right">(<?=$comics['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <div class="row seriesComics text-left">
        <?php  foreach($comics['items'] as $comic) : ?>
          <div class="col-sm-6 seriesComicsTitle"><?=$comic['name']; ?></div>
        <?php  endforeach ?>
      </div>
    </div>
    <div class='panel-footer'>
      <p class="text-center"><span class="text-center limited-to">Showing <b><?=$comics['returned']?></b> out of <b><?=$comics['available']?></b> results. </span>
        &nbsp;
      <span class="text-center view-all">
        <?=Html::a('View More',
          ['comics','id'=>$id]);?>
      </span></p>
    </div>
  </div>
<?php endif ?>
