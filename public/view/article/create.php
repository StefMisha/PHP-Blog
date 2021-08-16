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
                </div>
            </div>
        </div>
    </div>
</section>

<div class="instagram-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="instagram-account">
                    <div class="widget-content">
                        <div class="widget-header">
                            <h4><a href="#">@shareenBlog</a></h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="instagram-item">
                                    <img src="http://placehold.it/255x220" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="instagram-item">
                                    <img src="http://placehold.it/255x220" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="instagram-item">
                                    <img src="http://placehold.it/255x220" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="instagram-item">
                                    <img src="http://placehold.it/255x220" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/../components/footer.php'; ?>
