<?php
  use yii\helpers\Html;
?>


  <div class="panel panel-monumentix  --panel-seriesEventsItems">
    <div class='panel-heading'>
      <h3 class="panel-title">Events:<span class="pull-right">(<?=$events['available']?>)</span></h3>
    </div>
    <div class='panel-body'>
      <?php if($events['returned'] > 0 ) : ?>
        <?php if(!empty($listOptions['columnClass'])) : ?>
          <div class="events ">
            <?php foreach($events['items'] as $event) : ?>
              <div class="<?=$listOptions['columnClass']?>">
                <?= Html::a($event['name'],[
                  'events','id'=>array_pop(explode("/",$event['resourceURI'])),
                ]);?>
              </div>
            <?php endforeach ?>
          </div>
        <?php else : ?>
          <ul class="events text-left">
            <?php foreach($events['items'] as $event) : ?>
              <li class="--seriesEventItem">
                <?= Html::a($event['name'],[
                  '/comics/events','id'=>array_pop(explode("/",$event['resourceURI'])),
                ]);?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      <?php else :?>
        <h3>No results returned.</h3>
      <?php endif ?>
    </div>

    <div class='panel-footer text-center'>
          <p class="text-center limited-to">Showing <b><?=$events['returned']?></b> out of <b><?=$events['available']?></b> results.
            &nbsp;
              <?php
                if(!(empty($id))){
                  echo Html::a('View More',
                    ['events','id'=>$id]);
                }
              ?>
          </p>
    </div>
  </div>
