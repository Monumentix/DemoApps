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
class CreatorsController extends Controller
{
  /*
  * MARVEL = GET /v1/public/creators
  * MARVEL = GET /v1/public/creators/{creatorsId}
  *
  */
  public function actionIndex($id = null){
    $endpoint = 'creators';

    $model = new Creators();
    $params['filterBy'] = [];

    if(isset($_POST['Creators'])){
      $model->attributes = $_POST['Creators'];
        foreach($_POST['Creators'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
    }

    if(!(is_null($id))){
      $endpoint = $endpoint."/".$id;
    }
    $response = $this->module->marvel->search($endpoint,$params);

    return $this->render('creatorsDetail',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$response,
      'pager'=>$this->buildRecordPager($response),
    ]);
  }//end actionIndex




  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/comics
  *
  */
  public function actionComics($id){
    $endpoint = 'creators/'.$id.'/comics';

    $model = new Comics();
    $params['filterBy'] = [];

    if(isset($_POST['Comics'])){
      $model->attributes = $_POST['Comics'];
        foreach($_POST['Comics'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->creatorId = $id;
    }

    $comicsResponse = $this->module->marvel->search($endpoint,$params);

    //This gets our series information to display at the top
    $creatorsResponse = $this->module->marvel->search('creators/'.$id,null);

    return $this->render('creatorsComics',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$comicsResponse,
      'creatorsResponse'=>$creatorsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($comicsResponse),
    ]);
  }//end actioncreators





  


  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/events
  *
  */
  public function actionEvents($id){
    $endpoint = 'creators/'.$id.'/events';

    $model = new Events();
    $params['filterBy'] = [];

    if(isset($_POST['Events'])){
      $model->attributes = $_POST['Events'];
        foreach($_POST['Events'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->creatorId = $id;
    }

    $eventsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $creatorsResponse = $this->module->marvel->search('creators/'.$id,null);

    return $this->render('creatorsEvents',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$eventsResponse,
      'creatorsResponse'=>$creatorsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($eventsResponse),
    ]);
  }//end actionCreators


  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/stories
  *
  */
  public function actionStories($id){
    $endpoint = 'creators/'.$id.'/stories';

    $model = new Stories();
    $params['filterBy'] = [];

    if(isset($_POST['Stories'])){
      $model->attributes = $_POST['Stories'];
        foreach($_POST['Stories'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->creatorId = $id;
    }

    $storiesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $creatorsResponse = $this->module->marvel->search('creators/'.$id,null);

    return $this->render('creatorsStories',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$storiesResponse,
      'creatorsResponse'=>$creatorsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($storiesResponse),
    ]);
  }//end actionStories


  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/stories
  *
  */
  public function actionSeries($id){
    $endpoint = 'creators/'.$id.'/series';

    $model = new Series();
    $params['filterBy'] = [];

    if(isset($_POST['Stories'])){
      $model->attributes = $_POST['Stories'];
        foreach($_POST['Stories'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->creatorId = $id;
    }

    $seriesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $creatorsResponse = $this->module->marvel->search('creators/'.$id,null);

    return $this->render('creatorsSeries',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$seriesResponse,
      'creatorsResponse'=>$creatorsResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($seriesResponse),
    ]);
  }//end actionStories












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
