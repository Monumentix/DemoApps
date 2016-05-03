<?php
  use yii\helpers\Html;
?>

<?php if(!empty($events['events']['available'])) : ?>
  <div class="panel panel-monumentix panel-seriesEventsItems">
    <div class='panel-heading'>
      <h3 class="panel-title">Events:<span class="pull-right">(<?=$events['events']['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <ul class="seriesEventsItems">
        <?php foreach($events['events']['items'] as $event) : ?>
          <li class="seriesEventItem">
            <?= Html::a($event['name'],[
              'events','id'=>array_pop(explode("/",$event['resourceURI'])),
            ]);?>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class='panel-footer text-center'>
          <p class="text-center limited-to">Showing <b><?=$events['events']['returned']?></b> out of <b><?=$events['events']['available']?></b> results.
            &nbsp;
            <?=Html::a('View More',
              ['events','id'=>$id]);?>
          </p>
    </div>
  </div>
<?php endif ?>
