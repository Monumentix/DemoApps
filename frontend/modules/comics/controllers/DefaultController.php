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
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
      $comicsModel = new Comics();
      $charctersModel = new Characters();
      $creatorsModel = new Creators();
      $eventsModel = new Events();
      $seriesModel = new Series();
      $storiesModel = new Stories();

      return $this->render('index',
      [
        'comicsModel'=>$comicsModel,
        'charactersModel'=>$charctersModel,
        'creatorsModel'=>$creatorsModel,
        'eventsModel'=>$eventsModel,
        'seriesModel'=>$seriesModel,
        'storiesModel'=>$storiesModel
      ]);
    }


}
