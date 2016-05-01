<?php

namespace app\modules\comics\components;



use Yii;
use yii\base\Exception;
use yii\base\Component;
use yii\base\InvalidConfiguration;
use yii\helpers\Json;
use yii\web\HttpException;

class MarvelComponent extends Component{

  private base;
  private privateKey;
  private publicKey;
  private ts;
  private hash;


  public function init(){
    $this->base = "http://gateway.marvel.com:80/v1/public/";
    $this->privateKey = Yii::$app->params['comicsPrivateKey'];
    $this->publicKey = "d17809da6bca9abbbe0eaceee5ef8eff";

    $ts = time();
    $hash = md5($ts.$privateKey.$publicKey);
  }





  /*
  $path = "comics?characters=";
  $charId = "1009268";

  if(isset($params['offset'])){
    $offset = $params['offset'];
  }




  $fullUrl = $base . $path . $charId
    ."&limit=10"
    ."&offset=". $offset
    ."&ts=" . $ts
    ."&apikey=d17809da6bca9abbbe0eaceee5ef8eff"
    ."&hash=" . $hash;


  $response = Yii::$app->httpclient->get($fullUrl);

  return $response;
  */

  public function testme($params = null){

    echo "I'm here";
    
  }

  public function search($params){

  }

}
