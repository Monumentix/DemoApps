<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Characters In '.$seriesResponse['title'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic'), 'url' => ['/comics/series']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>


<?php echo $this->render('/shared/blocks/_coverView');?>

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
      echo $this->render('/shared/forms/_CharactersSearch.php',[
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
      echo $this->render('/shared/paged/_CharactersPaged.php',[
        'buttonParams'=>[
          'idField'=>'seriesId',
          'idValue'=>$id,
        ],
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

<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>
