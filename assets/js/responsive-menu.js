// $('.mobile-menu-toggle').click(function(e){
//   console.log($(this));
//     $(this).toggleClass('expanded-menu-toggle');
//     $(this).parent().find('.menu').toggleClass('expanded-mobile-menu');
//     $(this).parent().toggleClass('nav-expanded');
//     // if($(this).parent().find('.menu').hasClass('expanded-mobile-menu')){
//     //   $(this).removeClass('expanded-menu-toggle').parent().removeClass('nav-expanded');
//     // }else{
//     //   $(this).addClass('expanded-menu-toggle').parent().addClass('nav-expanded').find('.menu').addClass('expanded-mobile-menu');
//     // }
// });

const $menu = $('#mobile-nav');

$(document).mouseup(e => {
   if (!$menu.is(e.target) // if the target of the click isn't the container...
   && $menu.has(e.target).length === 0) // ... nor a descendant of the container
   {
     $menu.removeClass('expanded-mobile-menu');
  }
 });

$('#hamburger').on('click', () => {
  $menu.toggleClass('expanded-mobile-menu');
});
