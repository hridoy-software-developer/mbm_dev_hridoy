/*!
 * spur-template - An admin template based on Bootstrap 4
 * Version v1.0.2
 * Copyright 2016 - 2019 Alexander Rechsteiner
 * https://hackerthemes.com
 */

const mobileBreakpoint = window.matchMedia("(max-width: 991px )");

$(document).ready(function(){
    // $(".dash-nav-dropdown").click(function(){
    //     alert('clicked');
    //     $('.dash-nav-dropdown-menu').toggle();
    //     // $(this).closest(".dash-nav-dropdown")
    //     //     .toggleClass("show")
    //     //     .find(".dash-nav-dropdown")
    //     //     .removeClass("show");

    //     // $(this).parent()
    //     //     .siblings()
    //     //     .removeClass("show");
    // });

    $(".menu-toggle").click(function(){
        if (mobileBreakpoint.matches) {
            $(".dash-nav").toggleClass("mobile-show");
        } else {
            $(".dash").toggleClass("dash-compact");
        }
    });

    $(".searchbox-toggle").click(function(){
        $(".searchbox").toggleClass("show");
    });

    // Dev utilities
    // $("header.dash-toolbar .menu-toggle").click();
    // $(".searchbox-toggle").click();
});
