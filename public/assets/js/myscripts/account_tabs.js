jQuery(document).ready(function () {
    'use strict';
    jQuery('ul .account-nav').click(function () {
        let id = jQuery(this).attr('id');
        let div = '_div';
        let divId = id+div;
        jQuery('#account-info').find('.panel').fadeOut(0,'ease');
        jQuery('#'+divId).fadeIn(600,'swing',function () {
            getData(id);
        });
    });

    function getData(id) { //TODO:localstorage? для загруженного
        let url = '/moderator-account/get/'+id;
        let data = {
            countElem : 25, //TODO: какие 25...
            type: 'all' //TODO:Фильтры
        };
            data = 'getData=' + JSON.stringify(data); //TODO:Привязать эту дату к пагинации

        let otladka = document.getElementById('otladka');

        jQuery.ajax(
            {
                url: url,
                type: 'post',
                data: data,
                success: function (response) {

                    let obj = JSON.parse(response);
                    console.log(obj);
                    let i = 0;
                    for(let key in obj['data']){
                        jQuery.each(obj['data'],function (key,value) {
                            console.log(key+' '+value);
                            i++;
                        })
                    }

                },
                error:function (error) {
                    console.log('error');
                }
            }
        )
    }

});