<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Stories '.(!(empty($response['response']['data']['results'][0]['title'])) ? ' for '.$response['response']['data']['results'][0]['title'] :  ' ' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stories'), 'url' => ['/comics/stories']];
$this->params['breadcrumbs'][] = $this->title;

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later
$data = $response['response']['data']['results'];
?>


<?php echo $this->render('/shared/blocks/_coverView');?>

<div class="comics-stories-index">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/stories/{storyId}) : <small>This method fetches a single comic story resource. It is the canonical URI for any comic story resource provided by the API.</small></h2>
    <?php else : ?>
      <h2 class="endpoint">(/v1/public/stories) : <small>Fetches lists of comic stories with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php if(empty($id)){
      echo $this->render('/shared/forms/_StoriesSearch.php',[
        'model'=>$model,
        ]);
      }
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
      echo $this->render('/shared/paged/_StoriesPaged.php',[
        'buttonParams'=>[
          'idField'=>'storyId',
          'idValue'=>$id,
        ],
        'storiesPaged'=>$data,
        'pager'=>$pager,
        ]);
    ?>
  </div>
</div>

<hr class="comics-divider">

<div class="row">

  <div class="col-sm-12">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_comicsList',[
          'listOptions'=>[
            'columnClass'=>'col-xs-6',
          ],
          'id'=>$id,
          'comics'=>$data[0]['comics'],
        ]);
      }
      ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_eventsList',[
        'id'=>$id,
        'events'=>$data[0]['events'],
      ]);
    }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_seriesList',[
        'id'=>$id,
        'series'=>$data[0]['series'],
      ]);
    }?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$data[0]['creators'],
        ]);
      }?>
  </div>

  <div class="col-sm-6">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_charactersList',[
          'id'=>$id,
          'characters'=>$data[0]['characters'],
        ]);
      }?>
  </div>
</div>

</div>

<hr class="comics-divider">

<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>
