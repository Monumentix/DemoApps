<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS


$this->title = 'Creators For : '.(!(empty($storiesResponse['title'])) ? $storiesResponse['title'] :  ' No results ' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['/comics/evemts']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later

//Tell our view which section of the response data has our results
$data = $response['response']['data']['results'];
?>

<?php echo $this->render('/shared/_coverView');?>

<div class="comics-stories-creators">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/creators/{creatorId}/creators) : <small>Fetches lists of comic creators whose work appears in a specific story, with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_storyDetail',[
          'id'=>$id,
          'story'=>$storiesResponse,
        ]);
      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php
      echo $this->render('/shared/forms/_CreatorsSearch.php',[
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
      echo $this->render('/shared/paged/_CreatorsPaged.php',[
        //'seriesId'=>$id,
        'buttonParams'=>[
          'idField'=>'storyId',
          'idValue'=>$id,
        ],
        'creatorsPaged'=>$data,
        'pager'=>$pager,
      ]);
    ?>
  </div>
</div>

<hr class="comics-divider">
<div class="row">
  <div class="col-sm-12">
    <h3 class="text-center">Additional Story Information:</h3>
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
          'comics'=>$storiesResponse['comics'],
        ]);
      ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_seriesList',[
          'id'=>$id,
          'series'=>$storiesResponse['series'],
        ]);

      }?>
  </div>

  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$storiesResponse['events'],
        ]);

      }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_charactersList',[
          'id'=>$id,
          'characters'=>$storiesResponse['characters'],
        ]);

      }?>
  </div>

  <div class="col-sm-6">
      <?php if(!empty($id)){

         echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$storiesResponse['creators'],
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
