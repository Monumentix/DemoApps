<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$series = $seriesResponse['response']['data']['results'][0];
$comics = $comicsResponse['response']['data']['results'];
$attributionHTML = $seriesResponse['response']['attributionHTML'];


//SET OUR PAGE TITLE
$this->title = 'Series Creator - '.$series['title']; //Yii::t('detail', 'Details');

//SET OUR BREADCRUMBS
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-comics">

  <div class="row">
    <div class="col-sm-12">
        <h2 class="endpoint">(/v1/public/series/{seriesId}/comics) : <small>Fetches lists of comics that  appears in a specific series</small></h2>
      </div>
  </div>



  <div class="row">
    <div class="col-sm-12">
      <div class="seriesDetail">
        <?php echo $this->render('/shared/detail/_seriesDetail',[
            'id'=>$id,
            'series'=>$series,
          ]);
        ?>
      </div>
    </div>
  </div>

  <div class="row well well-sm info">
    <h3 class="text-center"> Optional Filters:</h3>
  </div>

  <div class="row">
    <div class="col-sm-12">

      COMICS Lists - THIS IS OUR FILTERD/PAGED DATA SET AREA


      </div>
    </div>


    <div class="row well well-sm info">
      <h3 class="text-center"> Also in this series:</h3>
    </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="seriesStories">
        <?php echo $this->render('/shared/list/_storiesList',[
            'id'=>$id,
            'stories'=>$series,
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
    </div>


    <div class="col-sm-6">
      <div class="seriesStories">
        <?php echo $this->render('/shared/list/_charactersList',[
            'id'=>$id,
            'characters'=>$series,
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="seriesStories">
        <?php echo $this->render('/shared/list/_charactersList',[
            'id'=>$id,
            'characters'=>$series,
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="seriesStories">
        <?php echo $this->render('/shared/list/_eventsList',[
            'id'=>$id,
            'events'=>$series,
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
    </div>


  </div>









</div>
<hr>
<p class="text-center"><?=$attributionHTML?></p>

<div class="row">
  <div class="col-sm-12">
    <pre class="prettyprint">
      <?php
      //echo print_r($series);
      ?>
    </pre>
  </div>
</div>
