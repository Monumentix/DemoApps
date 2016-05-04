<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Series extends Model
{
    public $format;
    public $formatType;

    public $title;
    public $titleStartsWith;
    public $startYear;
    public $modifiedSince;

    public $comics;
    public $stories;
    public $events;
    public $creators;
    public $characters;

    public $seriesType;
    public $contains;
    public $orderBy;
    public $limit;
    public $offset;


    public static $SERIES_TYPES = [
      ''=>'Choose a Series type...',
      'collection'=>'collection',
      'one shot'=>'one shot',
      'limited'=>'limited',
      'ongoing'=>'ongoing'

    ];

    public static $CONTAINS_TYPES = [
      ''=>'Choose Contains type...',
      'comic'=>'comic',
      'magazine'=>'magazine',
      'trade paperback'=>'trade papberback',
      'hardcover'=>'hardcover',
      'digest'=>'digest',
      'graphic novel'=>'graphic novel',
      'digital comic'=>'digital comic',
      'infinite comic'=>'infinite comic',
    ];


    public static $ORDER_BY_TYPES = [
      ''=>'Choose to OrderBy...',
      'title'=>'Title - ASC',
      'modified'=>'Modified - ASC',
      'startYear'=>'Stat Year - ASC',
      '-title'=>'Title - DESC',
      '-modified'=>'Modified - DESC',
      '-startYear'=>'Stat Year - DESC'
    ];

    public static $LIMIT_BY_TYPES = [
      '2'=>'2 rows per page',
      '5'=>'5 rows per page',
      '10'=>'10 rows per page',
      '15'=>'15 rows per page',
      '20'=>'20 rows per page',
      '40'=>'40 rows per page'
    ];

    public function rules(){
      return[
        [['format','formatType','title','titleStartsWith','modifiedSince','startYear'],'safe'],
        [['comics','stories','events','creators','characters'],'safe'],
        [['seriesType','containsType','orderByType','limit','offset'],'safe'],
      ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'offset'=>'Starting',
            'limit'=> 'Per Page'
        ];
    }

    public function getSeriesTypes(){
      return self::$SERIES_TYPES;
    }

    public function getContainsTypes(){
      return self::$CONTAINS_TYPES;
    }

    public function getOrderByTypes(){
      return self::$ORDER_BY_TYPES;
    }

    public function getLimitByTypes(){
      return self::$LIMIT_BY_TYPES;
    }

}
