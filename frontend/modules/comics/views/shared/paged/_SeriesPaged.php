<?php
  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<?php if(!(empty($seriesPages))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper">
    <?php foreach($seriesPages as $seriesItem) :?>
      <div class="row display-table  <?=(($cnt & 1 ) ? 'even' : 'odd' );?> ">
        <div class="col-xs-2 display-cell">
          <?php if(!(empty($seriesItem['thumbnail']))) : ?>
            <img title="<?=$seriesItem['id']?>" src="<?=$seriesItem['thumbnail']['path']?>/standard_medium.<?=$seriesItem['thumbnail']['extension']?>" class="img img-thumbnail">
          <?php endif; ?>
        </div>
        <div class="col-xs-5 display-cell">
          <h5><?= $seriesItem['title']; ?></h5>
          <p class="series-description"><?= $seriesItem['description']; ?></p>
        </div>
        <div class="col-xs-1 display-cell text-center">
          <h5><?= $seriesItem['startYear']; ?></h5>
        </div>
        <div class="col-xs-1 display-cell text-center">
          <h5><?= $seriesItem['endYear']; ?></h5>
        </div>
        <div class="col-xs-1 display-cell text-center">
          <h5><?= $seriesItem['rating']; ?></h5>
        </div>
        <div class="col-xs-2 display-cell text-center">
          <a href="?id=<?=$seriesItem['id']?>" class="btn btn-info btn-xs text-center">Details</a>
        </div>
      </div>
      <?php $cnt++ ?>
    <?php endforeach; ?>
  </div>

  <div class="row hide ">
    <div class="col-xs-12">
      <hr class="comics-divider">
      <h5 class="text-center ---nextPageWrapper">

        <?php
        /*
        $params = [];

        if(!(empty($_POST['Series']))){
          foreach($_POST['Series'] as $key => $val){
            $paramKey = "Series[". $key ."]";
            if($key == "offset"){
              $val = ($val + $_POST['Series']['limit']);
            }
            $params[$paramKey] = $val;
          }
        }

        if(!(empty($params))){
          echo Html::button('Next Page',[
            'class'=>'text-center btn btn-success btn-lg shadow',
            'onclick'=>"getNextPage('/comics/series',".json_encode($params).")",
            ]);
        } */
        ?>
      </h5>

    </div>
  </div>


  <?php  if($pager['count'] < $pager['total']) : ?>
    <div class="row ">
      <div class="col-xs-4 col-xs-offset-4">
        <h5 class="text-center nextPageWrapper  ">
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                  <p>Loading Data</p>
                </div>
            </div>
          <?php
          $params= Yii::$app->getModule('comics')->marvel->buildNextParams(
            [
              'modelFieldName'=>'id',
              'id'=> ((!(empty($seriesId))) ? $seriesId : '' ),
            ],
            'Series',
            $pager
          );

          if(!(empty($params))){
            echo Html::button('Next Page',[
              'class'=>'text-center btn btn-success btn-lg shadow',
              'onclick'=>"getNextPage('/comics/series',".json_encode($params).")",
              ]);
           }
          ?>
        </h5>
      </div>
    </div>
  <?php endif; ?>






<?php else : ?>
  <div class="row ">
    <div class="cols-xs-12">
      <h3 class="text-center">No comics found!</h3>
    </div>
  </div>
<?php endif; ?>

<?php if(1==0) {
    echo '<hr class="comics-divider">';
    echo '<h5 class="text-center">Marvel API Response</h5>';
    echo '<pre class="prettyprint">';
      print_r($params);
    echo '</pre>';
  }
?>
