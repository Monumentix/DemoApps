$(window).ajaxStart(function (){
    $('body').addClass('wait');
  })
  .ajaxComplete(function () {
    $('body').removeClass('wait');
});


$(document).ready(function(){
  $('.scroll').jscroll({
    nextSelector : 'a.nextPageScroller:last',
    autoTrigger: false,
    loadingHtml : '<h2 class="text-center"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></h2>'
  });

});


$('.seriesComicsComic').on('click','.img-thumbnail',function(){
  var detailsPanel = $(this).parent().next('.seriesComicsDetails');
  $(detailsPanel).toggle();
  $('.seriesComicsRow').hide().fadeIn('fast');
});


$('.seriesComicsDetails').on('click','.details',function(){
  //$(this).parent().removeClass('bigComicPreview');
  $(this).parent().toggle();
  $('.seriesComicsRow').hide().fadeIn('fast');
});






function showModal(path, title){
  //alert("move the thing");

    //Fix to move modal before showing it
  $("#coverImageTitle").html(title);
  $("#coverImageUrl").attr("src",path);

  $('#coverView').css("zIndex",1500);

  $('#coverView').appendTo("#wrap").modal('show');
  $('.modal-backdrop').appendTo("#wrap")

  //Show our spinner on our modal
  $('#coverImageUrl').hide();
  $('#loadingImg').show();

  $('#coverImageUrl').on('load',function(){
    $('#coverImageUrl').show();
    $('#loadingImg').hide();
  });

  //$('#coverView').modal('show');



  //But we also set some data from our rows into the form
}


/*
function fetchNextPage(offsetVal){
  intOffset = offsetVal;

  //intOffset = $("#nextPage").data('offset');

    $.ajax({
        type: "GET",
        url: '/comics/default/search',
        data: {offset:  intOffset },
        dataType : 'html',
        success: function(data, status, xhr){
          //$("#ComicsItemWrapper").append(data);
          //console.log(data);
          wrapper = $($.parseHTML(data)).filter("#comicsItemWrapper");
          $("#comicsPagerWrapper").remove();
          $("#comicsItemWrapper").append(wrapper.html());


          //pager = $($.parseHTML(data)).filter("#comicsPagerWrapper");
          //$("#comicsPagerWrapper").html($pager);
        },
        error: function(xhr, status, error){
          alert("Error Fetching Next Page: " + error);
        },
        complete: function(){
          $('body').removeClass('wait');
          //alert("complete");
        }
    });

};
*/
