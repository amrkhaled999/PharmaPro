fetch("https://quotes15.p.rapidapi.com/quotes/random/", {
    method: "GET",
    headers: {
        'X-RapidAPI-Key': '9fbdf3093bmsh70589410816a3dfp1f964djsn541415eb8f4c',
        'X-RapidAPI-Host': 'quotes15.p.rapidapi.com'
    }
})
.then(response => response.json())
.then(response => {
    console.log(response);

    var quoteContent = response.content;
    var quoteAuthor = response.originator.name;
    // Get the elements where you want to display the content and author
    var contentElement = document.getElementById("quote-content");
    var authorElement = document.getElementById("quote-author");

    // Set the content and author in the HTML elements
    contentElement.textContent = quoteContent;
    authorElement.textContent = quoteAuthor;
})
.catch(err => {
    console.log(err);
});

// ---------horizontal-navbar-menu-----------
var tabsNewAnim = $('#navbar-animmenu');
var selectorNewAnim = $('#navbar-animmenu').find('li').length;
//var selectorNewAnim = $(".tabs").find(".selector");
var activeItemNewAnim = tabsNewAnim.find('.active');
var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
var itemPosNewAnimLeft = activeItemNewAnim.position();
$(".hori-selector").css({
    "left":itemPosNewAnimLeft.left + "px",
    "width": activeWidthNewAnimWidth + "px"
});
$("#navbar-animmenu").on("click","li",function(e){
    $('#navbar-animmenu ul li').removeClass("active");
    $(this).addClass('active');
    var activeWidthNewAnimWidth = $(this).innerWidth();
    var itemPosNewAnimLeft = $(this).position();
    $(".hori-selector").css({
        "left":itemPosNewAnimLeft.left + "px",
        "width": activeWidthNewAnimWidth + "px"
    });
});

$(document).ready(function() {
    var slides = $(".slide");
    var slideIndex = 0;

    function showSlide() {
      slides.fadeOut();
      slides.eq(slideIndex).fadeIn();
      slideIndex = (slideIndex + 1) % slides.length;
    }

    setInterval(showSlide, 2000); // Change slide every 2 seconds
  });
