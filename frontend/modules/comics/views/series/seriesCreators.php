<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$series = $seriesResponse['response']['data']['results'][0];
$creators = $creatorsResponse['response']['data']['results'];
$attributionHTML = $seriesResponse['response']['attributionHTML'];


//SET OUR PAGE TITLE
$this->title = 'Series Creator - '.$series['title']; //Yii::t('detail', 'Details');

//SET OUR BREADCRUMBS
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-creator scroll">

  <div class="row">
    <div class="col-sm-12">
        <h2 class="endpoint">(/v1/public/series/{seriesId}/creators) : <small>Fetches lists of comic creators whose work appears in a specific series</small></h2>
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
        <?php echo $this->render('/shared/series/_creatorsPages',[
            'id'=>$id,
            'creators'=>$creators,
          ]);
        ?>
    </div>
  </div>


</div>
<hr>
<p class="text-center"><?=$attributionHTML?></p>
