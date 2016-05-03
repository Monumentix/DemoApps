<?php
  use yii\helpers\Html;
?>

<div class="row seriesComicsRow text-left">
  <?php  foreach($comics as $comic) : ?>
    <div class="seriesComicsComic col-xs-4 col-sm-3 col-md-2 text-right">

      <?php $url= ""; ?>

      <?php if (!empty($comic['images']) ) {
          $images = array_pop($comic['images']);
          $url = $images['path'].'/portrait_fantastic.'.$images['extension'];
        };
      ?>
      <img src="<?=$url?>" class='img img-thumbnail center-block'>
      <div class="issueNumber">#<?=$comic['issueNumber']?>
      </div>
      <br>
    </div>

    <div class="seriesComicsDetails bigComicPreview col-xs-8 col-sm-6">
      <div class="details text-left">
        <h4><?=$comic['title']?></h4>
        <p class="descrption"><?=$comic['title']?> </p>
        <br><br><br><br><br>
      </div>
    </div>

  <?php  endforeach ?>
</div>
<h4 class="text-center">Click for next Page</h4>
