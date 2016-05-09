<div class="eventsDetail">
<div class="row">
  <div class="col-sm-4">
    <?php if(!(empty($event['thumbnail']))) : ?>
      <img src="<?=$event['thumbnail']['path']?>/detail.<?=$event['thumbnail']['extension']?>" class="img img-thumbnail img-rounded">
    <?php endif; ?>
  </div>
  <div class="col-sm-8">
    <?php if(!(empty($event['title']))) : ?>
      <h3><?=$event['title']?></h3>
    <?php endif; ?>
    <?php if(!(empty($event['description']))) : ?>
      <p><?=$event['description']?></p>
    <?php endif; ?>
  </div>
</div>
</div>
<hr class="comics-divider">
