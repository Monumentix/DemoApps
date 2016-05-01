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
