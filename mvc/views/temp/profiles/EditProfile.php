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
                                    <h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
                                    <?php $arr = $data['models']->readUser($keyId); ?>
                                    <form method="post" action="profile/updateProfile" id="FormGroup">
                                        <div class="form-group half">
                                            <input type="text" id="input"  name="fname" value="<?php echo (isset($arr->f_name) ? $arr->f_name : ""); ?>"/>
                                            <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="lname" value="<?php echo (isset($arr->f_name) ? $arr->l_name : ""); ?>"/>
                                            <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phoneNumber" value="<?php echo (isset($arr->phone_number) ? $arr->phone_number : ""); ?>"/>
                                            <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" value="<?php echo (isset($arr->username) ? $arr->username : ""); ?>"/>
                                            <label class="control-label" for="input">Username.</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="dob">
                                            <?php $birth = $arr->birthday;
                                                  $birth = explode("-",$birth);
                                            ?>
                                            <div class="form-group">
                                                <select name="day">
                                                    <option value="<?php echo (isset($birth[2]) ? $birth[2] : "Day"); ?>"><?php echo (isset($birth[2]) ? $birth[2] : "Day"); ?></option>
                                                    <?php for ($i = 1; $i <= 31; $i++){ ?>
                                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="month">
                                                    <option value="<?php echo (isset($birth[1]) ? $birth[1] : "Month"); ?>"><?php echo (isset($birth[1]) ? $birth[1] : "Month"); ?></option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="year">
                                                    <option value="<?php echo (isset($birth[0]) ? $birth[0] : "Year"); ?>"><?php echo (isset($birth[0]) ? $birth[0] : "Year"); ?></option>
                                                    <?php for ($i = 1950; $i <= 2022; $i++){ ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-radio">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="gen" value="1"><i class="check-box"></i>Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gen" value="0"><i class="check-box"></i>Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" value="<?php echo isset($arr->address) ? $arr->address : ""; ?>"/>
                                            <label class="control-label" for="input">Address</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" id="textarea" name="description" ><?php echo isset($arr->description) ? $arr->description : ""; ?></textarea>
                                            <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                                        </div>
                                        <input type="hidden" name="getDetailUserId" value="<?php echo $keyId; ?>">
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn" onclick="$('#FormGroup')[0].reset()"><span>Cancel</span></button>
                                            <button type="button" class="mtr-btn" onclick="$('#FormGroup').submit()"><span>Update</span></button>
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