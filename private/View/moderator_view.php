<?php include 'menu.php' ?>
<main id="account" class="account-private">
    <div class="container">
        <div class="row">

            <ul class="account-nav-main col-xs-3">
                <img class="img-thumbnail" style="display: inline-block" src="/users_data/users_photo/default.png">
                <li class="account-nav" id="main"><i class="fa fa-user" style="padding-right: 5px"></i><p class="acc-list">Мой Аккаунт</p><p class="account-notification"><i class="fa fa-exclamation" aria-hidden="true"></i></p></li>
                <li class="account-nav" id="tickets"><i class="fa fa-comment-o" aria-hidden="true"></i><p class="acc-list">Обращения</p><p class="account-message-count"><? echo $messages_count=3 ?></p></li>
                <li class="account-nav" id="orders"><i class="fa fa-sort" style="padding-right: 4px; padding-left: 3px" aria-hidden="true"></i><p class="acc-list">Заказы в ожидании</p></li>
                <li class="account-nav" id="users"><i class="fa fa-users" aria-hidden="true"></i></i><p class="acc-list">Пользователи</p></li>
                <li class="account-nav" id="news"><i class="fa fa-newspaper-o" aria-hidden="true"></i><p class="acc-list">Новости</p></li>
                <li class="account-nav" id="products"><i class="fa fa-product-hunt" aria-hidden="true"></i><p class="acc-list">Товары</p></li>
            </ul>

            <div class="user-messages col-xs-9" id="account-info">
                <div class="panel panel-default col account-main-info">
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
                                    <div id="dropZone">Или перетащите в это окошко</div>
                                </div>
                                <button type="submit" class="btn btn-default">Отправить</button>
                            </form>
                        </div>
                    </div>
                <div class="panel user-orders col-xs-9 account-users-info" id="news_div">Новости
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Текст</th>
                            <th scope="col">Превьюшка</th>
                            <th scope="col"><a href="#">Редактировать</a></th>
                        </tr>
                        </thead>
                        <tbody id="news_list">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <th scope="col">Handle</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel user-orders col-xs-9 account-users-info" id="users_div">Пользователи
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <th scope="col">Handle</th>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <th scope="col">Handle</th>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <th scope="col">Handle</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel user-likes col-xs-9">Мне понравилось</div>
            </div>
        </div>
    </div>
    <div id="otladka">

    </div>
</main><!-- /.authentication -->
<?php include 'footer_min.php'?>