<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);


//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$series = $response['response']['data']['results'][0];


//SET OUR BREADCRUMBS
$this->title = 'Series Details - '.$series['title']; //Yii::t('detail', 'Details');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>
<div class="comics-series-detail scroll">

  <div class="row">
    <div class="col-sm-12">
        <h2 class="endpoint">(/v1/public/series/{seriesId}) : <small>This method fetches a single comic series resource. It is the canonical URI for any comic series resource provided by the API.</small></h2>
      </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="seriesDetail">
        <?php echo $this->render('/shared/series/_seriesDetail',[
            'id'=>$id,
            'series'=>$series,
          ]);
        ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="eventsList">
        <?php echo $this->render('/shared/_eventsList',[
            'id'=>$id,
            'events'=>$series,
          ]);
        ?>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-4">
      <?php echo $this->render('/shared/_charactersList',[
          'id'=>$id,
          'series'=>$series,
        ]);
      ?>
    </div>

    <div class="col-sm-4">
      <?php echo $this->render('/shared/_storiesList',[
          'id'=>$id,
          'series'=>$series,
        ]);
      ?>
    </div>

    <div class="col-sm-4">
        <?php echo $this->render('/shared/_creatorsList',[
            'id'=>$id,
            'series'=>$series,
          ]);
        ?>
    </div>
  </div>


  <div class="row">


    <div class="col-sm-6 col-md-2 pull-right">
      <?=$this->render('/shared/series/_nextInSeries',[
        'id'=>$id,
        'series'=>$series,
        ]); ?>
    </div>

    <div class="col-sm-6 col-md-2 pull-left">
      <?=$this->render('/shared/series/_prevInSeries',[
        'id'=>$id,
        'series'=>$series,
        ]); ?>
    </div>

    <div class="col-sm-12 col-md-8">
      <?=$this->render('/shared/_seriesComicsList',[
        'id'=>$id,
        'comics'=>$series['comics'],
        ]); ?>
    </div>
  </div>
</div>
<hr>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>

<?php if(!empty($DEBUG)) : ?>
  <h3 class="text-center">DEBUG</h3>
  <pre class="prettyprint">
    <?php
      print_r($response);
    ?>
  </pre>
<?php endif ?>
