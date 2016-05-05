<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Characters extends Model
{
    public $seriesId;
    public $name;
    public $nameStartsWith;
    public $modifiedSince;

    public $comics;
    public $stories;
    public $events;
    public $creators;
    public $characters;

    public $orderBy;
    public $limit;
    public $offset;

    public static $ORDER_BY_TYPES = [
      ''=>'Choose to OrderBy...',
      'name'=>'Name - ASC',
      'modified'=>'Modified - ASC',
      '-name'=>'Name - DESC',
      '-modified'=>'Modified - DESC',
    ];

    public static $LIMIT_BY_TYPES = [
      '5'=>'5 rows per page',
      '10'=>'10 rows per page',
      '20'=>'20 rows per page',
      '50'=>'50 rows per page'
    ];

    public function rules(){
      return[
        [['seriesId','name','nameStartsWith','modifiedSince'],'safe'],
        [['comics','stories','events','creators','characters'],'safe'],
        [['orderByType','limit','offset'],'safe'],
      ];
    }


    public function attributeLabels()
    {
        return [
            'offset'=>'Starting',
            'limit'=> 'Per Page'
        ];
    }

    public function getOrderByTypes(){
      return self::$ORDER_BY_TYPES;
    }

    public function getLimitByTypes(){
      return self::$LIMIT_BY_TYPES;
    }

}
