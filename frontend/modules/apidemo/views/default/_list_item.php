<?php
// $model, $key, $index, $widget
?>

<div class="row cat-data">
  <div class="col-sm-2 text-center"> <?=$model->id; ?> </div>
  <div class="col-sm-6 text-left"> <?=$model->name; ?> </div>
  <div class="col-sm-2 text-center"> <?=$model->shopping_cat_id; ?> </div>
  <div class="col-sm-2 text-center"> <?=$model->parent_shopping_cat_id; ?> </div>
</div>
