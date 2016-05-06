<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Series;
use app\modules\comics\models\Comics;
use app\modules\comics\models\Characters;
use app\modules\comics\models\Creators;
use app\modules\comics\models\Events;
use app\modules\comics\models\Stories;

/**
 * Default controller for the `cruddemo` module
 */
class ComicsController extends Controller
{
  /*
  * MARVEL = GET /v1/public/series
  * MARVEL = GET /v1/public/series/{seriesId}
  *
  */
  public function actionIndex($id = null){
    $endpoint = 'comics';

    $model = new Comics();
    $params['filterBy'] = [];

    if(isset($_POST['Comics'])){
      $model->attributes = $_POST['Comics'];
        foreach($_POST['Comics'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
    }

    if(!(is_null($id))){
      $endpoint = $endpoint."/".$id;
    }
    $response = $this->module->marvel->search($endpoint,$params);

    return $this->render('comicsDetail',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$response,
      'pager'=>$this->buildRecordPager($response),
    ]);
  }//end actionIndex


  /*
  * MARVEL = GET /v1/public/series/{seriesId}/characters
  *

  public function actionCharacters($id){
    $endpoint = 'series/'.$id.'/characters';

    $model = new Characters();
    $params['filterBy'] = [];

    if(isset($_POST['Characters'])){
      $model->attributes = $_POST['Characters'];
        foreach($_POST['Characters'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->seriesId = $id;
    }

    $charactersResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);

    return $this->render('seriesCharacters',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$charactersResponse,
      'seriesResponse'=>$seriesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($charactersResponse),
    ]);
  }//end actionCharacters


  /*
  * MARVEL = GET /v1/public/series/{seriesId}/comics
  *

  public function actionComics($id){
    $endpoint = 'series/'.$id.'/comics';

    $model = new Comics();
    $params['filterBy'] = [];

    if(isset($_POST['Comics'])){
      $model->attributes = $_POST['Comics'];
        foreach($_POST['Comics'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->seriesId = $id;
    }

    $comicsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);

    return $this->render('seriesComics',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$comicsResponse,
      'seriesResponse'=>$seriesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($comicsResponse),
    ]);
  }//end actionCharacters



  /*
  * MARVEL = GET /v1/public/series/{seriesId}/creators
  *

  public function actionCreators($id){
    $endpoint = 'series/'.$id.'/creators';

    $model = new Creators();
    $params['filterBy'] = [];

    if(isset($_POST['Creators'])){
      $model->attributes = $_POST['Creators'];
        foreach($_POST['Creators'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->seriesId = $id;
    }

    $creatorsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);

    return $this->render('seriesCreators',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$creatorsResponse,
      'seriesResponse'=>$seriesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($creatorsResponse),
    ]);
  }//end actionCreators







  /*
  * MARVEL = GET /v1/public/series/{seriesId}/events
  *

  public function actionEvents($id){
    $endpoint = 'series/'.$id.'/events';

    $model = new Events();
    $params['filterBy'] = [];

    if(isset($_POST['Events'])){
      $model->attributes = $_POST['Events'];
        foreach($_POST['Events'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->seriesId = $id;
    }

    $eventsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);

    return $this->render('seriesEvents',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$eventsResponse,
      'seriesResponse'=>$seriesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($eventsResponse),
    ]);
  }//end actionCreators


  /*
  * MARVEL = GET /v1/public/series/{seriesId}/stories
  *

  public function actionStories($id){
    $endpoint = 'series/'.$id.'/stories';

    $model = new Stories();
    $params['filterBy'] = [];

    if(isset($_POST['Stories'])){
      $model->attributes = $_POST['Stories'];
        foreach($_POST['Stories'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->seriesId = $id;
    }

    $storiesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);

    return $this->render('seriesStories',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$storiesResponse,
      'seriesResponse'=>$seriesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($storiesResponse),
    ]);
  }//end actionStories



*/


  private function buildRecordPager($response){
    //Set up our pager variables for use later
      $pager['count'] = $response['response']['data']['count'];
      $pager['total'] = $response['response']['data']['total'];
      $pager['offset'] = $response['response']['data']['offset'];
      $pager['limit'] = $response['response']['data']['limit'];

    return $pager;
  }



}//end class
