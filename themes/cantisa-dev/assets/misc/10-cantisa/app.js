
var searchBtn = $('#searchBtn');
var searchBar = $('#buscador');
var open = 'false';

searchBtn.click(function(){
  if(open != 'false') {
    searchBar.velocity({
      // marginTop: "-110px",
      marginTop: "-80px",
      opacity: 0
    },150);
    searchBtn.children('span').removeClass('fa-remove').addClass('fa-search');
    open = 'false'; 
  } else {
    searchBar.velocity({
        marginTop: "0",
        opacity: 1
    },150);
    searchBtn.children('span').addClass('fa-remove').removeClass('fa-search');
    open = 'true';
  }
})

// al hacer click en botón
/*var detalleBtn = $('#producto .acabados li .btn');
var detalle;
var detalleOut = $('#producto .detalleOut .here')
detalleBtn.click(function(){
  $('.detalleOut').removeClass('hidden');
  detalleBtn.addClass('btn-lightgray');
  detalleBtn.removeClass('btn-main');
  $(this).addClass('btn-main');
  $(this).removeClass('btn-lightgray');
  detalle = $(this).next().clone();
  detalle.removeClass('hidden');
  $(this).parent().parent().addClass('sho');
  $('.acabados').addClass('hid');
  detalleOut.empty();
  detalleOut.html(detalle);
  imageclick();
})

$('.detalleOut .text-right').click(function(){
  $(this).parent().addClass('hidden');
  $('.acabados').removeClass('hid');
  $('.acabados').removeClass('sho');
})*/

function imageclick () {
  var image = $('#producto .detalleOut img');
  var firstimage = $('#producto .detalleOut img:first-child');
  image.click(function(){
    $(this).insertBefore($(this).prev(firstimage));
    imageclick();
  })
}

$(document).ready(function(){
      $('#slideCar').slick({
        centerMode: true,
        centerPadding:'90px',
/*    centerMode: true,
    centerPadding: '60px',*/
    dots: true,
    /* Just changed this to get the bottom dots navigation */
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
  });
    });
  //   copia el div de detalle a fuera del li
  //   hidden a li
  //   
/*//- CAROUSEL FINAL
$('#slideCar').carousel({
  interval: 10000
})

$('#slideCar .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});*/