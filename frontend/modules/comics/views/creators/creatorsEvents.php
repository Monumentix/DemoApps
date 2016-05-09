<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS

$this->title = 'Creator: '.(!(empty($creatorsResponse['title'])) ? $creatorsResponse['title'] :  ' No results ' );

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Creators'), 'url' => ['/comics/creators']];
$this->params['breadcrumbs'][] = $this->title;

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-creator-events">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/creators/{creatorId}/events) : <small>Fetches lists of events featuring the work of a specific creator with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_creatorDetail',[
          'id'=>$id,
          'creator'=>$creatorsResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_EventsSearch.php',[
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
      echo $this->render('/shared/paged/_EventsPaged.php',[
        'seriesId'=>$id,
        'eventsPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Comic Information:</h3>
    <hr class="comics-divider">
  </div>
</div>


<div class="row">
  <div class="col-sm-12">
    <?php
    if(!empty($comicsResponse['comics'])){
      echo $this->render('/shared/list/_comicsList',[
          'listOptions'=>[
            'columnClass'=>'col-xs-6',
          ],
          'id'=>$id,
          'comics'=>$creatorsResponse['comics'],
        ]);
    }
  ?>
  </div>


  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_storiesList',[
          'id'=>$id,
          'stories'=>$creatorsResponse['stories'],
        ]);
      }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){

      echo $this->render('/shared/list/_seriesList',[
        'id'=>$id,
        'series'=>$creatorsResponse['series'],
      ]);

    }?>
  </div>


    <div class="col-sm-4">
      <?php if(!empty($id)){
        /*
        echo $this->render('/shared/list/_charactersList',[
          'id'=>$id,
          'characters'=>$creatorsResponse['characters'],
        ]);
        */
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
