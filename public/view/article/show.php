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

                                    <h4><?= $article->getName() ?></h4>
                                    <ul class="post-info">
                                        <li><a href="#"><?= $article->getAuthor()->getNickName() ?></a></li>
                                        <li><a href="#"><?= $article->getCreatedAt() ?></a></li>
                                        <li><a href="#">3 Comments</a></li>
                                    </ul>
                                    <p class="first-paragraph"><?= $article->getText() ?></p>
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
                        <div class="col-lg-12">
                            <div class="widget-post leave-comment">
                                <div class="widget-header">
                                    <h4>Leave a comment</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="contact-form">
                                        <form id="contact" action="#" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your email..." required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your comment..." required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="filled-button">Post Comment</button>
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

