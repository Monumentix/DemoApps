<?php
  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<?php if(!(empty($charactersPaged))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper fjalla">
    <?php foreach($charactersPaged as $character) :?>
    <div class="row display-table  <?=(($cnt & 1 ) ? ' even ' : ' odd ' );?> ">
      <div class="col-xs-2 text-center display-cell">
        <?php if(!(empty($character['thumbnail']))) : ?>
          <img src="<?=$character['thumbnail']['path']?>/standard_medium.<?=$character['thumbnail']['extension']?>" class="img img-thumbnail img-rounded">
        <?php endif; ?>
        <h5><?= $character['name']; ?></h5>
      </div>
      <div class="col-xs-3 display-cell text-center">
        <?php if(!(empty($character['comics']))) : ?>
          <?=$character['comics']['available']?> <br>Comics
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['series']))) : ?>
          <?=$character['series']['available']?> <br> Series
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['stories']))) : ?>
          <?=$character['stories']['available']?> <br>Stories
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['events']))) : ?>
          <?=$character['events']['available']?> <br>Events
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <a href="/comics/characters?id=<?=$character['id']?>" class="btn btn-info btn-xs text-center">Details</a>
      </div>
    </div>
    <?php $cnt++ ?>
  <?php endforeach; ?>
  </div>

  <?php  if($pager['count'] < $pager['total']) : ?>
    <div class="row ">
      <div class="col-xs-4 col-xs-offset-4">
        <h5 class="text-center nextPageWrapper  ">
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                  <p>Loading Data</p>
                </div>
            </div>
          <?php



          $urlPath = '/comics/'.Yii::$app->controller->id .(  (Yii::$app->controller->action->id == 'index') ? '' : "/".Yii::$app->controller->action->id ).(!(empty($buttonParams['idValue'])) ? "?id=".$buttonParams['idValue'] : '' );
          $params= Yii::$app->getModule('comics')->marvel->buildNextParams(
            [
              'modelFieldName'=>$buttonParams['idField'],
              'id'=> $buttonParams['idValue'],
            ],
            'Characters',
            $pager
          );

          if(!(empty($params))){
            echo Html::button('Next Page',[
              'class'=>'text-center btn btn-success btn-lg shadow',
              'onclick'=>"getNextPage('".$urlPath."',".json_encode($params).")",
              ]);
           }









          /*
          $params= Yii::$app->getModule('comics')->marvel->buildNextParams(
            [
              'modelFieldName'=>$buttonParams['idField'],
              'id'=> $buttonParams['idValue'],
            ],
            'Characters',
            $pager
          );

          if(!(empty($params))){
            echo Html::button('Next Page',[
              'class'=>'text-center btn btn-success btn-lg shadow',
              'onclick'=>"getNextPage('/comics/series/characters?id=".$buttonParams['idValue']."',".json_encode($params).")",
              ]);
           }
           */
          ?>
        </h5>
      </div>
    </div>
  <?php endif; ?>

<?php else : ?>
  <div class="row ">
    <div class="cols-xs-12">
      <h3 class="text-center">No Characters found!</h3>
    </div>
  </div>
<?php endif; ?>
