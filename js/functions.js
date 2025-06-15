AOS.init({
    duration: 1000
});

$(".lang-select select").simpleselect({
    fadingDuration: 50,
    containerMargin: 10,
    displayContainerInside: "document"
});

$(window).load(function(){
    $('.partners-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('.brand-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav: true,
        dots: false,
        autoWidth:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

});
$(document).ready(function(){
	
	$(document).on('click','.tab-link',function(){
		var tab_id = $(this).attr('data-tab');

		$('.tab-link').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});
    
    $('nav').meanmenu({
        meanScreenWidth: "767",
        meanMenuContainer: '.mobile-menu'
    });


});