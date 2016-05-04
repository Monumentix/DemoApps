<?php
  use yii\helpers\Html;
?>

<?php

// This is paged data that will get loaded
// over and over again on each page call, and
// should get appended in our page
?>
<div class="">
<?php if(!(empty($seriesPages))) : ?>
  <?php $cnt = 0; ?>
  <div class="pages-wrapper">
  <?php foreach($seriesPages as $seriesItem) :?>
    <div class="row display-table  <?=(($cnt & 1 ) ? 'even' : 'odd' );?> ">
      <div class="col-xs-2 display-cell">
        <?php if(!(empty($seriesItem['thumbnail']))) : ?>
          <img src="<?=$seriesItem['thumbnail']['path']?>/standard_medium.<?=$seriesItem['thumbnail']['extension']?>" class="img img-thumbnail">
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
  <div class="row ">
    <div class="col-xs-12">

      <hr class="comics-divider">

      <h5 class="text-center nextPageWrapper">

        <?php

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


        echo Html::button('Next Page',[
          'class'=>'text-center btn btn-success btn-lg shadow',
          'onclick'=>"getNextPage(".json_encode($params).")",
          ]);

        ?>
      </h5>




    </div>
  </div>
</div>
<?php else : ?>
  <p>No rows...</p>
<?php endif; ?>
<?php if(1==0) {
    echo '<hr class="comics-divider">';
    echo '<h5 class="text-center">Marvel API Response</h5>';
    echo '<pre class="prettyprint">';
      print_r($params);
    echo '</pre>';
  }
?>
