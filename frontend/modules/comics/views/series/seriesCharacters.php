<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Characters In '.$seriesResponse['title'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];

//WE HAVE AN ID SO LOAD THE DETAILED RESULTS FOR THIS
if(!(empty($id))){
  /*
  //We should also have a detailed records for this result then
    $this->title = $data[0]['title'];
    $this->params['breadcrumbs'][] = $this->title;
  //$data = $response['response']['data']['results'][0];
  */
}
?>
<?php echo $this->render('/shared/_coverView');?>

<div class="comics-series-characters">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/series/{seriesId}/characters) : <small>Fetches lists of characters which appear in specific series, with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_seriesDetail',[
          'id'=>$id,
          'series'=>$seriesResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_seriesCharacterSearch.php',[
        'model'=>$model,
        ]);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <h5 class="text-right">
      <?='Records '.(($pager['offset'] == 0) ? '1' : $pager['offset'] ) .' through '. $pager['count'] .' out of '.$pager['total'].' records'?>
    </h5>
  </div>
</div>

<div class="row pagedData">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/paged/_seriesCharactersPaged.php',[
        'seriesId'=>$id,
        'charactersPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Series Information:</h3>
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
          'comics'=>$seriesResponse['comics'],
        ]);
      ?>
  </div>

  <div class="col-sm-12">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$seriesResponse['events'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){

      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$seriesResponse['characters'],
      ]);

    }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_storiesList',[
        'id'=>$id,
        'stories'=>$seriesResponse['stories'],
      ]);
    }?>
  </div>

  <div class="col-sm-4">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$seriesResponse['creators'],
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
