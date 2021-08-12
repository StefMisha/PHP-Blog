<?php include_once __DIR__ . '/../components/header.php'; ?>

<?php include_once __DIR__ . '/../components/header.php'; ?>


<!-- change class -->
<div class="change-class"></div>

<div id="search">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="Search..." />
        <button type="submit" class="primary-button"><i class="icon_search"></i></button>
    </form>
</div>

<section class="medium-gap single-post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-post">
                                <div class="post-image">
                                </div>
                                <div class="down-content col-lg-6 col-md-12 col-sm-12">

                                    <h1>Создание новой статьи</h1>
                                    <?php if(!empty($errors)): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <div style="color: red;"><?= $error ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <form action="/articles/add" method="post">
                                        <label for="name">Название статьи</label><br>
                                        <input type="text" name="name" class="form-control" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
                                        <br>
                                        <label for="text">Текст статьи</label><br>
                                        <textarea name="text" class="form-control" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
                                        <br>
                                        <input type="submit" value="Создать">
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="widget-post leave-comment">
                                <div class="widget-header">
                                </div>
                                <div class="widget-content">
                                    <div class="contact-form">
                                        <form id="contact" action="#" method="post">
                                            <div class="row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

