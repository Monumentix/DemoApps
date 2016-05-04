<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$series = $seriesResponse['response']['data']['results'][0];
$stories = $storiesResponse['response']['data']['results'];
$attributionHTML = $seriesResponse['response']['attributionHTML'];

//SET OUR BREADCRUMBS
$this->title = 'Series Comics - '.$series['title']; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-stories">

  <div class="row">
    <div class="col-sm-12">
    <h2 class="endpoint">(/v1/public/series/{seriesId}/stories) : <span class="lead">Fetches lists of stories which occur in a specific series. </span></h2>
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

      STORIES Lists - THIS IS OUR FILTERD/PAGED DATA SET AREA

    </div>
  </div>


  <div class="row well well-sm info">
    <h3 class="text-center"> Also in this series:</h3>
  </div>

  <div class="row">

    <div class="col-sm-6">
      <div class="">
        <?php echo $this->render('/shared/list/_comicsList',[
            'id'=>$id,
            'comics'=>$series['comics'],
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="">
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
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="">
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


    <div class="col-sm-6">
      <div class="">
        <?php echo $this->render('/shared/list/_creatorsList',[
            'id'=>$id,
            'creators'=>$series,
            'listOptions'=>[
              'columnClass'=>'col-sm-6',
            ],
          ]);
        ?>
      </div>
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
      echo print_r($stories);
      ?>
    </pre>
  </div>
</div>
