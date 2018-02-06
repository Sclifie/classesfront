<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="blog">Блог</a></li>
                <li><a href="faq">ЧАВО</a></li>
                <li><a href="contact">Контакты</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#pages">Pages</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index-2.html">Home Alt</a></li>
                        <li><a href="category-grid.html">Category - Grid/List</a></li>
                        <li><a href="category-grid-2.html">Category 2 - Grid/List</a></li>
                        <li><a href="single-product.html">Single Product</a></li>
                        <li><a href="single-product-sidebar.html">Single Product with Sidebar</a></li>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                        <li><a href="blog-post.html">Blog Post</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="authentication.html">Login/Register</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-6 no-margin">
            <ul class="right">
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-language">Русский</a>
                    <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Italiano</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">French</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Russian</a></li>
                    </ul>
                </li>
                <!-- TODO: ЧЕК СЕССИИ -->
                <?php if (($auth_status_data === true)) : ?>
                <li><a href="auth">Ваш Аккаунт <?php echo $login_name_data ?></a></li>
                <? else : ?>
                <li><a href="auth">Регистрация</a></li>
                <li><a href="auth">Логин</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
