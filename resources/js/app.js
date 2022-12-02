/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import Swiper from "swiper";
// import Swiper styles
import "swiper/css";
import IMask from "imask";

require("./bootstrap");

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require("./components/Example");
require("./jquery-3.6.0.min.js");
require("./jquery.svg3dtagcloud.min.js");
require("./sly.min.js");

const swiper = new Swiper(".swiper", {
    // Optional parameters
    observer:       true,
    observeParents: true,
    parallax:       true,
    direction:      "horizontal",
    loop:           true,

    speed:         400,
    spaceBetween:  30,
    slidesPerView: 3,
});

if (window.outerWidth <= 700) {
    const swiperTypes = new Swiper(".swiper-types", {
        // Optional parameters
        observer:       true,
        observeParents: true,
        parallax:       true,
        direction:      "horizontal",
        loop:           true,
        breakpoints:    {
            320: {
                slidesPerView: 1,
                spaceBetween:  20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
                spaceBetween:  30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2,
                spaceBetween:  40
            }
        },
        speed:          400,
        spaceBetween:   20,
        slidesPerView:  5,
    });
}
const swiper1 = new Swiper(".swiper-1", {
    // Optional parameters
    observer:       true,
    observeParents: true,
    parallax:       true,
    direction:      "horizontal",
    loop:           true,

    speed:         400,
    spaceBetween:  30,
    slidesPerView: 3,
});
const swiper2 = new Swiper(".swiper-3", {
    // Optional parameters
    observer:       true,
    observeParents: true,
    parallax:       true,
    direction:      "horizontal",
    loop:           true,

    speed:         400,
    spaceBetween:  10,
    slidesPerView: 5,
});

document.addEventListener("DOMContentLoaded", () => {
    var element = document.getElementById("telNumber");
    if (element) {
        var maskOptions = {
            mask: "+{7}(000)000-00-00",
        };
        var mask = IMask(element, maskOptions);
    }

    var filterBlock = document.getElementById("filterBlock");
    var buttonFilters = document.getElementById("buttonFilters");
    if (buttonFilters) {
        buttonFilters.addEventListener("click", function () {
            $(filterBlock).toggle();
        });
    }

    $("#overlayBlock").click(function (e) {
        // console.log($(e.target).closest(".filterContentBlock"));
        console.log(e.target);
        if (
            e.target.id == "overlayBlock" ||
            e.target.id == "closeFilter" ||
            $(e.target).hasClass("closeicon")
        ) {
            $(filterBlock).toggle();
        }
        // if(!$(e.target).hasClass('filterContentBlock')) {
        //     console.log($(e.target).closest("#filterBlock").find(".filterContentBlock:not('#overlayBlock')"));

        //     $(filterBlock).toggle();

        // }
    });
});
var $frame = $("#basic");

// Call Sly on frame
$frame.sly({
    horizontal: 1,
    itemNav:    "basic",

    activateOn:    "click",
    mouseDragging: 1,
    touchDragging: 1,
    releaseSwing:  1,
    smart:         1,
});
$(document).ready(function () {
    $.get("/kadr/competentions/list").then((res) => {
        var entries = [];
        console.log(res);
        for (const key in res) {
            entries.push({label: key, url: res[key]});
        }

        var settings = {
            entries:         entries,
            width:           640,
            height:          480,
            radius:          "65%",
            radiusMin:       75,
            bgDraw:          true,
            bgColor:         "#fff",
            opacityOver:     1.0,
            opacityOut:      0.05,
            opacitySpeed:    6,
            fov:             800,
            speed:           1,
            fontFamily:      "Oswald, Arial, sans-serif",
            fontSize:        "15",
            fontColor:       "#000",
            fontWeight:      "normal", //bold
            fontStyle:       "normal", //italic
            fontStretch:     "normal", //wider, narrower, ultra-condensed, extra-condensed, condensed, semi-condensed, semi-expanded, expanded, extra-expanded, ultra-expanded
            fontToUpperCase: true,
        };
        //var svg3DTagCloud = new SVG3DTagCloud( document.getElementById( 'holder'  ), settings );
        $("#tag-cloud").svg3DTagCloud(settings);
    });


});
