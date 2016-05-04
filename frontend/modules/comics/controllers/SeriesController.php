<?php

namespace app\modules\comics\controllers;


use yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\modules\comics\models\Series;

/**
 * Default controller for the `cruddemo` module
 */
class SeriesController extends Controller
{
  /*
  * MARVEL = GET /v1/public/series
  * MARVEL = GET /v1/public/series/{seriesId}
  *
  */
  public function actionIndex($id = null){
    $endpoint = 'series';

    $model = new Series();
    $params['filterBy'] = [];

    if(isset($_POST['Series'])){
      $model->attributes = $_POST['Series'];
        foreach($_POST['Series'] as $key => $val){
        if(isset($val) && ($val <> '')){
          array_push($params['filterBy'],[$key => $val]);
        }
      }
    }


    if(!(is_null($id))){
      $endpoint = $endpoint."/".$id;
    }
    $response = $this->module->marvel->search($endpoint,$params);

    return $this->render('seriesDetail',[
      'model'=>$model,
      'id'=>$id,
      'response'=>$response,
    ]);



  }//end actionIndex





  /*
  * MARVEL = GET /v1/public/series/{seriesId}/characters
  *
  */
  public function actionCharacters($id){
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);
    $charactersResponse = $this->module->marvel->search('series/'.$id.'/characters',null);
    return $this->render('seriesCharacters',[
    //  'series'=>array_pop($response['response']['data']['results']),
      'id'=>$id,
      'seriesResponse'=>$seriesResponse,
      'charactersResponse'=>$charactersResponse,
      ]
    );
  }


  /*
  * MARVEL = GET /v1/public/series/{seriesId}/comics
  *
  */
  public function actionComics($id){
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);
    $comicsResponse = $this->module->marvel->search('series/'.$id.'/comics',null);
    return $this->render('seriesComics',[
    //  'series'=>array_pop($response['response']['data']['results']),
      'id'=>$id,
      'seriesResponse'=>$seriesResponse,
      'comicsResponse'=>$comicsResponse,
      ]
    );
  }

  /*
  * MARVEL = GET /v1/public/series/{seriesId}/creators
  *
  */
  public function actionCreators($id){
    //GET OUR DATA
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);
    $creatorsResponse = $this->module->marvel->search('series/'.$id.'/creators',null);
    return $this->render('seriesCreators',[
      'id'=>$id,
      'seriesResponse'=>$seriesResponse,
      'creatorsResponse'=>$creatorsResponse,
      ]
    );
  }//end actionCreators

  /*
  * MARVEL = GET /v1/public/series/{seriesId}/comics
  *
  */
  public function actionEvents($id){

    $seriesResponse = $this->module->marvel->search('series/'.$id,null);
    $eventsResponse = $this->module->marvel->search('series/'.$id.'/events',null);
    return $this->render('seriesEvents',[
    //  'series'=>array_pop($response['response']['data']['results']),
      'id'=>$id,
      'seriesResponse'=>$seriesResponse,
      'eventsResponse'=>$eventsResponse,
      ]
    );
  }

  /*
  * MARVEL = GET /v1/public/series/{seriesId}/stories
  *
  */
  public function actionStories($id){
    //GET OUR DATA
    $seriesResponse = $this->module->marvel->search('series/'.$id,null);
    $storiesResponse = $this->module->marvel->search('series/'.$id.'/stories',null);
    return $this->render('seriesStories',[
      'id'=>$id,
      'seriesResponse'=>$seriesResponse,
      'storiesResponse'=>$storiesResponse,
      ]
    );
  }//end actionCreators




  /*
  * MARVEL = GET /v1/public/series/{seriesId}
  *
  */
  /*
  public function actionDetail($id){
    //GET OUR DATA
    $response = $this->module->marvel->search('series/'.$id,null);
    return $this->render('seriesDetail',[
    //  'series'=>array_pop($response['response']['data']['results']),
      'id'=>$id,
      'response'=>$response,
      ]
    );
  }//end actionDetail


  //public $defaultAction = 'search';
  public function actionSearch(){
    return $this->render('search',[
      ]
    );
  }
  */

}//end class
