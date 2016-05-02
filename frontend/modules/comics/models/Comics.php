<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Comics extends Model
{

    public $format;
    public $formatType;

    public $title;
    public $titleStartsWith;
    public $characters;

    public $id;
    public $digitalId;

    public $issueNumber;
    public $description;
    public $upc;
    public $textObjects;
    public $thumbnail;
    public $images;

    public $orderBy;


    public static $COMIC_FORMATS = [
      ''=>'Select Format...',
      'comic'=>'comic',
      'magazine'=>'magazine',
      'trade paperback'=>'trade papberback'
    ];

    public static $COMIC_FORMAT_TYPE = [
      ''=>'Select Format Type...',
      'comic'=>'comic',
      'collection'=>'collection'
    ];

    public static $ORDER_BY_TYPES = [
      ''=>'Order By...',
      'focDate'=>'focDate - ASC',
      'onsaleDate'=>'On Sale Date - ASC',
      'title'=>'Title - ASC',
      'issueNumber'=>'Issue Number - ASC',
      '-focDate'=>'focDate - DESC',
      '-onsaleDate'=>'On Sale Date - DESC',
      '-title'=>'Title - DESC',
      '-issueNumber'=>'Issue Number - DESC',
    ];

    public function attributeLabels()
    {
        return [
            'format' => 'Format',
            'title' => 'Title',
        ];
    }

    public function getFormatTypes(){
      return self::$COMIC_FORMAT_TYPE;
    }

    public function getFormats(){
      return self::$COMIC_FORMATS;
    }

    public function getOrderByTypes(){
      return self::$ORDER_BY_TYPES;
    }

}
