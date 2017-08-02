jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});

$(function(){
        $('#totopscroller').totopscroller({
          toTopHtml: '<i class="fa fa-border fa-2x fa-chevron-up"></i>',
        });
      })




$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >=50) {
         $(".nav-1").addClass("nav-1-1");
         $(".nav-1-1").removeClass("nav-1");
     } else {
         $(".nav-1-1").addClass("nav-1");
         $(".nav-1").removeClass("nav-1-1");
     }
});

       
  $('.tabopen').on('click',function(){
          $('.tabopen').fadeOut(200 ,function(){
            $('.tabBox').animate({right:'0px'},400);
            $('.tabclose').animate({right:'340px'},400).fadeIn(500);

          });
        })
        $('.tabclose').on('click',function(){
          $('.tabclose').fadeOut(200 ,function(){
            $('.tabBox').animate({right:'-340px'},400);
            $('.tabopen').fadeIn(500);
          });
        })



			


new WOW().init();

        $(document).ready(function(){
        $('#Container1').mixItUp();  
        });
        



              $('.quote-vertical').bxSlider({
                mode:'vertical',
                touchEnabled :true,
                controls:false,
                keyboardEnabled:true,
                auto :true,
                speed:700,
                pager :false,
                pause :4000,

                });


$(document).ready(function () {

  // preloader
  $(window).load(function(){
    $('.preloader').delay(400).fadeOut(500);
  })

})
$(function(){
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('main').addClass("loaded");
  });
  
})


// googleMap
$(function(){
var myCenter=new google.maps.LatLng(24.896592036710892,91.86817735433578);

function initialize()
{
var mapProp = {
  center:myCenter,
  scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    zoom: 16,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"Frndzit"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);

})




//======= Modal Js =========\\
jQuery(function($){
  // Get the modal
  var modal = $('#myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = $('.popImg');
  var modalImg = $("#img01");
  var captionText = $("#caption");
  img.click(function(){
    var dis=$(this);
    imgget=dis.find("img").attr("src")
    modalImg.attr("src",imgget);
    captionTextget=dis.find(".maskLayer h1").text();
    captionText.text(captionTextget);
    modal.slideDown();

  });
  
  // Get the <span> element that closes the modal
  var closeBtn = $(".closeBtn");

  // When the user clicks on <span> (x), close the modal
  closeBtn.click(function(){
    
    modal.slideUp();

  });

});

 $(document).on('ready', function() {
           $(".regular").slick({
             dots: true,
             infinite: true,
             slidesToShow: 3,
             slidesToScroll: 3
           });
         });        


