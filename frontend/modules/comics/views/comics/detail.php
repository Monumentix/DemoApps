<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);
?>

<?php echo $this->render('/shared/_coverView');?>

<?php
  //For view and controller consistency between multi and single page
  // record sets we rename and pull out the results of the resonpse
  $comic = $response['data']['results'][0];
?>

<div class="comics-comics-detail scroll">
  <div class="row">
    <div class="col-sm-8 pull-right">
      <!--START Detail Section -->
      <div class="row">
        <div class="col-sm-12">
          <h2 class="title"><?=$comic['title']?>
            <span class="lead pull-right">
              Issue # <?=$comic['issueNumber']?>
            </span>
          </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <p class="detail-blurb">
            <span class="lbl">Blurb:</span>
            <?php if(isset($comic['textObjects']) && !empty($comic['textObjects'])) {
                echo array_shift($comic['textObjects'])['text'];
            };?>
          </p>
        </div>
        <div class="col-sm-12">
          <p class="long-description">
            <span class="lbl">Descrption:</span>
            <?=$comic['description'];?>
          </p>
        </div>

        <div class="col-sm-12">

          <p class="series">
            <span class="lbl">Series:</span>
              <?php
                if(isset($comic['series'])){
                  echo Html::a($comic['series']['name'],
                    ['series/detail','id'=>array_pop(explode("/",$comic['series']['resourceURI']))
                  ]);
                }
              ?>
            </span>
          </p>
          
        </div>


        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-4">
              <h4 class="text-center">Series</h4>

            </div>
            <div class="col-sm-4">
              <h4>Characters</h4>
            </div>
            <div class="col-sm-4">
              <h4>Stories</h4>
            </div>
          </div>
        </div>
      </div>


      <!--END Detail Section -->
    </div>
    <div class="col-sm-4 text-center">
      <a class="modalLaunch" onClick="showModal('<?=$comic['thumbnail']['path']."/detail.".$comic['thumbnail']['extension']; ?>','<?=$comic['title']?>')" >
        <img class="img img-thumbnail img-responsive" src="<?=$comic['thumbnail']['path']."/portrait_uncanny.".$comic['thumbnail']['extension']; ?>">
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-center">
      <?=$response['attributionHTML'];?>
    </div>
  </div>

</div>


<pre class="prettyfiy">
  <?php
    echo print_r($response)
  ?>
</pre>
