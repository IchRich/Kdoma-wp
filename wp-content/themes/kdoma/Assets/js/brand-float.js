// jQuery(document).ready(function($){
//     var $banner = $('#brandStack');
//     var $parent = $('.Design_Info'); // родитель для фиксации

//     if (!$banner.length || !$parent.length) return;

//     $parent.css('position', 'relative'); // обязательно для absolute

//     var fixedTop = 10; // отступ сверху
//     var bannerHeight, parentTop, parentHeight, parentBottom;

//     function updateBanner() {
//         bannerHeight = $banner.outerHeight();
//         parentTop = $parent.offset().top;
//         parentHeight = $parent.outerHeight();
//         parentBottom = parentTop + parentHeight;

//         var scrollTop = $(window).scrollTop();

//         if(scrollTop + fixedTop < parentTop) {
//             // выше родителя
//             $banner.css({position: 'absolute', top: 0, right: 0, width: $banner.width()});
//         } else if(scrollTop + fixedTop + bannerHeight > parentBottom) {
//             // достигли низа родителя
//             $banner.css({position: 'absolute', top: parentHeight - bannerHeight + 'px', right: 0, width: $banner.width()});
//         } else {
//             // фиксируем баннер
//             $banner.css({position: 'fixed', top: fixedTop + 'px', right: 0, width: $banner.width()});
//         }
//     }

//     $(window).on('scroll resize', updateBanner);
//     updateBanner(); // первый запуск
// });
