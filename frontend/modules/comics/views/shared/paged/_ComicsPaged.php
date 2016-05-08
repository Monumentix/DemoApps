<?php

  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<?php if(!(empty($comicsPaged))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper fjalla ">
    <?php foreach($comicsPaged as $comic) :?>
    <div class="row display-table  <?=(($cnt & 1 ) ? ' even ' : ' odd ' );?> ">
      <div class="col-xs-2 col-sm-2 text-center display-cell hidden-xs">
        <?php if(!(empty($comic['thumbnail']))) : ?>
          <img src="<?=$comic['thumbnail']['path']?>/standard_medium.<?=$comic['thumbnail']['extension']?>"
          class="img img-thumbnail img-rounded img-cover-small"
          onClick="showModal('<?=$comic['thumbnail']['path']?>/detail.<?=$comic['thumbnail']['extension']?>','<?=$comic['title']?>')">
        <?php endif; ?>
      </div>
      <div class="col-xs-5 col-sm-4 display-cell text-left">
        <?php if(!(empty($comic['title']))) : ?>
          <h4 class="fjalla"><?=$comic['title']?> </h4>
        <?php endif; ?>
      </div>
      <div class="col-xs-2 col-sm-1 display-cell text-center">
        <?php if(!(empty($comic['stories']))) : ?>
          <?=$comic['stories']['available']?> <br> Stories
        <?php endif; ?>
      </div>
      <div class="col-xs-2 col-sm-1 display-cell text-center">
        <?php if(!(empty($comic['characters']))) : ?>
          <?=$comic['characters']['available']?> <br>Characters
        <?php endif; ?>
      </div>
      <div class="col-xs-2 col-sm-1 display-cell text-center">
        <?php if(!(empty($comic['creators']))) : ?>
          <?=$comic['creators']['available']?> <br>Creators
        <?php endif; ?>
      </div>
      <div class="col-xs-2 col-sm-1 display-cell text-center">
        <?php if(!(empty($comic['events']))) : ?>
          <?=$comic['events']['available']?> <br> Events
        <?php endif; ?>
      </div>
      <div class="col-xs-2 col-sm-1 display-cell">
        <a href="/comics/comics?id=<?=$comic['id']?>" class="btn btn-info btn-xs text-center shadow">Details</a>
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
            'Comics',
            $pager
          );

          if(!($pager['count'] < $pager['limit'])){
            if(!(empty($params))){
              echo Html::button('Next Page',[
                'class'=>'text-center btn btn-success btn-lg shadow',
                'onclick'=>"getNextPage('".$urlPath."',".json_encode($params).")",
                ]);
             }            
          }
          ?>
        </h5>
      </div>
    </div>
  <?php endif; ?>

<?php else : ?>
  <div class="row ">
    <div class="cols-xs-12">
      <h3 class="text-center">No Comics found!</h3>
    </div>
  </div>
<?php endif; ?>
