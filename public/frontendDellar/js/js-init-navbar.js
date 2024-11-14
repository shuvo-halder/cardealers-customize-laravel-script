$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 200) {
    $('.navbar--section').addClass('navbar--solid');
  } else {
     $('.navbar--section').removeClass('navbar--solid');
  }
});