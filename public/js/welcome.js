$(document).ready(function () {



    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });
    
    

    $('.navbar-collapse a:not(.dropdown-toggle)').click(function(){
    $(".navbar-collapse").collapse('hide');
});

    var divs = document.getElementsByClassName('left');
    var count = divs.length;
    $(window).scroll(function () {
        var scrolled = $(window).scrollTop();
        if (scrolled>=1400) {
            i = 0;
            setTimeout(function () {
                $(divs[i]).animate({left:'0px'},"slow");
    
                i++;
            }, 300)
      }
    });
    
//     $("a[href^='#']").on("click",function(e){
//         $("html, body").animate({
//     scrollTop: $($(this).attr("href")).offset().top
//      }, 1000);

    
    
//     if($(window.location.hash).length > 1){
//         console.log(window.location.hash);
//         $('html, body').animate({ scrollTop: $(window.location.hash).offset().top}, 1000);
// }
// });

});
