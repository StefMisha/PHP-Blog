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
                                    <div class="meta-category">
                                        <span>Fashion</span>
                                    </div>
                                    <img src="http://placehold.it/770x420" alt="">
                                </div>
                                <div class="down-content">

                                    <ul class="post-info">
                                        <h1>Редактирование статьи</h1>
                                        <?php if (!empty($errors)): ?>
                                            <?php foreach ($errors as $error): ?>
                                                <div style="color: red;"><?= $error ?></div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <form action="/articles/<?= $article->getId() ?>/store" method="post">
                                            <label for="name">Название статьи</label><br>
                                            <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $article->getName() ?>" size="50"><br>
                                            <br>
                                            <label for="text">Текст статьи</label><br>
                                            <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? $article->getText() ?></textarea><br>
                                            <br>
                                            <input type="submit" value="Обновить">
                                        </form>

                                        <li><a href="#">3 Comments</a></li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-lg-7 col-md-6">
                                            <div class="tags">
                                                <ul class="tags">
                                                    <li><i class="fa fa-tag"></i></li>
                                                    <li><a href="#">Beauty</a>,</li>
                                                    <li><a href="#">Fashion</a>,</li>
                                                    <li><a href="#">Lifestyle</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6">
                                            <ul class="share-post">
                                                <li><i class="fa fa-share-alt"></i></li>
                                                <li><a href="#">Facebook</a>,</li>
                                                <li><a href="#">Twitter</a>,</li>
                                                <li><a href="#">Pinterest</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="about-author">
                                <div class="author-image">
                                    <img src="http://placehold.it/140x140" alt="">
                                </div>
                                <div class="right-content">
                                    <h6>Shareen Robertson</h6>
                                    <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut shoreditch freegan kistrater selfies.</p>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="post-nav">
                                <li><a href="#">Prev Post</a></li>
                                <li><a href="#">Next Post</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <div class="widget-post comments">
                                <div class="widget-header">
                                    <h4>3 Comments</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="comments">
                                        <li>
                                            <div class="comment-author-image">
                                                <img src="http://placehold.it/90x90" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h6>Robert Imeri <span>January 10, 2020</span></h6>
                                                <a href="#" class="reply-button">Reply</a>
                                                <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="comment-author-image">
                                                <img src="http://placehold.it/90x90" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h6>Kate Luise <span>January 11, 2020</span></h6>
                                                <a href="#" class="reply-button">Reply</a>
                                                <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-author-image">
                                                <img src="http://placehold.it/90x90" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h6>Antonio Matters <span>January 09, 2020</span></h6>
                                                <a href="#" class="reply-button">Reply</a>
                                                <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php //include_once __DIR__ . '/../components/footer.php'; ?>