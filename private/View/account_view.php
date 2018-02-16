<?php include 'menu.php' ?>
<main id="account" class="account-private">
    <div class="container">
        <div class="row">
            <div class="account-image">

            </div>
            <ul class="account-nav-main col-xs-3">
                <li><img class="img-thumbnail" src="/users_data/users_photo/default.png"></li>
                <li class="account-nav"><i class="fa fa-user" style="padding-right: 5px"></i><p class="acc-list">Мой Аккаунт</p><p class="account-notification"><i class="fa fa-exclamation" aria-hidden="true"></i></p></li>
                <li class="account-nav"><i class="fa fa-comment-o" aria-hidden="true"></i><p class="acc-list">Мои Сообщения</p><p class="account-message-count">3</p></li>
                <li class="account-nav"><i class="fa fa-first-order" aria-hidden="true" style="padding-right: 2px"></i><p class="acc-list">Мои Заказы</p></li>
                <li class="account-nav"><i class="fa fa-heart-o" aria-hidden="true""></i><p class="acc-list">Мне понравилось</p></li>
                <li class="account-nav">5</li>
                <li class="account-nav">6</li>
            </ul>
            <div class="users-info col-xs-9">

            </div>
            <div class="user-messages col-xs-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ваш Аккаунт GLEB KOLESNIKOV</h3>
                    </div>
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ваш E-mail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ваш текущий E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Сменить Пароль</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Новое фото</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Загрузите новую фотографию Вашего профиля.</p>
                                </div>
                                <button type="submit" class="btn btn-default">Отправить</button>
                            </form>
                        </div>
                    </div>
                <div class="user-orders col-xs-9">Мои Заказы</div>
                <div class="user-likes col-xs-9">Мне понравилось</div>
            </div>
        </div>
    </div>
    <div id="otladka">

    </div>
</main><!-- /.authentication -->
<?php include 'footer_min.php'?>