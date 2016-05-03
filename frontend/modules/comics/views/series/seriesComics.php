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

//SET OUR BREADCRUMBS
$this->title = 'Series Comics - '.$series['title']; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-comics scroll">

  <div class="row">
    <div class="col-sm-12">
    <h2>(/v1/public/series/{seriesId}/comics) : <span class="lead">Fetches lists of comics which are published as part of a specific series. </span></h2>
    </div>
  </div>

  <div class="row well well-sm info">
    <h3 class="text-center"> Optional Filters:</h3>
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


      <div class="panel panel-monumentix">
        <div class='panel-heading'>
          <h3 class="panel-title">Other Comics In This Series: <span class="pull-right">(<?//=$comicsResponse['available']?>)</span></h3>
        </div>
        <div class='panel-body'>

          <?php echo $this->render('/shared/series/_comicsPages',[
            'id'=>$id,
            'comics'=>$comics,
            ]);
          ?>


        </div>
        <div class='panel-footer'>

        </div>
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
        print_r($comicsResponse['response']);
      ?>
    </pre>
  </div>
</div>
