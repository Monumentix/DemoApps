<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\comics\ComicsMainAsset;

ComicsMainAsset::register($this);

//SET OUR BREADCRUMBS
$this->title = 'Marvel REST Api';
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
          <h1 class="text-center">Explore the Marvel Universe </h1>
          <hr class="comics-divider">
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 ">
          <h3 class="text-center">Quickly search or filter any category of iformation made available by Marvel.  </h3>
        </div>
      </div>


      <div class="row">
        <div class="col-xs-4 ">
          <h3 class="text-center"><a href="/comics/comics">Search Comics</a></h3>
          <?=$this->render('/shared/forms/mini/searchComics',['model'=>$comicsModel]); ?>
        </div>
        <div class="col-xs-4 ">
          <h3 class="text-center"><a href="/comics/characters">Search Characters</a></h3>
          <?=$this->render('/shared/forms/mini/searchCharacters',['model'=>$charactersModel]); ?>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/creators">Search Creators</a></h3>
          <?=$this->render('/shared/forms/mini/searchCreators',['model'=>$creatorsModel]); ?>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/events">Search Events</a></h3>
          <?=$this->render('/shared/forms/mini/searchEvents',['model'=>$eventsModel]); ?>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/series">Search Series</a></h3>
          <?=$this->render('/shared/forms/mini/searchSeries',['model'=>$seriesModel]); ?>
        </div>
        <div class="col-xs-4">
          <h3 class="text-center"><a href="/comics/stories">View Stories</a></h3>
          <div class="well well-sm">
            <h4 class="text-center">No Direct Search Available</h4><br>
            <h4><a href="/comics/stories" class="btn btn-success shadow">Go To Stories</a></button</h4>
          </div>
        </div>
      </div>

    </div>
  </div>
<hr class="comics-divider">

  <div class="row">
    <div class="col-xs-12">
      <h3 class="text-center">Summarized and Formatted Lists</h3>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 well well-sm">
          <h3 class="text-center"><?= Html::a('Top 50',
              '/comics/stats',
              [
                'class'=>'btn btn-success shadow btn-lg'
              ]
          ); ?></h3>
          <h4 class="text-center">50 Most Popular Characters in the Marvel Universe</h4>
        </div>
      </div>
    </div>
  </div>

<hr class="comics-divider">

  <div class="row">
    <div class="col-xs-12">
      <h3>REST API Consumptation : <small>Using MARVEL's developer API to search and display comic information.</small></h3>
      <p>
        Using the list of exposed endpoints listed below, i created a frontend to search and filter all the information.
      </p>

      <?=$this->render('endpoints'); ?>

    </div>
  </div>

  <hr class="comics-divider">
  <p class="text-center">
    <a href="http://developer.marvel.com/docs">Marvel Developer Documentation</a>
  </p>

</div>
