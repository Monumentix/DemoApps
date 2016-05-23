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

  public $defaultAction = 'popular';

  public function actionIndex(){
    $this->render('index');
  }

  public function actionPopular(){

    $stats = Summaries::find()
      ->orderBy(
        ['comicsCount'=>SORT_DESC]
      )
      ->limit(30)
      ->all();

    return $this->render('popular',[
      'stats'=>$stats,
      ]);

  }


  /*
  * Was a test action we used to load data into our db but had issues with errors
  * in the end it was easier to load the batches ourself.
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

  }//end actionCrawl


}//end class
