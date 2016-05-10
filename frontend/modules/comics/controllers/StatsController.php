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
use app\modules\comics\models\Summaries;

/**
 * Default controller for the `cruddemo` module
 */
class StatsController extends Controller
{


  public function actionIndex(){
    $this->render('index');
  }

  public function actionPopular(){

    $stats = Summaries::find()
      ->orderBy(
        ['comicsCount'=>SORT_DESC]
      )
      ->limit(50)
      ->all();



    return $this->render('popular',[
      'stats'=>$stats,
      ]);

  }


  /*
  * Was a test action we used to load data into our db
  *
  */
  public function actionCrawl($start,$total,$pgLimit,$blnTest = false){


    $endpoint = 'characters';

    $params['filterBy'] = [];
    array_push($params['filterBy'],['offset' => $start]);
    array_push($params['filterBy'],['limit' => $pgLimit]);

    $response = $this->module->marvel->search($endpoint,$params);

    foreach($response['response']['data']['results'] as $character){
        $model = new Summaries();

        $model->characterId = $character['id'];
        $model->name =  $character['name'];
        $model->imgURI =  $character['thumbnail']['path'];
        $model->comicsCount = $character['comics']['available'];
        $model->eventsCount = $character['events']['available'];
        $model->storiesCount = $character['stories']['available'];
        $model->seriesCount = $character['series']['available'];

        if($model->save()){
          echo "Model Saved<BR>";
        }else{
          echo "Model Not Saved<BR>";
        }
    };

    /*
    return $this->render('statsCrawl',[
      'model'=>$model,
      'response'=>$response,
      'results'=>$results,
      'pager'=>$this->buildRecordPager($response),
    ]);
    */





    /*
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
    */
  }//end actionCrawl






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
