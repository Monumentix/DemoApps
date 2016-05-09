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
class StoriesController extends Controller
{
  /*
  * MARVEL = GET /v1/public/stories
  * MARVEL = GET /v1/public/stories/{storyId}
  *
  */
  public function actionIndex($id = null){
    $endpoint = 'stories';

    $model = new Stories();
    $params['filterBy'] = [];

    if(isset($_POST['Stories'])){
      $model->attributes = $_POST['Stories'];
        foreach($_POST['Stories'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
    }

    if(!(is_null($id))){
      $endpoint = $endpoint."/".$id;
    }
    $response = $this->module->marvel->search($endpoint,$params);

    return $this->render('storiesDetail',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$response,
      'pager'=>$this->buildRecordPager($response),
    ]);
  }//end actionIndex




  /*
  * MARVEL = GET /v1/public/stories/{storyId}/comics
  *
  */
  public function actionComics($id){
    $endpoint = 'stories/'.$id.'/comics';

    $model = new Comics();
    $params['filterBy'] = [];

    if(isset($_POST['Comics'])){
      $model->attributes = $_POST['Comics'];
        foreach($_POST['Comics'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->storydId = $id;
    }

    $comicsResponse = $this->module->marvel->search($endpoint,$params);

    //This gets our series information to display at the top
    $storiesResponse = $this->module->marvel->search('stories/'.$id,null);

    return $this->render('storiesComics',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$comicsResponse,
      'storiesResponse'=>$storiesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($comicsResponse),
    ]);
  }//end actioncreators



    /*
    * MARVEL = GET /v1/public/stories/{storyId}/creators
    *
    */
    public function actionCharacters($id){
      $endpoint = 'stories/'.$id.'/characters';

      $model = new Characters();
      $params['filterBy'] = [];

      if(isset($_POST['Characters'])){
        $model->attributes = $_POST['Characters'];
          foreach($_POST['Characters'] as $key => $val){
          if(isset($val) && ($val <> '')){
            array_push($params['filterBy'],[$key => $val]);
          }
        }
        $model->storyId = $id;
      }

      $charactersResponse = $this->module->marvel->search($endpoint,$params);
      //This gets our series information to display at the top
      $storiesResponse = $this->module->marvel->search('stories/'.$id,null);

      return $this->render('storiesCharacters',[
        'model'=>$model,
        'id'=>$id,
        'response'=>$charactersResponse,
        'storiesResponse'=>$storiesResponse['response']['data']['results'][0],
        'pager'=>$this->buildRecordPager($charactersResponse),
      ]);
    }//end actionCreators





  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/creators
  *
  */
  public function actionCreators($id){
    $endpoint = 'stories/'.$id.'/creators';

    $model = new Creators();
    $params['filterBy'] = [];

    if(isset($_POST['Creators'])){
      $model->attributes = $_POST['Creators'];
        foreach($_POST['Creators'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->storyId = $id;
    }

    $creatorsResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $storiesResponse = $this->module->marvel->search('stories/'.$id,null);

    return $this->render('storiesCreators',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$creatorsResponse,
      'storiesResponse'=>$storiesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($creatorsResponse),
    ]);
  }//end actionCreators




  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/stories
  *
  */
  public function actionEvents($id){
    $endpoint = 'stories/'.$id.'/events';

    $model = new Events();
    $params['filterBy'] = [];

    if(isset($_POST['Events'])){
      $model->attributes = $_POST['Events'];
        foreach($_POST['Events'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->storyId = $id;
    }

    $storiesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $storiesResponse = $this->module->marvel->search('stories/'.$id,null);

    return $this->render('storiesEvents',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$storiesResponse,
      'storiesResponse'=>$storiesResponse['response']['data']['results'][0],
      'pager'=>$this->buildRecordPager($storiesResponse),
    ]);
  }//end actionStories


  /*
  * MARVEL = GET /v1/public/creators/{creatorsId}/stories
  *
  */
  public function actionSeries($id){
    $endpoint = 'stories/'.$id.'/series';

    $model = new Series();
    $params['filterBy'] = [];

    if(isset($_POST['Series'])){
      $model->attributes = $_POST['Series'];
        foreach($_POST['Series'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
      $model->storyId = $id;
    }

    $seriesResponse = $this->module->marvel->search($endpoint,$params);
    //This gets our series information to display at the top
    $storiesResponse = $this->module->marvel->search('stories/'.$id,null);

    return $this->render('storiesSeries',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$seriesResponse,
      'storiesResponse'=>$storiesResponse['response']['data']['results'][0],
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
