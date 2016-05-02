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
<div id="loadingImg">
  <h4 class="loading-text">Fetching Image</h4>
  <span class="loading-icon"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></span>
</div>
<img id="coverImageUrl" class="img center-block" src="">

<?php
Modal::end();
?>
