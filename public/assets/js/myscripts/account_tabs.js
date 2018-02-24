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
                    console.log(obj.data);
                    let i = 0;
                    for(let key in obj.data){
                        console.log(obj.data[i].post_id);
                        let dataPlace = document.getElementById('news_list');
                        let row = document.createElement('tr');

                        let cell_id = document.createElement('th');
                        cell_id.setAttribute('scope','row');
                        cell_id.innerHTML = obj.data[i].post_id;
                        row.appendChild(cell_id);

                        let cell_cat = document.createElement('td');
                        cell_cat.innerHTML = obj.data[i].cat_parent_name;
                        row.appendChild(cell_cat);

                        let cell_text = document.createElement('td');
                        cell_text.innerHTML = obj.data[i].post_text;
                        row.appendChild(cell_text);

                        let cell_img = document.createElement('td');
                        let img_in_cell = document.createElement('img');
                        img_in_cell.setAttribute('src',obj.data[i].post_img_min);
                        cell_img.appendChild(img_in_cell);
                        row.appendChild(cell_img);

                        row.setAttribute('id','news_list'+i);
                        dataPlace.appendChild(row);
                        i++;
                    }

                },
                error:function (error) {
                    console.log('error');
                }
            }
        )
    }

});