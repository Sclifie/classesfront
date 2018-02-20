jQuery(document).ready(function () {
    'use strict';
    jQuery('#register_form').validate(
        {
            rules: {
                email_reg : {
                    email     : true,
                    required  : true,
                    minlength : 7,
                    maxlength : 40
                },
                login_reg :{
                    required  : true,
                    minlength : 5,
                    maxlength : 20
                },
                login_pw : {
                    required  : true,
                    maxlength : 20,
                    minlength : 5
                },
                reg_pw_conf : {
                    required  : true,
                    equalTo   : '#reg_user_pw'
                }
            },
            messages : {
                email_reg: {
                    email: "Введите корректный Email",
                    required: "Поле обязательно для ввода",
                    mixlength: "Минимальная длинна 7 символов",
                    maxlength: "Максимальная длинна 28 символов"
                },
                login_reg: {
                    required  : "Поле обязательно для ввода",
                    minlength : "Минимальная длинна 6 символов",
                    maxlength : "Максимальная длинна 15 символов",
                },
                login_pw: {
                    required : "Поле обязательно для ввода",
                    minlength : "Минимальная длинна 6 символов",
                    maxlength : "Максимальная длинна 14 символов",
                },
                reg_pw_conf : {
                    required : "Поле обязательно для ввода",
                    equalTo: "Пароли не совпадают"
                }
            },
            focusCleanup: true,
            invalidHandler : function (event, validator) {
                jQuery('#register_form_st').text('Проверьте все поля на корректность');
                jQuery('#register_form_st').addClass('statuserr');
            },
            onkeyup: function (element) {
                jQuery('#register_form_st').text('Ввод данных');
                jQuery('#register_form_st').removeClass('statuserr');
            },
            submitHandler : submitToServer
        },
    );


function submitToServer() {

        let regForm = jQuery('#register_form input');
        let userRegisterEmail       = regForm[0].value;
        let userRegisterLogin       = regForm[1].value;
        let userRegisterPassword    = regForm[2].value;
        let userRegisterStatus      = jQuery('#register_form_st');
        let otladka = document.getElementById('otladka');

        let regUsersData = {

            userEmail   :   userRegisterEmail,
            userLogin   :   userRegisterLogin,
            userPassword:   userRegisterPassword
        };

        regUsersData = 'reg_users_data=' + JSON.stringify(regUsersData);

        jQuery.ajax({

            url: '/auth-new',
            type: 'post',
            data: regUsersData,
            success: function (response) {
                // otladka.innerHTML = response;
                    switch (response){
                        case 'ok_add'        :
                            userRegisterStatus.addClass('auth-status');
                            userRegisterStatus.text('Регистрация успешно завершена. Авторизуйтесь');
                            break;
                        case 'user_duplicate_email' :
                            userRegisterStatus.addClass('statuserr');
                            userRegisterStatus.text('Email уже зарегистрирован');
                            break;
                        case 'user_duplicate_login':
                            userRegisterStatus.addClass('statuserr');
                            userRegisterStatus.text('Логин уже используется');
                            break;
                        case 'same_phone':
                            userRegisterStatus.addClass('statuserr');
                            userRegisterStatus.text('Телефон уже зарегистрирован');
                            break;
                        case 'error':
                            userRegisterStatus.addClass('statuserr');
                            userRegisterStatus.text('Не известная ошибка, попробуйте позже');
                    }
            },
            error:function (error) {

            }
            }
        )
    }
});