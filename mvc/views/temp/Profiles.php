<section>
    <div class="feature-photo container">
        <figure><img src="public/images/resources/timeline-1.jpg" alt=""></figure>
        <div class="add-btn">
            <span>1205 followers</span>
            <a href="#" title="" data-ripple="">Follow</a>
        </div>
        <form class="edit-phto">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit Cover Photo
                <input type="file"/>
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="public/images/resources/user-avatar.jpg" alt="">
                            <form class="edit-phto">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file"/>
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>Janice Griffith</h5>
                            </li>
                            <li>
                                <a class="<?php if ($url[1] == "index"){echo "active";} ?>" href="time-line.html" title="" data-ripple="">time line</a>
                                <a class="<?php if ($url[1] == "Photos"){echo "active";} ?>" href="Profile/photos" title="" data-ripple="">Photos</a>
                                <a class="<?php if ($url[1] == "index"){echo "active";} ?>" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                <a class="<?php if ($url[1] == "index"){echo "active";} ?>" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                                <a class="<?php if ($url[1] == "index"){echo "active";} ?>" href="about.html" title="" data-ripple="">about</a>
                                <a class="<?php if ($url[1] == "index"){echo "active";} ?>" href="#" title="" data-ripple="">more</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>