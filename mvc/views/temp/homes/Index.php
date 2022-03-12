<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <?php include "mvc/views/temp/TopBar.php"; ?>


    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <div class="col-lg-3">
                                <aside class="sidebar static">
                                    <?php include "mvc/views/temp/Shortcuts.php"; ?>
                                    <!-- Shortcuts -->

                                    <!-- recent activites -->

                                    <!-- who's following -->
                                </aside>
                            </div>
                            <div class="col-lg-6">
                                <div class="central-meta bdradius">
                                    <div class="new-postbox">

                                        <figure>
                                            <img src="public/images/resources/admin2.jpg" alt="">
                                        </figure>
                                        <div class="newpst-input">
                                            <div class="post-bar">
                                                <span>What are you thinking ?</span>
                                            </div>
                                            <form action="Home/uploadFile" enctype="multipart/form-data" id="postFile"
                                                  class="dropzone">
                                                <textarea rows="2" name="content" id="content"
                                                          placeholder="write something"></textarea>
                                                <div class="attachments">
                                                    <ul>
                                                        <li>
                                                            <a><i class="fa fa-image" style="cursor: pointer;"
                                                                  id="clickPost"></i></a>
                                                        </li>
                                                        <li>
                                                            <input type="submit" id="upload" name="submit">
                                                        </li>
                                                        <li>
                                                            <button type="button" id="close" name="close">Close</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- add post new box -->
                                <div class="loadMore">
                                    <?php
                                    foreach ($data['postNew'] as $key => $value) {
                                        $filePath = 'public/images/post/' . $value->media_content;
                                        $typeMedia = mime_content_type($filePath);
                                        $type = explode('/', $typeMedia);

                                        $like = $data['model']->countLike($value->id_post);
                                        $unLike = $data['model']->countUnLike($value->id_post);
                                        $comments = $data['model']->countComment($value->id_post);
                                        $checkLike = $data['model']->checkExistUserLike($value->id_post,$keyId);

                                        $status = -1;
                                        if ($checkLike->cou != 0){
                                            $status = $checkLike->type;
                                        }
                                    ?>
                                        <div class="central-meta item bdradius">
                                            <div class="user-post">
                                                <div class="friend-info">
                                                    <figure>
                                                        <img src="public/images/resources/friend-avatar10.jpg" alt="">
                                                    </figure>
                                                    <div class="friend-name">
                                                        <ins><a href="profile/index/<?php echo $value->id; ?>" title=""><?php echo $value->username; ?></a></ins>
                                                        <span>published: <?php echo $value->create_at; ?></span>
                                                    </div>
                                                    <div class="post-meta">
                                                        <!--                                                            <img src="public/images/resources/user-post.jpg" alt="">-->
                                                        <div class="aricle-post">
                                                            <?php if ($type[0] == 'image') { ?>
                                                                <img src="<?php echo $filePath; ?>"
                                                                     class="post-media-content">
                                                            <?php } else if ($type[0] == 'video') { ?>
                                                                <video style="text-align: center"
                                                                       class="post-media-content-video" controls>
                                                                    <source src="<?php echo $filePath; ?>"
                                                                            type="<?php echo $typeMedia; ?>">
                                                                </video>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="we-video-info">
                                                            <ul>
                                                                <li>
                                                                <span class="comment" data-toggle="tooltip"
                                                                      title="Comments">
																    <i class="fa fa-comments-o"></i>
																    <ins><?php echo $comments->cou; ?></ins>
															    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="like" data-toggle="tooltip" title="like" id="like_<?php echo $value->id_post; ?>">
																        <i class="<?php echo ($status == 1) ?  "fa fa-heart" : "ti-heart"; ?>" id="iconlike_<?php echo $value->id_post; ?>"></i>
																        <ins id="appear_<?php echo $value->id_post; ?>"><?php echo $like->cou; ?></ins>
															        </span>
                                                                </li>
                                                                <li>
                                                                <span class="dislike" data-toggle="tooltip" id="unLike_<?php echo $value->id_post; ?>"
                                                                      title="dislike">
																    <i class="<?php echo ($status == 0) ? "fa fa-heartbeat" : "ti-heart-broken"; ?>" id="uiconlike_<?php echo $value->id_post; ?>"></i>
																    <ins id="uappear_<?php echo $value->id_post; ?>"><?php echo $unLike->cou; ?></ins>
															</span>
                                                                </li>
                                                                <li class="social-media">
                                                                    <div class="menu">
                                                                        <div class="btn trigger"><i
                                                                                    class="fa fa-share-alt"></i></div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-html5"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-facebook"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-google-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-twitter"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-css3"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-instagram"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-dribbble"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rotater">
                                                                            <div class="btn btn-icon"><a href="#"
                                                                                                         title=""><i
                                                                                            class="fa fa-pinterest"></i></a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="description">

                                                            <p>
                                                                <?php echo $value->content; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coment-area">
                                                    <ul class="we-comet">
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="public/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <div class="coment-head">
                                                                    <h5><a href="time-line.html" title="">Jason
                                                                            borne</a>
                                                                    </h5>
                                                                    <span>1 year ago</span>
                                                                    <a class="we-reply" href="#" title="Reply"><i
                                                                                class="fa fa-reply"></i></a>
                                                                </div>
                                                                <p>we are working for the dance and sing songs. this car
                                                                    is
                                                                    very awesome for the youngster. please vote this car
                                                                    and
                                                                    like our post</p>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="comet-avatar">
                                                                        <img src="public/images/resources/comet-2.jpg"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="we-comment">
                                                                        <div class="coment-head">
                                                                            <h5><a href="time-line.html" title="">alexendra
                                                                                    dadrio</a></h5>
                                                                            <span>1 month ago</span>
                                                                            <a class="we-reply" href="#"
                                                                               title="Reply"><i
                                                                                        class="fa fa-reply"></i></a>
                                                                        </div>
                                                                        <p>yes, really very awesome car i see the
                                                                            features
                                                                            of this car in the official website of <a
                                                                                    href="#" title="">#Mercedes-Benz</a>
                                                                            and
                                                                            really impressed :-)</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="comet-avatar">
                                                                        <img src="public/images/resources/comet-3.jpg"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="we-comment">
                                                                        <div class="coment-head">
                                                                            <h5><a href="time-line.html"
                                                                                   title="">Olivia</a>
                                                                            </h5>
                                                                            <span>16 days ago</span>
                                                                            <a class="we-reply" href="#"
                                                                               title="Reply"><i
                                                                                        class="fa fa-reply"></i></a>
                                                                        </div>
                                                                        <p>i like lexus cars, lexus cars are most
                                                                            beautiful
                                                                            with the awesome features, but this car is
                                                                            really outstanding than lexus</p>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="public/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <div class="coment-head">
                                                                    <h5><a href="time-line.html" title="">Donald
                                                                            Trump</a>
                                                                    </h5>
                                                                    <span>1 week ago</span>
                                                                    <a class="we-reply" href="#" title="Reply"><i
                                                                                class="fa fa-reply"></i></a>
                                                                </div>
                                                                <p>we are working for the dance and sing songs. this
                                                                    video
                                                                    is very awesome for the youngster. please vote this
                                                                    video and like our channel
                                                                    <i class="em em-smiley"></i>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="" class="showmore underline">more
                                                                comments</a>
                                                        </li>
                                                        <li class="post-comment">
                                                            <div class="comet-avatar">
                                                                <img src="public/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="post-comt-box">
                                                                <form method="post">
                                                                    <textarea
                                                                            placeholder="Post your comment"></textarea>
                                                                    <div class="add-smiles">
                                                                    <span class="em em-expressionless"
                                                                          title="add icon"></span>
                                                                    </div>
                                                                    <div class="smiles-bunch">
                                                                        <i class="em em---1"></i>
                                                                        <i class="em em-smiley"></i>
                                                                        <i class="em em-anguished"></i>
                                                                        <i class="em em-laughing"></i>
                                                                        <i class="em em-angry"></i>
                                                                        <i class="em em-astonished"></i>
                                                                        <i class="em em-blush"></i>
                                                                        <i class="em em-disappointed"></i>
                                                                        <i class="em em-worried"></i>
                                                                        <i class="em em-kissing_heart"></i>
                                                                        <i class="em em-rage"></i>
                                                                        <i class="em em-stuck_out_tongue"></i>
                                                                    </div>
                                                                    <button type="submit" id="postComment"></button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- centerl meta -->

                            <div class="col-lg-3">
                                <aside class="sidebar static">
                                    <?php include "mvc/views/temp/RecentlyActivity.php"; ?>
                                    <?php include "mvc/views/temp/FriendSuggest.php"; ?>
                                    <?php include "mvc/views/temp/FriendList.php"; ?>
                                    <!-- friends list sidebar -->
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
