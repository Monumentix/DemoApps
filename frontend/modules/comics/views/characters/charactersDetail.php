<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Characters ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Characters'), 'url' => ['/comics/characters']];

//LOAD OUR DATASET FROM THE RESONSE FOR EASY OF USE
//AND ALLOW US TO USE THE TITLE IN OUR NAVIGATION
//GRAB just our results for easy use later
$data = $response['response']['data']['results'];

//WE HAVE AN ID SO LOAD THE DETAILED RESULTS FOR THIS
if(!(empty($id))){
  //We should also have a detailed records for this result then
    $this->title = $data[0]['name'];
    $this->params['breadcrumbs'][] = $this->title;
  //$data = $response['response']['data']['results'][0];
}
?>
<?php echo $this->render('/shared/blocks/_coverView');?>

<div class="comics-characters-index">

<div class="row">
  <div class="col-sm-12">
    <?php if(!(empty($id))) : ?>
      <h2 class="endpoint">(/v1/public/characters/{characterId}) : <small>This method fetches a single character resource.</small></h2>
    <?php else : ?>
      <h2 class="endpoint">(/v1/public/characters) : <small>Fetches lists of comic characters with optional filters. </small></h2>
    <?php endif; ?>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php if(empty($id)){
      echo $this->render('/shared/forms/_CharactersSearch.php',[
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
      <?php if(!empty($id)){
        echo $this->render('/shared/detail/_characterDetail',[
          'id'=>$id,
          'character'=>$data[0],
        ]);
      }?>
  </div>
</div>

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

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_eventsList',[
          'id'=>$id,
          'events'=>$data[0]['events'],
        ]);
      }?>
  </div>

  <div class="col-sm-4">
    <?php if(!empty($id)){
      echo $this->render('/shared/list/_seriesList',[
        'id'=>$id,
        'series'=>$data[0]['series'],
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

</div>

</div>
<hr class="comics-divider">
<?= $this->render('/shared/blocks/_responseFooter.php',['fullResponse'=>$response]); ?>
<p class="text-center"><?=$response['response']['attributionHTML']?></p>
