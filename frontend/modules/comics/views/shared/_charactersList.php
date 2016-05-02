<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series['characters'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Characters: <span class="pull-right">(<?=$series['characters']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <ul class="creators">
        <?php foreach($series['characters']['items'] as $characters) : ?>
          <li><?=$characters['name']; ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$series['characters']['returned']?></b> out of <b><?=$series['characters']['available']?></b> results.
      &nbsp;
        <?=Html::a('View More',
          ['characters','id'=>$id]);?>
      </p>
    </div>
  </div>
<?php endif ?>
