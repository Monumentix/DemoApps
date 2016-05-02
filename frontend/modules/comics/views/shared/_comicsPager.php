<?php
use yii\helpers\Html;
use kartik\icons\Icon;

?>

<div id="comicsPagerWrapper" class="pagerWrapper">
  <div class="row marvel-pager">
    <div class="col-xs-3 text-left left">
      <h4>Records <?=(($pager['curPage'] == 1 ) ? '1' : (($pager['curPage']-1) * $pager['pageSize']) ) ?> - <?=($pager['curPage'] * $pager['pageSize'] ) ?> of  <?=($pager['total']) ?> </h4>
    </div>
    <div class="col-xs-6 text-center">
      
      <a href="<?=$pager['nextPageLink'];?>&offset=<?=$pager['nextPage'];?>"
         class="nextPageScroller shadow btn btn-lg btn-success "
          data-offset="<?=$pager['nextPage'];?>" >
          <?=Icon::show('angle-double-down')?> &nbsp;Get Page <?=$pager['curPage'] +1;?>&nbsp; <?=Icon::show('angle-double-down')?>
      </a>


    </div>
    <div class="col-xs-3 text-right pull-right">
      <h4><?=$pager['curPage'] ?> of <?=$pager['lastPage'] ?> Pages</h4>
      <?print_r($_GET['Comics'])?>
    </div>
  </div>
</div>
