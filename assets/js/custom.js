//Anchors
$(function () {
  $('a[href^="#"]').on('click', function () {
    var target = $(this).attr('href');
    $('html, body').animate({scrollTop: $(target).offset().top -95 }, 800);
    return false;
  });
});
