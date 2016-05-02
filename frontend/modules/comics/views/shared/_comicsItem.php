<div id="comicsItemWrapper" class="comicswrapper">
  <div class="row">
  <?php foreach($response['data']['results'] as $comic) : ?>
    <div class="row">
      <div class="col-sm-12">

      </div>
    </div>
    <div class="row">
      <div class="col-xs-2 text-center">
        <a class="modalLaunch" onClick="showModal('<?=$comic['thumbnail']['path']."/detail.".$comic['thumbnail']['extension']; ?>','<?=$comic['title']?>')" >
          <img class="img img-thumbnail img-responsive" src="<?=$comic['thumbnail']['path']."/standard_large.".$comic['thumbnail']['extension']; ?>">
        </a>
      </div>
      <div class="col-xs-10 ">
        <div class="row">
          <div class="col-xs-8">
            <h4><?=$comic['title']; ?></h4>
              <p><?=$comic['description']; ?></p>
          </div>
          <div class="col-xs-4 text-center">
            <h4><b>Issue Number: </b><?=$comic['issueNumber']; ?><b></h4>
            <p>UPC: </b><?=$comic['upc']; ?></p>
            <p><b>Comics id: </b><?=$comic['id']; ?></p>
            <p><b>Detail View: </b><?= $comic['id']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach ?>
  </div>


</div>

<?= $this->render('/shared/_comicsPager',[
  'pager'=>$pager,
  'response'=>$response,
  ])
?>
