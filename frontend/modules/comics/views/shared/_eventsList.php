<?php
  use yii\helpers\Html;
?>

<?php if(!empty($events['events'])) : ?>
  <div class="panel panel-monumentix panel-seriesEventsItems">
    <div class='panel-heading'>
      <h3 class="panel-title">Events: (<?=$events['events']['available']?>)</h3>
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
          <p class="text-center limited-to">Limited to <b><?=$events['events']['returned']?></b> results.
            &nbsp;
            <?=Html::a('View More',
              ['events','id'=>$id]);?>
          </p>
    </div>
  </div>
<?php endif ?>








<?php
if(!empty($series['events'])){
  echo'<ul class="seriesEventsItems">';

    foreach($series['events']['items'] as $event ){
      echo'<li class="seriesEventItem">';
      echo Html::a($event['name'],[
        'events','id'=>array_pop(explode("/",$event['resourceURI']))
      ]);
      echo"</li>";
    }

  echo'</ul">';
}
?>
