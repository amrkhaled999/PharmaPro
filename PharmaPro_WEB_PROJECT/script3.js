$(document).ready(function() {
    // Add animations to form on page load
    $('.form-container form').addClass('animated fadeInUp');
 
    // Add animations on hover
    $('.form-container form input, .form-container form select').hover(
       function() {
          $(this).addClass('animated pulse');
       },
       function() {
          $(this).removeClass('animated pulse');
       }
    );
 
    // Add animation on form submission
    $('.form-container form').submit(function() {
       $(this).addClass('animated rubberBand');
    });
 
    // Add animation on button click
    $('.form-container form .form-btn').click(function() {
       $(this).addClass('animated tada');
    });
 
    // Add animation on link hover
    $('.form-container form p a').hover(function() {
       $(this).addClass('animated heartBeat');
    });
 
    // Add animation on error message display
    $('.form-container form .error-msg').addClass('animated shake');
 });
 