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
  <div class="pages-wrapper ">
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
          Appears in <?=$character['comics']['available']?> Comics
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['series']))) : ?>
          Appears in <?=$character['series']['available']?> Series
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['stories']))) : ?>
          Appears in <?=$character['stories']['available']?> Stories
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($character['events']))) : ?>
          Appears in <?=$character['events']['available']?> Events
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
          $params= Yii::$app->getModule('comics')->marvel->buildNextParams(
            [
              'modelFieldName'=>'seriesId',
              'id'=> $seriesId,
            ],
            'Characters',
            $pager
          );

          if(!(empty($params))){
            echo Html::button('Next Page',[
              'class'=>'text-center btn btn-success btn-lg shadow',
              'onclick'=>"getNextPage('/comics/series/characters?id=".$seriesId."',".json_encode($params).")",
              ]);
           }
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
