<div class="row">
  <div class="col-sm-3 text-center ">
    <?php if(!empty($character['thumbnail'])) : ?>
      <img src="<?=$character['thumbnail']['path']."/detail.".$character['thumbnail']['extension']; ?>"
      class="img img-responsive img-series-cover center-block"
      onClick="showModal('<?=$character['thumbnail']['path']?>/detail.<?=$character['thumbnail']['extension']?>','<?=$character['name']?>')">
    <?php endif ?>
  </div>

  <div class="col-sm-9 text-left">
    <div class="row">
      <div class="col-sm-12 text-left">
        <h1 class="characterTitle">Character:</h1>
        <h3><?=$character['name'];?></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 text-left long-description">
        <h5 class="">Description:</h5>
        <p class=""><?=(($character['description'] == null) ? 'No description listed.' : $character['description'] );?></p>
      </div>
    </div>
  </div>
</div>
