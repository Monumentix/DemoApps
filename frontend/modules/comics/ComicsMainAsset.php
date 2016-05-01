<?php

namespace app\modules\comics;

use yii\web\AssetBundle;

class ComicsMainAsset extends AssetBundle {
  public $sourcePath = '@frontend/modules/comics/assets';
  public $js = [
    'js/comics.js',
    'js/jscroll.js'
  ];
  public $css = [
      'css/comics.css'
    ];

  public $depends = [
    'yii\web\YiiAsset'
    ];

  public function init()
  {
    parent::init();
    $this->publishOptions['forceCopy'] = true;
  }


}
