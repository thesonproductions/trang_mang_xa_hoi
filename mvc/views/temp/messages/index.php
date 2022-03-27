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
                            </aside>
                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-9">
                            <div class="central-meta bdradius">
                                <div class="messages">
                                    <h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
                                    <div class="message-box">

                                        <ul id="people-list" class="peoples friendz-list">
                                            <div id="searchDir"></div>
                                           <?php
                                           $readList = $data['mess']->readChat($keyId);
                                           foreach ($readList as $key => $value){

                                           ?>
                                            <li id="chatUser_<?php echo $value->id_user; ?>" class="choseChat">
                                               <figure style="height: 50px;width: 50px;">
                                                   <img src="public/images/avatar/<?php echo ($value->avatar == NULL) ? 'unknownUser.jpg' : $value->avatar; ?>" alt="" style="object-fit: cover;width: 100%;height: 100%">
                                               </figure>
                                               <div class="people-name friendz-meta">
                                                   <span><?php echo $value->username; ?></span>
                                               </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="peoples-mesg-box">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- centerl meta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>