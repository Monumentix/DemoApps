<div class="row">
  <div class="col-sm-3 text-center ">
    <?php if(!empty($creator['thumbnail'])) : ?>
      <img src="<?=$creator['thumbnail']['path']."/detail.".$creator['thumbnail']['extension']; ?>"
      class="img img-responsive img-series-cover center-block"
      onClick="showModal('<?=$creator['thumbnail']['path']?>/detail.<?=$creator['thumbnail']['extension']?>','<?=$creator['fullName']?>')">
    <?php endif ?>
  </div>

  <div class="col-sm-9 text-left">
    <div class="row">
      <div class="col-sm-8 text-left">
        <h1 class="comicsTitle">Creator:</h1>
        <h3><?=$creator['fullName'];?></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 text-left long-description">
        
      </div>
    </div>
  </div>
</div>
