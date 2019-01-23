$(document).ready(function() {
  $(".gender-radio input").click(function() {
      $(".gender-radio").removeClass("checked");
      $(this)
          .parent()
          .addClass("checked");
  });

  $(".login-toggle").click(function(event) {
      event.preventDefault();
      $(".login-form").slideToggle();
  });
});

$("#testimonial-slider").owlCarousel({
  items: 2,
  itemsDesktop: [1000, 2],
  itemsDesktopSmall: [979, 2],
  itemsTablet: [768, 1],
  pagination: true,
  navigation: false,
  autoplay: true
});