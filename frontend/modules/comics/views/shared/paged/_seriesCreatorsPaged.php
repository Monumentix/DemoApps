<?php
  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<?php if(!(empty($creatorsPaged))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper ">
    <?php foreach($creatorsPaged as $creator) :?>
    <div class="row display-table  <?=(($cnt & 1 ) ? ' even ' : ' odd ' );?> ">
      <div class="col-xs-2 text-center display-cell">
        <?php if(!(empty($creator['thumbnail']))) : ?>
          <img src="<?=$creator['thumbnail']['path']?>/standard_medium.<?=$creator['thumbnail']['extension']?>" class="img img-thumbnail img-rounded">
        <?php endif; ?>
        <h5><?= $creator['fullName']; ?> </h5>
      </div>
      <div class="col-xs-3 display-cell text-center">
        <?php if(!(empty($creator['comics']))) : ?>
          Appears in <?=$creator['comics']['available']?> Comics
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($creator['series']))) : ?>
          Appears in <?=$creator['series']['available']?> Series
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($creator['stories']))) : ?>
          Appears in <?=$creator['stories']['available']?> Stories
        <?php endif; ?>
      </div>
      <div class="col-xs-2 display-cell text-center">
        <?php if(!(empty($creator['events']))) : ?>
          Appears in <?=$creator['events']['available']?> Events
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <a href="/comics/creator?id=<?=$creator['id']?>" class="btn btn-info btn-xs text-center">Details</a>
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
            'Creators',
            $pager
          );

          if(!(empty($params))){
            echo Html::button('Next Page',[
              'class'=>'text-center btn btn-success btn-lg shadow',
              'onclick'=>"getNextPage('/comics/series/creators?id=".$seriesId."',".json_encode($params).")",
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
      <h3 class="text-center">No Creators found!</h3>
    </div>
  </div>
<?php endif; ?>
