<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS

$this->title = 'Characters Statistics';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comic App'), 'url' => ['/comics']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Statistics'), 'url' => ['/comics/stats']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="comics-stats-popular fjalla">
  <h2 class="text-center">30 Most Popular Characters</h2>
  <h3><small>I looped through all the character data, and saved the response summary data locally for data analysis, and summaries such as this page.
    The following is the top 30 characters based upon there number of associated comics in the Marvel Database.</small></h3>
  <hr class="comics-divider">

  <div class="row center-block text-center">
    <?php foreach($stats as $stat): ?>
      <div class="col-sm-3 text-center character-stats-wrapper">
        <div class="row stats-row">
          <a title="Go to Character Page" href="/comics/characters?id=<?=$stat->characterId?>" class="">
            <img src="<?=$stat->imgURI?>/detail.jpg" class="img -img-circle -img-thumbnail img-responsive -img-rounded center-block">
          </a>
          <h4><?=$stat->name?></h4>
          <div class="col-xs-3 text-center stat">
            Comics<br>
            <?=$stat->comicsCount?>
          </div>
          <div class="col-xs-3 text-center stat">
            Series<br>
            <?=$stat->seriesCount?>
          </div>
          <div class="col-xs-3 text-center stat">
            Stories<br>
            <?=$stat->storiesCount?>
          </div>
          <div class="col-xs-3 text-center stat">
            Events<br>
            <?=$stat->eventsCount?>
          </div>
        </div>
      </div>
    <?php endforeach ?>
</div>

<hr class="comics-divider">
