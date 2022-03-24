<div class="theme-layout">
    <?php include "mvc/views/temp/TopBar.php"; ?>
    <?php include "mvc/views/temp/Profiles.php"; ?>
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-4">
                            <aside class="sidebar static">

                                <!-- Shortcuts -->
                                <?php include "mvc/views/temp/ProfilesIntro.php"; ?>
                                <!-- profile intro widget -->
                                <?php include "mvc/views/temp/FriendSuggest.php"; ?>
                            </aside>
                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-8">
                            <div class="central-meta bdradius">
                                <div class="frnds">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Following</a> <span><?php echo count($data['arrFollower']);?></span></li>
                                        <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Who's Following</a><span><?php echo count($data['allFollower']); ?></span></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active fade show " id="frends">
                                            <ul class="nearby-contct">
                                                <?php
                                                    foreach ($data['arrFollower'] as $key => $value) {
                                                        $detailUser = $data['model']->readUser($value->id_follower);
                                                ?>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure style="height: 60px;width: 60px;">
                                                            <a href="Profile/index.php?id=<?php echo $detailUser->id_user; ?>" title=""><img src="public/images/avatar/<?php echo ($detailUser->avatar == NULL) ? 'unknownUser.jpg' : $detailUser->avatar; ?>" alt="" style="max-width: 100%;max-height: 100%;"></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="Profile/index.php?id=<?php echo $detailUser->id_user; ?>" title=""><?php echo $detailUser->username; ?></a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" class="add-butn addFollow" id="follow_<?php echo $value->id_follower; ?>_<?php echo $keyId; ?>" title="" data-ripple="" style="<?php echo (($keyId == $value->id_follower) ? "display: none" : ""); ?>"><?php echo count($data["user"]->checkExistUser($keyId,$value->id_follower)) == 1 ? 'UnFollow' : 'Follow'; ?></a>
                                                            <input type="hidden" value="<?php echo count($top->checkExistUser($keyId,$value->id_follower)) == 1 ? 1 : 0; ?>" id="suggest_<?php echo $value->id_follower; ?>">
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                        </div>

                                        <div class="tab-pane fade" id="frends-req">
                                            <ul class="nearby-contct">
                                                <?php
                                                foreach ($data['allFollower'] as $key => $value) {
                                                    $detailUser = $data['model']->readUser($value->id_follower);
                                                    ?>
                                                    <li>
                                                        <div class="nearly-pepls">
                                                            <figure style="height: 60px;width: 60px;">
                                                                <a href="Profile/index.php?id=<?php echo $detailUser->id_user; ?>" title=""><img src="public/images/avatar/<?php echo ($detailUser->avatar == NULL) ? 'unknownUser.jpg' : $detailUser->avatar; ?>" alt="" style="max-width: 100%;max-height: 100%;"></a>
                                                            </figure>
                                                            <div class="pepl-info">
                                                                <h4><a href="Profile/index.php?id=<?php echo $detailUser->id_user; ?>" title=""><?php echo $detailUser->username; ?></a></h4>
                                                                <span>ftv model</span>
                                                                <a href="#" class="add-butn addFollow" id="follows_<?php echo $value->id_follower; ?>_<?php echo $keyId; ?>" title="" data-ripple="" style="<?php echo (($keyId == $value->id_follower) ? "display: none" : ""); ?>"><?php echo count($data["user"]->checkExistUser($keyId,$value->id_follower)) == 1 ? 'UnFollow' : 'Follow'; ?></a>
                                                                <input type="hidden" value="<?php echo count($top->checkExistUser($keyId,$value->id_follower)) == 1 ? 1 : 0; ?>" id="suggests_<?php echo $value->id_follower; ?>">
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <button class="btn-view btn-load-more"></button>
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
