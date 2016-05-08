<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Series';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later
$data = $response['response']['data']['results'];

//WE HAVE AN ID SO LOAD THE DETAILED RESULTS FOR THIS
if(!(empty($id))){
  //We should also have a detailed records for this result then
    $this->title = $data[0]['title'];
    $this->params['breadcrumbs'][] = $this->title;
  //$data = $response['response']['data']['results'][0];
}
?>
<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-index">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/series/{seriesId}) : <small>This method fetches a single comic series resource. It is the canonical URI for any comic series resource provided by the API.</small></h2>
    <?php else : ?>
      <h2 class="endpoint">(/v1/public/series) : <small>Fetches lists of comic series with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_SeriesSearch.php',[
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
      echo $this->render('/shared/paged/_SeriesPaged.php',[
        'buttonParams'=>[
          'idField'=>'seriesId',
          'idValue'=>$id,
        ],          
        'seriesPages'=>$data,
        'pager'=>$pager,
        ]);
    ?>
  </div>
</div>

<hr class="comics-divider">

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_seriesDetail',[
          'id'=>$id,
          'series'=>$data[0],
        ]);
      }?>
  </div>
</div>

<div class="row">

  <div class="col-sm-12">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_comicsList',[
          'id'=>$id,
          'comics'=>$data[0]['comics'],
        ]);
      }?>
  </div>

  <div class="col-sm-12">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$data[0]['events'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$data[0]['characters'],
      ]);
    }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_storiesList',[
        'id'=>$id,
        'stories'=>$data[0]['stories'],
      ]);
    }?>
  </div>

  <div class="col-sm-4">
      <?php if(!empty($id)){
         echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$data[0]['creators'],
        ]);
      }?>
  </div>
</div>

</div>

<hr class="comics-divider">

<p class="text-center"><?=$response['response']['attributionHTML']?></p>

<?php if(1==0) {
    echo '<h5 class="text-center">Marvel API Response</h5>';
    echo '<pre class="prettyprint">';
      print_r($response);
    echo '</pre>';
  }
?>
