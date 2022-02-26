<div class="theme-layout">
    <?php include "mvc/views/temp/TopBar.php"; ?>
    <?php include "mvc/views/temp/Profiles.php"; ?>
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            <aside class="sidebar static ">
                                <?php include "mvc/views/temp/Shortcuts.php"; ?>
                            </aside>
                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta bdradius">
                                <div class="editing-interest ">
                                    <h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
                                    <div class="notification-box">
                                        <ul>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>bob frank like your post</p>
                                                    <span>30 mints ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar2.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>Sarah Hetfield commented on your photo. </p>
                                                    <span>1 hours ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar3.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>Mathilda Brinker commented on your new profile status. </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar4.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>Green Goo Rock invited you to attend to his event Goo in Gotham Bar. </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar5.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>Chris Greyson liked your profile status. </p>
                                                    <span>1 day ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                            <li>
                                                <figure><img src="public/images/resources/friend-avatar6.jpg" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>You and Nicholas Grissom just became friends. Write on his wall. </p>
                                                    <span>2 days ago</span>
                                                </div>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <?php include "mvc/views/temp/FriendSuggest.php"; ?>
                                <!-- who's following -->
                            </aside>
                        </div>
                        <!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>