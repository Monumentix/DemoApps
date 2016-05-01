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

}
