$('.mobile-menu-toggle').click(function(e){
    if($(this).parent().find('.menu').hasClass('expanded-mobile-menu')){
      $(this).removeClass('expanded-menu-toggle').parent().removeClass('nav-expanded').find('.menu').removeClass('expanded-mobile-menu');
    }else{
      $(this).addClass('expanded-menu-toggle').parent().addClass('nav-expanded').find('.menu').addClass('expanded-mobile-menu');
    }
});
