<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
$comics = $response['response']['data']['results'][0];

//SET OUR BREADCRUMBS
$this->title = 'Series Details - '.$comics['title']; //Yii::t('detail', 'Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-comics scroll">

  <div class="row">
    <div class="col-sm-12">
    <h2>(/v1/pubic/series/{seriesId}/comics) : <span class="lead">Fetches lists of comics which are published as part of a specific series. </span></h2>
    </div>
  </div>

  <div class="row well well-sm info">
    <h3 class="text-center"> Optional Filters:</h3>


  </div>

  <div class="row">
    <div class="col-sm-3 text-center ">
      <?php
        if(!empty($comics['thumbnail']))
        echo "<img src=". $comics['thumbnail']['path'] ."/portrait_incredible.". $comics['thumbnail']['extension']. " class='img img-comic-cover center-block' ><br>";
      ?>
    </div>
    <div class="col-sm-9 text-left">
      <div class="row">
        <div class="col-sm-12 text-left">
          <h1 class="comicsTitle">Comic Series:</h1>
          <h3><?=$comics['title'];?></h3>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 text-left long-description">
          <p class=""><?//=$comics['textObjects'];?></p>
          <p class=""><?=$comics['description'];?></p>
          <div class="eventsList">
            <?php echo $this->render('/shared/_eventsList',[
                'id'=>$id,
                'events'=>$comics,
              ]);
            ?>
          </div>
        </div>
      </div>

    </div>
  </div>






</div>



<hr>
<h3 class="text-center">DEBUG</h3>
<pre class="prettyprint">
  <?php
  //print_r($comics);
  print_r($comics);
  ?>
</pre>
