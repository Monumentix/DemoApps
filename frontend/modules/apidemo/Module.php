<?php

namespace app\modules\apidemo;

/**
 * apidemo module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\apidemo\controllers';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // /Yii::app()->setComponents($moduleConfig['components']);
        // custom initialization code goes here
    }
}