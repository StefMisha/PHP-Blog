<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Shareen - Personal Blog Template</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../fonts/elegant-font/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../styles/bootstrap.css" />
    <link rel="stylesheet" href="../../styles/main.css" />
</head>
<body>

<!-- Mobile Menu -->
<div class="mobile-nav-wrapper">
    <div class="mobile-menu-inner">
        <ul class="mobile-menu">
            <li class="has-sub"><a href="#">Home <i class="sub-icon fa fa-angle-down"></i></a>
                <ul class="sub-menu">
                    <li><a href="main/main.php">Вход</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">Sliders <i class="sub-icon fa fa-angle-down"></i></a>
                <ul class="sub-menu">
                    <li><a href="../slider-boxed.html">Вход</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<section class="above-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 align-self-center">

            </div>
            <div class="col-lg-4 align-self-center">
                <div class="logo">
                    <a href="main/main.php"><img src="../../images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 align-self-center">

            </div>
        </div>
    </div>
</section>

<!-- change class -->
    <div class="change-class"></div>

    <section class="container contact-me col-lg-5 col-md-5 col-sm-5 ">
        <div class="container align-self-center">
            <div class="row align-self-center">
                <div class="col-lg-12">
                    <div class="widget-sidebar contact-me">
                        <div class="widget-header">
                            <h4>Регистрация</h4>
                        </div>
                        <div class="widget-post">
                            <div class="contact-form">
                                <?php if(!empty($errors)): ?>
                                    <?php var_dump($errors); ?>
                                    <?php foreach ($errors as $error): ?>
                                        <div style="background-color: red; color: black ;padding: 5px;margin: 15px">
                                            <?= $error ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <form action="/users/register" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <label>
                                                    <input name="nickname" type="text" class="form-control" placeholder="Nickname...">
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <label>
                                                    <input name="first_name" type="text" class="form-control" placeholder="Имя...">
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <label>
                                                    <input name="email" type="email" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Your email..." required="">
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <label>
                                                    <input name="password_hash" type="password" class="form-control" placeholder="Password..." required="">
                                                </label>
                                            </fieldset>
                                        </div>

                                        <div class="col-lg-12">
                                            <fieldset>
                                                <input type="submit" class="input-group-btn" value="Зарегистрироваться">
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>