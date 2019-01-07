jQuery(document).ready(function ($) {
    $('.main-navigation').meanmenu();
    $('#myCarousel').carousel({
        interval: 4000
    });


    //     select option

  $(window).load(function() {
    $(".loader").fadeOut("very fast");
  }); 


  var owl = $("#sponsor-logo-slider");
      owl.owlCarousel({
      items:1,
      loop:true,
      nav:false,
      autoplay:true,
      autoplayTimeout:4000,
      fallbackEasing: 'easing',
      transitionStyle : "fade",
      dots:false,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          480:{
              items:1
          },
          580:{
              items:2
          },
          1000:{
              items:4
          }
      }
      
      });



  $('.top-menu-toggle_bar_wrapper').on('click', function(){
    $(this).toggleClass('close');
    $(this).siblings('.top-menu-toggle_body_wrapper').slideToggle().toggleClass('hide-menu');
  });

  $(window).resize(function(){
    var winWidth = $(window).width();
    if(winWidth>1023){
      $('.top-menu-toggle_body_wrapper').remove('style');
      $('.top-menu-toggle_bar_wrapper').removeClass('close');
    }
  });

  /* fr*/

  //$('#filter').submit(function(){
  jQuery('#categoryfilter').change(function() {

      var thisVal = $(this).val();
      var baseUrl='';
      if(window.location.hostname=='dev.rigorousweb.com'){
          baseUrl = 'http://dev.rigorousweb.com/demo/aep/alumnis/';
      }else{
          baseUrl = 'http://moxieinthemaking.org/alumnis/';
      }
      if(thisVal && thisVal!='0'){
          window.location.href=baseUrl+'?class='+thisVal;
      }else{
          window.location.href=baseUrl;
      }
      return;


    var filter = $('#filter');
    var data = filter.serialize();
    data += '&current_url=http://dev.rigorousweb.com/demo/aep/alumnis/';
    $.ajax({
      url:filter.attr('action'),
      data:data, // form data
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        filter.find('button').text('Processing...'); // changing the button label
      },
      success:function(data){
        filter.find('button').text('Apply filter'); // changing the button label back
        $('#response').html(data); // insert data
        $('.without-ajax-member-item-wrapper').hide();
      }
    });
    return false;
  });

   /* jQuery(document).on('click', '.rws_ajax_pagination .pagination a', function(evt) {
      evt.preventDefault();
    var filter = $('#filter');
    var data = filter.serialize(), // form data
    data.paged=$(this).attr('href');
    $.ajax({
      url:filter.attr('action'),
      data: data,
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        filter.find('button').text('Processing...'); // changing the button label
      },
      success:function(data){
        filter.find('button').text('Apply filter'); // changing the button label back
        $('#response').html(data); // insert data
        $('.without-ajax-member-item-wrapper').hide();
      }
    });
    return false;
  });*/

});

