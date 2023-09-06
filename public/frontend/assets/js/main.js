// Modal Image Gallery

function onClick(element) {
    document.getElementById("img01").src = element.src;

    document.getElementById("modal01").style.display = "block";

    var captionText = document.getElementById("caption");

    captionText.innerHTML = element.alt;
}

function toggleFunction() {
    var x = document.getElementById("navDemo");

    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

$(".owl-carousel").owlCarousel({
    rtl: true,

    loop: true,

    margin: 10,

    nav: true,

    responsive: {
        0: {
            items: 1,
        },

        600: {
            items: 2,
        },

        1000: {
            items: 3,
        },
    },
});

//Carousel

var $nHeigth = $(".navbar").outerHeight();
var $item = $(".carousel-item");
var $wHeight = $(window).height();
$item.eq(0).addClass("active");
$item.height($wHeight - $nHeigth);
console.lo;
$item.addClass("full-screen");

$(".carousel img").each(function () {
    var $src = $(this).attr("src");
    var $color = $(this).attr("data-color");
    $(this)
        .parent()
        .css({
            "background-image": "url(" + $src + ")",
            "background-color": `#5a6c42`,
        });
    $(this).remove();
});

$(window).on("resize", function () {
    $wHeight = $(window).height();
    $item.height($wHeight - $nHeigth);
});

$(document).ready(function () {
    var navbar = $("#navbar");
    var scrollOffset = navbar.offset().top;

    $(window).scroll(function () {
        if ($(window).scrollTop() > scrollOffset) {
            navbar.addClass("fixed-top");
        } else {
            navbar.removeClass("fixed-top");
        }
    });
});


$(document).ready(function() {
    $('.carousel').carousel({
      pause: true,
      interval: false,
    });
  });