<section>
    <?php $detailProfile = $ob->readUser($_GET['id']);
            $follower = $top->readFollowerOfUser($_GET['id']);
    ?>
    <div class="feature-photo container">
        <figure style="width: 1110px; height: 325px;">
            <img src="public/images/cover/<?php echo ($detailProfile->cover_avatar == NULL) ? 'default.jpg' : $detailProfile->cover_avatar; ?>" alt="" style="height: 100%;width: 100%;background-size: cover;background-repeat: no-repeat;background-position: center;object-fit: cover">
        </figure>
        <div class="add-btn">
            <span id="c_<?php echo $_GET['id']; ?>"><?php echo count($follower); ?> followers</span>
            <a href="#" class="addFollow" id="follow_<?php echo $_GET['id']; ?>_<?php echo $keyId; ?>" title="" data-ripple="" style="<?php echo (($keyId == $_GET['id']) ? "display: none" : ""); ?>"><?php echo count($top->checkExistUser($keyId,$_GET['id'])) == 1 ? 'UnFollow' : 'Follow'; ?></a>
            <input type="hidden" value="<?php echo count($top->checkExistUser($keyId,$_GET['id'])) == 1 ? 1 : 0; ?>" id="suggest_<?php echo $_GET['id']; ?>">
        </div>
        <form class="edit-phto" style="<?php echo ($keyId != $_GET['id']) ? "display: none;" : ""; ?> cursor: pointer;" data-toggle="modal" data-target="#uploadAvatar" onclick="updateCoverAvatar()">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit Cover Photo
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure style="width: 154px;height: 137px;">
                            <img src="public/images/avatar/<?php echo ($detailProfile->avatar == NULL) ? 'unknownUser.jpg' : $detailProfile->avatar; ?>" alt="" style="object-fit: cover;height: 100%">
                            <form class="edit-phto" style="<?php echo ($keyId != $_GET['id']) ? "display: none;" : ""; ?> cursor: pointer;" data-toggle="modal" data-target="#uploadAvatar" onclick="updateAvatar()">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5></h5>
                            </li>
                            <li>
                                <a class="<?php echo ($data['active']=="timeline") ? "active" : "";?>" href="Profile?id=<?php echo $_GET['id']; ?>" title="" data-ripple="">Time line</a>
                                <a class="<?php echo ($data['active']=="photos") ? "active" : "";?>" href="Profile/photos?id=<?php echo $_GET['id']; ?>" title="" data-ripple="">Photos</a>
                                <a class="<?php echo ($data['active']=="videos") ? "active" : "";?>" href="Profile/videos?id=<?php echo $_GET['id']; ?>" title="" data-ripple="">Videos</a>
                                <a class="<?php echo ($data['active']=="friends") ? "active" : "";?>" href="Profile/friend?id=<?php echo $_GET['id']; ?>" title="" data-ripple="">Friends</a>
                                <a class="<?php echo ($data['active']=="abouts") ? "active" : "";?>" href="Profile/about?id=<?php echo $_GET['id']; ?>" title="" data-ripple="">about</a>
                                <a class="<?php echo ($data['active']=="action") ? "active" : "";?>" href="Profile/editProfile?id=<?php echo $_GET['id']; ?>" title="" data-ripple="" style="<?php echo ($keyId != $_GET['id']) ? "display: none;" : ""; ?>">more</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="uploadAvatar" tabindex="-1" role="dialog" aria-labelledby="titleAvatar" aria-hidden="true">
    <div class="modal-dialog" role="document" id="myModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleAvatar"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadAvatar" enctype="multipart/form-data" action="profile/uploadAvatar" method="POST">
                    <div id="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                        <input type="hidden" id="isAvatar" name="isAvatar">
                        <input type="hidden" name="updateId" value="<?php echo $keyId; ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeForm" onclick="resetFormAvatar()">Close</button>
                <button type="button" class="btn btn-primary" id="submitForm" onclick="$('form#uploadAvatar').submit()">Update</button>
            </div>
        </div>
    </div>
</div>