<?php

namespace app\modules\comics\controllers;

use Yii;
use yii\web\Controller;

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

        $base = "http://gateway.marvel.com:80/v1/public/";

        $path = "comics?characters=";
        $charId = "1009268";

        $ts = time();
        $privateKey = Yii::$app->params['comicsPrivateKey'];
        $publicKey = "d17809da6bca9abbbe0eaceee5ef8eff";
        $hash = md5($ts.$privateKey.$publicKey);

        $fullUrl = $base . $path . $charId
          ."&ts=" . $ts
          ."&apikey=d17809da6bca9abbbe0eaceee5ef8eff"
          ."&hash=" . $hash;

        $text = Yii::$app->httpclient->get($fullUrl);

        /*
        echo "<pre>";
        print_r($text['data']['count']);
        echo "</pre>";
        */



        return $this->render('index',[
          'results'=>$text['data']['results']
          ]
        );



        //return $this->render('index');
    }
}
