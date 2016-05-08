<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Stories In '.$seriesResponse['title'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-stories">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/series/{seriesId}/stories) : <small>Fetches lists of comic stories from a specific series with optional filters. </small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_seriesDetail',[
          'id'=>$id,
          'series'=>$seriesResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <h2 class="text-center">Filter Stories For This Series</h2>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_StoriesSearch.php',[
        'model'=>$model,
        ]);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/paged/_pagerCount.php',[
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>


<div class="row pagedData">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/paged/_StoriesPaged.php',[
        'buttonParams'=>[
          'idField'=>'seriesId',
          'idValue'=>$id,
        ],            
        'storiesPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Series Information:</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/list/_comicsList',[
          'listOptions'=>[
            'columnClass'=>'col-xs-6',
          ],
          'id'=>$id,
          'comics'=>$seriesResponse['comics'],
        ]);
      ?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$seriesResponse['creators'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){

      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$seriesResponse['characters'],
      ]);

    }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_eventsList',[
        'id'=>$id,
        'events'=>$seriesResponse['events'],
      ]);
    }?>
  </div>
</div>

</div>

<hr class="comics-divider">
<p class="text-center">
  <?=$response['response']['attributionHTML']?>
</p>
