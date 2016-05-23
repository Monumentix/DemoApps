<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Comics ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics/comics']];

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later
$data = $response['response']['data']['results'];

//WE HAVE AN ID SO LOAD THE DETAILED RESULTS FOR THIS
if(!(empty($id))){
  //We should also have a detailed records for this result then
    $this->title = $data[0]['title'];
    $this->params['breadcrumbs'][] = $this->title;
  //$data = $response['response']['data']['results'][0];
}
?>
<?php echo $this->render('/shared/blocks/_coverView');?>

<div class="comics-comics-index">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/comics/{comicId}) : <small>This method fetches a single comic resource. </small></h2>
    <?php else : ?>
      <h2 class="endpoint">(/v1/public/comics) : <small>Fetches lists of comics with optional filters.</small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php if(empty($id)){
      echo $this->render('/shared/forms/_ComicsSearch.php',[
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
      echo $this->render('/shared/paged/_ComicsPaged.php',[
        'buttonParams'=>[
          'idField'=>'comicId',
          'idValue'=>$id,
        ],
        'comicsPaged'=>$data,
        'pager'=>$pager,
        ]);
    ?>
  </div>
</div>

<hr class="comics-divider">

<div class="row">
  <div class="col-sm-12">
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_comicDetail',[
          'id'=>$id,
          'comic'=>$data[0],
        ]);
      }?>
  </div>
</div>

<div class="row">

  <div class="col-sm-12">
    <?php if(!empty($id)){ /*
      echo $this->render('/shared/list/_comicsList',[
          'id'=>$id,
          'comics'=>$data[0]['comics'],
        ]); */
      }
      ?>
  </div>

  <div class="col-sm-12">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$data[0]['events'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_charactersList',[
        'id'=>$id,
        'characters'=>$data[0]['characters'],
      ]);
    }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
       echo $this->render('/shared/list/_storiesList',[
        'id'=>$id,
        'stories'=>$data[0]['stories'],
      ]);
    }?>
  </div>

  <div class="col-sm-4">
      <?php if(!empty($id)){
         echo $this->render('/shared/list/_creatorsList',[
          'id'=>$id,
          'creators'=>$data[0]['creators'],
        ]);
      }?>
  </div>
</div>

</div>

<hr class="comics-divider">

<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>
