<?php
  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<?php if(!(empty($storiesPaged))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper fjalla">
    <?php foreach($storiesPaged as $story) :?>
    <div class="row display-table  <?=(($cnt & 1 ) ? ' even ' : ' odd ' );?> ">
      <div class="col-xs-2 text-center display-cell">
        <?php if(!(empty($story['thumbnail']))) : ?>
          <img src="<?=$story['thumbnail']['path']?>/standard_medium.<?=$story['thumbnail']['extension']?>" class="img img-thumbnail img-rounded">
        <?php endif; ?>
        <h4><?= $story['title']; ?></h4>
      </div>
      <div class="col-xs-5 display-cell text-left">
        <?php if(!(empty($story['originalIssue']))) : ?>
          <?=$story['originalIssue']['name']?>
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <?php if(!(empty($story['comics']))) : ?>
          <?=$story['comics']['available']?> <br>Comics
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <?php if(!(empty($story['series']))) : ?>
          <?=$story['series']['available']?> <br>Series
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <?php if(!(empty($story['characters']))) : ?>
          <?=$story['characters']['available']?> <br>Characters
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <?php if(!(empty($story['creators']))) : ?>
          <?=$story['creators']['available']?> <br>Creators
        <?php endif; ?>
      </div>
      <div class="col-xs-1 display-cell text-center">
        <a href="/comics/stories?id=<?=$story['id']?>" class="btn btn-info btn-xs text-center shadow">Details</a>
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
            'Stories',
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
      <h3 class="text-center">No Stories found!</h3>
    </div>
  </div>
<?php endif; ?>



<?php if(1==0) {
    echo '<h5 class="text-center">Marvel API Response</h5>';
    echo '<pre class="prettyprint">';
      print_r($storiesPaged);
    echo '</pre>';
  }
