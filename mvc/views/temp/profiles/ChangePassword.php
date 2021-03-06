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
                            <aside class="sidebar static">
                                <?php include "mvc/views/temp/EditInfor.php"; ?>
                                <!-- settings widget -->
                            </aside>
                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta bdradius">
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>
                                    <div class="preview-change" style="color: red;"></div>
                                    <form method="POST" action="" id="changePass">
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" required="required" />
                                            <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="newPass" name="newPass" required="required" />
                                            <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="confirmPass" name="confirmPass" required="required" />
                                            <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
                                        </div>
                                        <a class="forgot-pwd underline" title="" href="#">Forgot Password?</a>
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn" onclick="$('form#changePass')[0].reset()"><span>Cancel</span></button>
                                            <button type="submit" class="mtr-btn"><span>Update</span></button>
                                        </div>
                                    </form>
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