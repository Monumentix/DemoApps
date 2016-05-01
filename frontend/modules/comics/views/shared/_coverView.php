<?php
use yii\bootstrap\Modal;

Modal::begin([
    'id'=>'coverView',
    'header'=>'<h2 id="coverImageTitle">Placeholder Comic Title</h2>',
    'options'=>[
      //'data-backdrop'=>"false"
    ]
  ]);
?>

<img id="coverImageUrl" class="img center-block" src="">

<?php
Modal::end();
?>
