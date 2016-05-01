<?php

namespace app\modules\comics\models;

use yii\base\Model;

class Comics extends Model
{
    public $id;
    public $digitalId;
    public $title;
    public $issueNumber;
    public $description;
    public $upc;
    public $textObjects;
    public $thumbnail;
    public $images;

}
