<?php
  use yii\helpers\Html;
?>

<?php if(!empty($series['creators'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Creators: <span class="pull-right">(<?=$series['creators']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>




      <?php if(!empty($listOptions['columnClass'])) : ?>
        <div class="creators">
          <?php foreach($series['creators']['items'] as $creator) : ?>
            <div class="<?=$listOptions['columnClass']?>"><?=$creator['name']; ?></div>
          <?php endforeach ?>
        </div>
      <?php else : ?>
        <ul class="creators">
          <?php foreach($series['creators']['items'] as $creator) : ?>
            <li><?=$creator['name']; ?></li>
          <?php endforeach ?>
        </ul>
    <?php endif ?>



    </div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Showing <b><?=$series['creators']['returned']?></b> out of <b><?=$series['creators']['available'] ?></b> results. &nbsp;
        <?=Html::a('View More',
          ['creators','id'=>$id]);?>
      </p>

    </div>
  </div>
<?php endif ?>
