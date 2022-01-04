<!-- loader END -->

<?php include "mvc/Views/temp/logins/SlickSliderContent.php"; ?>
<div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
    <div class="sign-in-from">
        <h1 class="mb-0">Sign Up</h1>
        <p>Enter your email address and password to access admin panel.</p>
        <form class="mt-4" method="POST">
            <div class="row form-group">
                <div class="col">
                    <input type="text" class="form-control mb-0" placeholder="First name" class="f_name" name="f_name" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-0" placeholder="Last name" class="l_name" name="l_name" required>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control mb-0" id="passwords" name="passwords" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control mb-0" id="address" name="address" placeholder="Your address" required>
            </div>
            <div class="row form-group">
                <div class="col-md-8">
                    <label class="form-label" for="birthday">date of birth</label>
                    <input type="date" class="form-control" placeholder="Your birthday" id="birthday" name="birthday" required>
                </div>
                <div class="col-md-4 ">
                    <label class="form-label" for="gender">gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option>--choose--</option>
                        <option value="M">Male</option>
                        <option value="F">FeMale</option>
                        <option value="O">Orther</option>
                    </select>
                </div>
            </div>
            <div class="d-inline-block w-100">
                <div class="form-check d-inline-block mt-2 pt-1">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                </div>
                <button type="submit" class="btn btn-primary float-end" style="margin: 2% 0;">Sign Up</button>
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="login.php">Log In</a></span>
                <ul class="iq-social-media">
                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                </ul>
            </div>
        </form>
    </div>
</div>

</section>
</div>
<?php include "mvc/Views/temp/logins/Footer.php"; ?>