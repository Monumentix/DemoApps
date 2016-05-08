<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Comics;
use app\modules\comics\models\Characters;
use app\modules\comics\models\Creators;
use app\modules\comics\models\Events;
use app\modules\comics\models\Stories;
use app\modules\comics\models\Series;

/**
 * Default controller for the `cruddemo` module
 */
class CharactersController extends Controller
{
  /*
  * MARVEL = GET /v1/public/characters
  * MARVEL = GET /v1/public/characters/{characterId}
  *
  */
  public function actionIndex($id = null){
    $endpoint = 'characters';

    $model = new Characters();
    $params['filterBy'] = [];

    if(isset($_POST['Characters'])){
      $model->attributes = $_POST['Characters'];
        foreach($_POST['Characters'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
    }

    if(!(is_null($id))){
      $endpoint = $endpoint."/".$id;
    }
    $response = $this->module->marvel->search($endpoint,$params);

    return $this->render('charactersDetail',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$response,
      'pager'=>$this->buildRecordPager($response),
    ]);
  }//end actionIndex




  /*
  * MARVEL = GET /v1/public/characters/{characterId}/comics
  *
  */
  public function actionComics($id){
    $endpoint = 'characters/'.$id.'/comics';

    $model = new Comics();
    $params['filterBy'] = [];

    if(isset($_POST['Comics'])){
      $model->attributes = $_POST['Comics'];
        foreach($_POST['Comics'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->characterId = $id;
    }

    $comicsResponse = $this->module->marvel->search($endpoint,$params);

    //This gets our series information to display at the top
    $charactersResponse = $this->module->marvel->search('characters/'.$id,null);

    return $this->render('charactersComics',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$comicsResponse,
      'charactersResponse'=>$charactersResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($comicsResponse),
    ]);
  }//end actionCharacters





  /*
  * MARVEL = GET /v1/public/series/{seriesId}/creators
  *
  */
  public function actionCreators($id){
    $endpoint = 'comics/'.$id.'/creators';

    $model = new Creators();
    $params['filterBy'] = [];

    if(isset($_POST['Creators'])){
      $model->attributes = $_POST['Creators'];
        foreach($_POST['Creators'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->comicId = $id;
    }

    $creatorsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $comicsResponse = $this->module->marvel->search('characters/'.$id,null);

    return $this->render('charactersCreators',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$creatorsResponse,
      'comicsResponse'=>$comicsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($creatorsResponse),
    ]);
  }//end actionCreators







  /*
  * MARVEL = GET /v1/public/comics/{comicId}/events
  *

  public function actionEvents($id){
    $endpoint = 'comics/'.$id.'/events';

    $model = new Events();
    $params['filterBy'] = [];

    if(isset($_POST['Events'])){
      $model->attributes = $_POST['Events'];
        foreach($_POST['Events'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->comicsId = $id;
    }

    $eventsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $comicsResponse = $this->module->marvel->search('comics/'.$id,null);

    return $this->render('comicsEvents',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$eventsResponse,
      'comicsResponse'=>$comicsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($eventsResponse),
    ]);
  }//end actionCreators


  /*
  * MARVEL = GET /v1/public/comics/{comicsId}/stories
  *

  public function actionStories($id){
    $endpoint = 'comics/'.$id.'/stories';

    $model = new Stories();
    $params['filterBy'] = [];

    if(isset($_POST['Stories'])){
      $model->attributes = $_POST['Stories'];
        foreach($_POST['Stories'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->comicsId = $id;
    }

    $storiesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $comicsResponse = $this->module->marvel->search('comics/'.$id,null);

    return $this->render('comicsStories',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$storiesResponse,
      'comicsResponse'=>$comicsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($storiesResponse),
    ]);
  }//end actionStories

  */


  /*
  *
  * Creates a simple pager array for use to use in our views
  *
  * Im guessing we will need to expand upon it to incldue the search params
  * as part of the object at some point
  *
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
