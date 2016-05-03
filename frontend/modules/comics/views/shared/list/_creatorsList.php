<?php
  use yii\helpers\Html;
?>

<?php if(!empty($creators['creators'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Creators: <span class="pull-right">(<?=$creators['creators']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <?php if(!empty($listOptions['columnClass'])) : ?>
        <div class="creators">
          <?php foreach($creators['creators']['items'] as $creator) : ?>
            <div class="<?=$listOptions['columnClass']?>"><?=$creator['name']; ?></div>
          <?php endforeach ?>
        </div>
      <?php else : ?>
        <ul class="creators">
          <?php foreach($creators['creators']['items'] as $creator) : ?>
            <li><?=$creator['name']; ?></li>
          <?php endforeach ?>
        </ul>
    <?php endif ?>



    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$creators['creators']['returned']?></b> out of <b><?=$creators['creators']['available'] ?></b> results. &nbsp;
        <?=Html::a('View More',
          ['creators','id'=>$id]);?>
      </p>

    </div>
  </div>
<?php endif ?>
