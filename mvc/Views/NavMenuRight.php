<div class="right-sidebar-mini right-sidebar">
    <div class="right-sidebar-panel p-0">
        <div class="card shadow-none">
            <div class="card-body p-0">
                <div class="media-height p-3" data-scrollbar="init">
                    <?php foreach ($friendList as $key => $value){ ?>
                    <div class="d-flex align-items-center mb-4">
                        <div class="iq-profile-avatar status-online">
                            <img class="rounded-circle avatar-50" src="galleys/picture-avatar/<?php echo $value->avatar; ?>" alt="">
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?php echo $value->nick_name; ?></h6>
                            <p class="mb-0">Just Now</p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="d-flex align-items-center">
                        <div class="iq-profile-avatar">
                            <img class="rounded-circle avatar-50" src="galleys/public/assets/images/user/02.jpg" alt="">
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Monty Carlo</h6>
                            <p class="mb-0">Admin</p>
                        </div>
                    </div>
                </div>
                <div class="right-sidebar-toggle bg-primary text-white mt-3">
                    <i class="ri-arrow-left-line side-left-icon"></i>
                    <i class="ri-arrow-right-line side-right-icon"><span class="ms-3 d-inline-block">Close
                                    Menu</span></i>
                </div>
            </div>
        </div>
    </div>
</div>