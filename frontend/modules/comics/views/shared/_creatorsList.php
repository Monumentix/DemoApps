<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series['creators'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Creators (<?=$series['creators']['available']?>)</h3>
    </div>
    <div class='panel-body'>
      <ul class="creators">
        <?php foreach($series['creators']['items'] as $creator) : ?>
          <li><?=$creator['name']; ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Limited to <b><?=$series['creators']['returned']?></b> results. &nbsp;

        <?=Html::a('View More',
          ['creators','id'=>$id]);?>
      </p>

    </div>
  </div>
<?php endif ?>
