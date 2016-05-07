<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Series';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['/comics']];

?>

<div class="comics-default-index">

  <div class="row">
    <div class="col-xs-12">
      <h2 class="endpoint">Marvel API : <small>Connect to and search the Marvel Universe using there API!</small>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-xs-12 ">
          <p>Lorem Dipsum Placehoolder description text.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 ">
          <h3 class="text-center"><a href="/comics/comics">Search Comics</a></h3>
        </div>
        <div class="col-xs-4 ">
          <h3 class="text-center"><a href="/comics/characters">Search Characters</a></h3>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/creators">Search Creators</a></h3>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/events">Search Events</a></h3>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/stories">Search Stories</a></h3>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/series">Search Series</a></h3>
        </div>
      </div>

    </div>
  </div>

</div>
