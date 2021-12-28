<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <?php foreach ($arrayDetail as $key => $value){ ?>
            <div class="col-md-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body profile-page p-0">
                        <div class="profile-header-image">
                            <div class="cover-container">
                                <img src="galleys/picture-avatar/<?php echo $value->cover_avatar;?>" alt="profile-bg" class="rounded w-100" style="height: 177.9px!important;">
                            </div>
                            <div class="profile-info p-4">
                                <div class="user-detail">
                                    <div class="d-flex flex-wrap justify-content-between align-items-start">
                                        <div class="profile-detail d-flex">
                                            <div class="profile-img pe-4" >
                                                <img src="galleys/picture-avatar/<?php echo $value->avatar;?>" alt="profile-img" class="avatar-130" style="height: 130px!important;"/>
                                            </div>
                                            <div class="user-data-block">
                                                <h4>
                                                    <a href="friend-profile.html"><?php echo $value->nick_name;?></a>
                                                </h4>
                                                <h6><?php echo $value->study;?></h6>
                                                <p><?php echo $value->introduce;?></p>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger">unfriend</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
<!--            <div class="col-md-6">-->
<!--                <div class="card card-block card-stretch card-height">-->
<!--                    <div class="card-body profile-page p-0">-->
<!--                        <div class="profile-header-image">-->
<!--                            <div class="cover-container">-->
<!--                                <img src="galleys/public/assets/images/page-img/profile-bg5.jpg" alt="profile-bg" class="rounded img-fluid w-100">-->
<!--                            </div>-->
<!--                            <div class="profile-info p-4">-->
<!--                                <div class="user-detail">-->
<!--                                    <div class="d-flex flex-wrap justify-content-between align-items-start">-->
<!--                                        <div class="profile-detail d-flex">-->
<!--                                            <div class="profile-img pe-4">-->
<!--                                                <img src="galleys/public/assets/images/user/17.jpg" alt="profile-img" class="avatar-130 img-fluid" />-->
<!--                                            </div>-->
<!--                                            <div class="user-data-block">-->
<!--                                                <h4>-->
<!--                                                    <a href="friend-profile.html">Ed Itorial</a>-->
<!--                                                </h4>-->
<!--                                                <h6>@testen</h6>-->
<!--                                                <p>Lorem Ipsum is simply dummy text of the</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <button type="submit" class="btn btn-primary">Following</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>