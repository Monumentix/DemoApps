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
$this->title = 'Series Index';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('/shared/_coverView');?>
<div class="comics-series-index scroll">

  <div class="row">
    <div class="col-sm-12">
        <h2 class="endpoint">(/v1/public/series) : <small>This method fetches a single comic series resource. It is the canonical URI for any comic series resource provided by the API.</small></h2>
      </div>
  </div>










  <div class="row">
    <div class="col-sm-12">
      <div class="seriesDetail">
        <?php
           echo $this->render('/shared/detail/_seriesDetail',[

            'series'=>$series,
          ]);
        ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="eventsList">
        <?php echo $this->render('/shared/list/_comicsList',[
            /*  */
            'comics'=>$series['comics'],
          ]);
        ?>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-4">
      <?php echo $this->render('/shared/list/_charactersList',[
          'characters'=>$series,
        ]);
      ?>
    </div>

    <div class="col-sm-4">
      <?php echo $this->render('/shared/list/_storiesList',[

          'stories'=>$series,
        ]);
      ?>
    </div>

    <div class="col-sm-4">
        <?php echo $this->render('/shared/list/_creatorsList',[

            'creators'=>$series,
          ]);
        ?>
    </div>
  </div>

</div>
<hr>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>

<pre class="prettyprint">
    <?php
      print_r($series);
    ?>
</pre>
