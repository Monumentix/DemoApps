<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Comics appearing in : '.(!(empty($eventsResponse['title'])) ? $eventsResponse['title'] :  ' No results ' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['/comics/evemts']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-events-stories">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/events/{eventId}/stories) : <small>Fetches lists of comic stories from a specific event, with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_eventDetail',[
          'id'=>$id,
          'event'=>$eventsResponse,
        ]);
      }?>
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
        //'seriesId'=>$id,
        'buttonParams'=>[
          'idField'=>'eventId',
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
    <h3 class="text-center">Additional Event Information:</h3>
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
          'comics'=>$eventsResponse['comics'],
        ]);
      ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_storiesList',[
        'id'=>$id,
        'stories'=>$eventsResponse['stories'],
      ]);
    }?>
  </div>

  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_seriesList',[
          'id'=>$id,
          'series'=>$eventsResponse['series'],
        ]);

      }?>
  </div>

</div>
<div class="row">
  <div class="col-sm-6">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_creatorsList',[
        'id'=>$id,
        'creators'=>$eventsResponse['creators'],
      ]);
    }?>
  </div>

  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_charactersList',[
          'id'=>$id,
          'characters'=>$eventsResponse['characters'],
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
      print_r($data);
    echo '</pre>';
  }
?>
