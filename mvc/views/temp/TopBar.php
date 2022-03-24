
<!-- responsive header -->

<div class="topbar stick">
    <div class="logo">
        <a title="" href="Home"><img src="public/images/logo.png" alt=""></a>
    </div>
    <div class="top-area">
        <div class="top-search">
            <form method="post" class="">
                <input type="text" placeholder="Search Friend">
                <button data-ripple><i class="ti-search"></i></button>
            </form>

        </div>

        <ul class="setting-area">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" style="display: flex; align-items: center;">
                        <li class="nav-item" style="padding: 0 10px;">
                            <a  class="nav-link" href="Home"><i class="ti-home"></i></a>
                        </li>
                        <li class="nav-item dropdown " style="padding: 0 10px;" ">
                            <a class="nav-link checkStatuss" href="#" id="clickNotification_<?php echo $keyId; ?> role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-bell"></i><span style="    position: absolute;
    top: 23px;
    right: 10px;
    font-size: 14px;
    color: red;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 12px 12px;
    line-height: 0px;" id="tbcount"><?php echo count($notifications->readNotification($keyId)) == 0 ? '' : count($notifications->readNotification($keyId)); ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="scrollmenu" style="overflow: auto;top: 125%;left: -160px;max-height: 294px;">
                                <a class="dropdown-item " href="#" style="border-bottom: 1px solid #e9ecef;" id="notification">
                                    View Notifications
                                </a>
                                <?php
                                    $bnoti = $notifications->readNoti($keyId);
                                    $a = array('disLike','Like','Comment');
                                    foreach ($bnoti as $key => $value){
                                        $detail = $ob->readUser($value->id_notifier);
                                ?>
                                <a class="dropdown-item" href="#" style="overflow: hidden;padding-left: 0;">
                                    <div class="minibox-side">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="width: 50px;height: 45px;">
                                                        <img src="public/images/avatar/<?php echo (($detail->avatar == null)) ? 'unknownUser.jpg' : $detail->avatar;?>" style="max-height: 100%;max-width: 100%;object-fit: cover;border-radius: 50%;">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div style="<?php echo $value->status == 1 ? 'font-weight: bold;' : ''; ?>">
                                                        <h6><?php echo $detail->username; ?></h6>
                                                        <span><?php echo $a[$value->type]; ?> your post</span>
                                                        <i><?php echo $processTime->time_ago($value->create_at);?></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                    }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <span><span id="count"><?php echo count($notifications->readNotification($keyId)); ?></span> New Notifications.</span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="padding: 0 10px;">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-comment"></i><span style="    position: absolute;
    top: 23px;
    right: 10px;
    font-size: 14px;
    color: red;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 12px 12px;
    line-height: 0px;">5</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="scrollmenu" style="overflow: auto;top: 125%;left: -180px;max-height: 294px;">
                                <a class="dropdown-item" href="#" style="border-bottom: 1px solid #e9ecef;">
                                    View Messenger
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="minibox-side">
                                        <img src="public/images/resources/thumb-5.jpg">
                                        <div>
                                            <h6>Ngo Ba Kha</h6>
                                            <span>Hi, how r u dear ...</span>
                                            <i>2 min ago</i>
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <span>5 New Messages.</span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class=" nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex;align-items: center;">
                                <div class="border-avatar" style="width: 45px;height: 45px;">
                                    <img src="public/images/avatar/<?php echo ($arr->avatar == NULL) ? 'unknownUser.jpg' : $arr->avatar; ?>" alt="">
                                </div>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -60px;top: 100%;">
                                <span style="  border-bottom: 1px solid #ccc;
    display: inline-block;
    font-size: 16px;
    padding: 3px 0px;
    text-align: center;
    width: 100%;"><?php echo $arr->username; ?></span>
                                <a class="dropdown-item" href="Profile" style="padding-top: 10px;"><i class="ti-user"></i>   View Profile</a>
                                <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i>   Edit Profile</a>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i>   Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Signin/logout"><i class="ti-power-off"></i>   Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </ul>
    </div>
</div><!-- topbar -->