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
                                            <div class="border-avatar">
                                                <img src="public/images/avatar/<?php echo ($data['model']->readUser($keyId)->avatar == NULL) ? 'unknownUser.jpg' : $data['model']->readUser($keyId)->avatar; ?>" alt="">
                                            </div>
                                        </figure>
                                        <div class="newpst-input">
                                            <div class="post-bar">
                                                <span>What are you thinking ?</span>
                                            </div>
                                            <form action="Home/uploadFile" enctype="multipart/form-data" id="postFile"
                                                  class="dropzone" method="POST">
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
                                                        <div class="border-avatar">
                                                            <img src="public/images/avatar/<?php echo ($data['model']->readUser($value->id)->avatar == NULL) ? 'unknownUser.jpg' : $data['model']->readUser($value->id)->avatar; ?>" alt="">
                                                        </div>
                                                    </figure>
                                                    <div class="friend-name">
                                                        <ins><a href="profile/index.php?id=<?php echo $value->id; ?>" title=""><?php echo $value->username; ?></a></ins>
                                                        <span>published: <?php echo $value->create_at; ?></span>
                                                    </div>
                                                    <div class="post-meta">
                                                        <div class="<?php echo $value->media_content != NULL ? "aricle-post" : ""; ?>">
                                                            <?php
                                                                if ($value->media_content != NULL) {

                                                                     if ($type[0] == 'image') { ?>
                                                                        <img src="<?php echo $filePath; ?>" class="post-media-content">
                                                                    <?php } else if ($type[0] == 'video') { ?>
                                                                        <video style="text-align: center"
                                                                               class="post-media-content-video" controls>
                                                                            <source src="<?php echo $filePath; ?>"
                                                                                    type="<?php echo $typeMedia; ?>">
                                                                        </video>
                                                                    <?php }
                                                                 } ?>
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
                                                                        <input type="hidden" value="<?php echo $keyId;?>_<?php echo $value->id_post;?>_<?php echo $value->id; ?>_1">
															        </span>
                                                                </li>
                                                                <li>
                                                                <span class="dislike" data-toggle="tooltip" id="unLike_<?php echo $value->id_post; ?>" title="dislike">
																    <i class="<?php echo ($status == 0) ? "fa fa-heartbeat" : "ti-heart-broken"; ?>" id="uiconlike_<?php echo $value->id_post; ?>"></i>
																    <ins id="uappear_<?php echo $value->id_post; ?>"><?php echo $unLike->cou; ?></ins>
                                                                     <input type="hidden" value="<?php echo $keyId;?>_<?php echo $value->id_post;?>_<?php echo $value->id; ?>_-1">
															    </span>

                                                                </li>

                                                                <li class="social-media">
                                                                    <div class="menu">
                                                                        <div class="btn trigger"><i
                                                                                    class="fa fa-share-alt"></i></div>
                                                                    </div>
                                                                </li>
                                                                <li style="float: right">
                                                                  <ul>
                                                                      <li style="<?php echo ($value->id != $keyId) ? 'display: none;' : ''; ?>">
                                                                           <span class="deletePost" data-toggle="tooltip" title="delete" >
																            <i class="ti ti-trash post" style="cursor: pointer;" id="delete_<?php echo $value->id_post; ?>"></i>
															                </span>
                                                                      </li>
                                                                  </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="editPost" id="edit#$<?php echo $value->id_post; ?>#$<?php echo $value->content; ?>#$<?php echo $filePath ?>#$<?php echo $typeMedia; ?>" style="<?php echo ($value->id != $keyId) ? 'display: none;' : ''; ?>">
                                                            <button type="button" class=" click-models" data-toggle="modal" data-target="#exampleModal">
                                                                <i class="ti-pencil-alt"></i>
                                                            </button>
                                                            <!-- Modal -->
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
                                                        <?php
                                                            $listComment = $data['m_comment']->readComment($value->id_post,0,5);
                                                            foreach ($listComment as $index => $item){
                                                        ?>
                                                        <li id="last<?php echo $item->id; ?>">
                                                            <div class="comet-avatar">
                                                                <div class="border-avatar" style="width: 45px;height: 45px;">
                                                                    <img src="public/images/avatar/<?php echo ($data['model']->readUser($item->id_user)->avatar == NULL) ? 'unknownUser.jpg' : $data['model']->readUser($item->id_user)->avatar; ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="we-comment">
                                                                <div class="coment-head">
                                                                    <h5><a href="profile/index.php?id=<?php echo $item->id_user; ?>" title=""><?php echo $data['model']->readUser($item->id_user)->username; ?></a></h5>
                                                                    <span><?php echo $item->create_at; ?></span>
                                                                    <a class="we-reply reply-button" style="cursor: pointer" title="Reply">
                                                                        <i class="<?php echo ($keyId == $item->id_user) ? 'ti-trash delete' : '' ;?>" id="delete_<?php echo $item->id; ?>"></i>
                                                                    </a>
                                                                </div>
                                                                <p><?php echo $item->content; ?></p>
                                                            </div>
                                                        </li>
                                                        <?php
                                                            }
                                                        ?>
                                                        <li id="pre<?php echo $value->id_post; ?>">
                                                            <a style="cursor: pointer;" title="" class="showmore underline more" id="loadMore_<?php echo $value->id_post; ?>">more comments</a>
                                                            <input type="hidden" id="rowMore" value="0">
                                                            <input type="hidden" id="userDetail" value="<?php echo ($data['model']->readUser($keyId)->avatar == NULL) ? 'unknownUser.jpg' : $data['model']->readUser($keyId)->avatar; ?>/<?php echo $keyId; ?>/<?php echo $value->updated_at; ?>/<?php echo $data['model']->readUser($keyId)->username; ?>">
                                                        </li>
                                                        <li class="post-comment">
                                                            <div class="comet-avatar" style="height: 50px;width: 50px">
                                                                <img src="public/images/avatar/<?php echo ($arr->avatar == NULL) ? 'unknownUser.jpg' : $arr->avatar; ?>" alt="" style="max-width: 100%;max-height: 100%">
                                                            </div>
                                                            <div class="post-comt-box" id="<?php echo $value->id_post; ?>">
                                                                <form method="post" id="postComment">
                                                                    <textarea placeholder="Post your comment" id="postComment_<?php echo $keyId; ?>_<?php echo $value->id_post; ?>_<?php echo $value->id; ?>" class="postCmt"></textarea>
                                                                    <button type="submit"></button>
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
    <div class="pupop">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="Home/editPost" enctype="multipart/form-data" id="edit" method="POST">
                            <div class="form-group">
                                <label for="content">Write Something</label>
                                <textarea class="form-control" id="contentEdit" rows="3" name="contentEdit"></textarea>
                            </div>
                            <div class="form-group fallback">
                                <label for="editFile">Edit the file</label>
                                <input type="file" class="form-control-file" id="editFile" name="editFile">
                            </div>
                            <div class="previewFile" style="width: 466px;">
                                <embed style="max-width: 100%;max-height: 100%;border-radius: 10px;">
                            </div>
                            <input type="hidden" name="idPostEdit" id="idPostEdit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnUpdateSubmit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script type="text/javascript" src="public/js/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="public/js/uploadDrop.js"></script>