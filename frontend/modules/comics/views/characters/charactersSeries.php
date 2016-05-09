<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS

$this->title = 'Characters In '.(!(empty($charactersResponse['name'])) ? $charactersResponse['name'] :  ' No results ' );

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Characters'), 'url' => ['/comics/characters']];
$this->params['breadcrumbs'][] = $this->title;

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-characters-stories">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/characters/{charactersId}/series) : <small>Fetches lists of comic series in which a specific character appears, with optional filters. </small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_characterDetail',[
          'id'=>$id,
          'character'=>$charactersResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_SeriesSearch.php',[
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
      echo $this->render('/shared/paged/_SeriesPaged.php',[
        'buttonParams'=>[
          'idField'=>'characterId',
          'idValue'=>$id,
        ],
        'seriesPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Character Information:</h3>
  </div>
</div>


<div class="row">
  <div class="col-sm-12">
    <?php
    if(!empty($charactersResponse['comics'])){

      echo $this->render('/shared/list/_comicsList',[
          'listOptions'=>[
            'columnClass'=>'col-xs-6',
          ],
          'id'=>$id,
          'comics'=>$charactersResponse['comics'],
        ]);
    }
  ?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_storiesList',[
        'id'=>$id,
        'stories'=>$charactersResponse['stories'],
      ]);
    }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$charactersResponse['events'],
        ]);
      }?>
  </div>



  <div class="col-sm-6">
    <?php if(!empty($id)){
      /*
      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$charactersResponse['characters'],
      ]);
      */
    }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){
      /*
      echo $this->render('/shared/list/_creatorsList',[
        'id'=>$id,
        'creators'=>$charactersResponse['creators'],
      ]);
      */
    }?>
  </div>





</div>


</div>
<hr class="comics-divider">
<p class="text-center"><?=$response['response']['attributionHTML']?></p>

<?php if(1==1) {
    echo '<h5 class="text-center">Marvel API Response</h5>';
    echo '<pre class="prettyprint">';
      print_r($response);
    echo '</pre>';
  }
?>
