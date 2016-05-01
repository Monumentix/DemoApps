<?php
use yii\helpers\Html;
use kartik\icons\Icon;

?>

<div id="comicsPagerWrapper" class="pagerWrapper">
  <div class="row alert alert-link">
    <div class="col-sm-12 text-center">
      <h4>Page <?=$pager['curPage'] ?> out of  <?=$pager['lastPage'] ?> </h4>
        <a href="?offset=<?=$pager['nextPage'];?>"
           class="nextPageScroller shadow btn btn-lg btn-primary "
            data-offset="<?=$pager['nextPage'];?>"  >
        <?=Icon::show('angle-double-down')?> More <?=Icon::show('angle-double-down')?></a>
    </div>
  </div>
</div>
