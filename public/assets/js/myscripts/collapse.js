(function (jQuery) {
    'use strict';
    jQuery(document).ready(function () {
        jQuery('.fa-arrow-left').click(function () {

            let img = document.getElementsByClassName('img-thumbnail');

            // function min(min) {
            //     let current = jQuery('.img-thumbnail').width();
            //     let now = current - min;
            //     if(current == 35){
            //         return false;
            //     }
            //     jQuery('.img-thumbnail').width(now);
            //
            // }
            // setInterval(min(20),125);

            // jQuery(".img-thumbnail").slideToggle(800,'easeing',function () {
            //     console.log('ok');
            // })

            // let i = Math.random()*10;
            let nav = document.getElementById('nav_main');
            let main = document.getElementById('account-info');
            let currentWidth = window.innerWidth;
            nav.classList.remove('col-xs-3');
            nav.classList.remove('account-nav');
            nav.classList.add('none');
            jQuery('#account-info').animate({
                width : '100%'
            },1200,'swing');

            jQuery('.img-thumbnail').animate({
                width: 0
            },700,'swing');
            function classAdd() {
                console.log('added');
            }
            // let timerId = setTimeout(function e() {
            //     console.log(jQuery('.img-thumbnail').width());
            //     console.log(document.getElementsByClassName('img-thumbnail'));
            //     let current = document.getElementsByClassName('img-thumbnail')[0].width;
            //     if(current <= 50){
            //         clearTimeout(timerId);
            //     }
            //     document.getElementsByClassName('img-thumbnail')[0].width = current - 20;
            //         timerId = setTimeout(e,100);
            //
            //     },250);
        })
    })
})(jQuery);