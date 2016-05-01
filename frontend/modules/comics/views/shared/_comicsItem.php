
<div id="comicsItemWrapper" class="comicswrapper">
  <div class="row">
  <?php foreach($response['data']['results'] as $comic) : ?>
    <div class="row">
      <div class="col-sm-12">

      </div>
    </div>
    <div class="row">
      <div class="col-sm-2 col-md-4 text-center">
        <img class="img img-thumbnail" src="<?=$comic['thumbnail']['path']."/landscape_medium.".$comic['thumbnail']['extension']; ?>">
      </div>
      <div class="col-sm-10 col-md-8">
        <div class="row">
          <div class="col-sm-8">
            <h4><?=$comic['title']; ?></h4>
            <Br>
              <p><?=$comic['description']; ?></p>
          </div>
          <div class="col-sm-4 text-center">
            <p><b>Issue Number: </b><?=$comic['issueNumber']; ?><b>UPC: </b><?=$comic['upc']; ?></p>
            <p ><b>Comics id: </b><?=$comic['id']; ?></p>
            <p><b>URI: </b><?// echo $comic['resourceURI']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach ?>
  </div>

  <?= $this->render('/shared/_comicsPager',[
    'pager'=>$pager,
    'response'=>$response,
    ])
  ?>
</div>
