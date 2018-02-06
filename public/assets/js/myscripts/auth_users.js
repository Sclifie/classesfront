jQuery(document).ready(function () {
    console.log('hello');
    'use strict';
    let self = this;
    let tryCount = 0;
    localStorage.setItem('trying', tryCount);
jQuery('#auth_form').validate(
    {
        rules: {
            auth_email : {
                email     : true,
                required  : true,
                minlength : 7,
                maxlength : 40
            },
            auth_pwd : {
                required  : true,
                maxlength : 20,
                minlength : 6
            },
            // auth_pwd_conf : {
            //     required  : true,
            //     equalTo   : '#auth_user_pw'
            // }
        },
        messages : {
            auth_email: {
                email: "Введите корректный Email",
                required: "Поле обязательно для ввода",
                mixlength: "Минимальная длинна 7 символов",
                maxlength: "Максимальная длинна 28 символов"
            },
            auth_pwd: {
                required : "Поле обязательно для ввода",
                minlength : "Минимальная длинна 6 символов",
                maxlength : "Максимальная длинна 14 символов",
            },
        },

        invalidHandler : function (event, validator) {
            localStorage.setItem('trying', tryCount++);
            console.log(localStorage.getItem('trying'));
            jQuery('#auth_status').text('Проверьте все поля на корректность');
            jQuery('#auth_status').addClass('statuserr');
        },
        onkeyup: function (element) {
            jQuery('#auth_status').text('Ввод данных');
            jQuery('#auth_status').removeClass('statuserr');
        },
        submitHandler : function(){
            console.log(localStorage.getItem('tryCount'));
            let i = localStorage.getItem('tryCount');
            if(i > 15){jQuery('#auth_status').text('Число попыток исчерпано')} else {sendToServer()} //чёт тут не получается(хотя и так работает=()
        }
    },
);

function sendToServer() {

            let userAuthEmail = jQuery('#auth_user_email');
            let userAuthPassword = jQuery('#auth_user_pw');
            let authStatus = jQuery('#auth_status')

            let userAuthData = {
                userEmail: userAuthEmail.val(),
                userPassword: userAuthPassword.val()
            };

            console.log('hello AJAX');
    let otladka = document.getElementById('otladka');
            userAuthData = 'reg_users_data=' + JSON.stringify(userAuthData);
            console.log('JSON reg_user_data \n',userAuthData);
            jQuery.ajax({
                url: '/auth',
                type: 'post',
                data: userAuthData,
                success: function (response) {
                    otladka.innerHTML = response;
                    switch (response) {
                        case 'ok'    :
                            window.location = 'cabinet_view.php';
                            authStatus.text('Добро пожаловать');
                            break;
                        case 'wrong_pw' :
                            authStatus.text('Не верный пароль');
                            console.log(response);
                            break;
                        case 'no_usr':
                            authStatus.text('Пользователь не найден');
                            break;
                    }
                },
                error: function (error) {
                    console.log('All about ERRORS', error);
                }
            })}});




