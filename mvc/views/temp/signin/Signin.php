<?php include "mvc/core/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Winku Social Network Toolkit</title>
    <base href="<?php echo BASE_URLS; ?>">
    <link rel="icon" href="public/images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="public/css/main.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/color.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/style-form.css">
</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="topbar transparent">
        <div class="logo">
            <a title="" href="index.php"><img src="public/images/logo2.png" alt=""></a>
        </div>

    </div><!-- topbar transparent header -->
    <section>
        <div class="ext-gap bluesh high-opacity" style="padding: 50px 0!important;">
            <div class="content-bg-wrap" style="background: url(public/images/resources/animated-bg2.png)"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-banner">
                            <h1>Login Now</h1>
                            <nav class="breadcrumb">
                                <a class="breadcrumb-item" href="#">Home</a>
                                <span class="breadcrumb-item active">index</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top area animated -->

    <section style="background-color: #1593D0">
        <div class="container">
            <div class="row">
                <div class="form-side-login bdradius">
                    <h1 style="text-align: center;">LOGIN NOW</h1>
                    <div class="form-message" style="display: block!important;"><?php if (isset($_COOKIE['error_message'])){echo '<p style="display: block">'.$_COOKIE['error_message'].'</p>';}?></div>
                    <form method="POST" id="signin" action="Signin/signin">
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" id="email" class="form-control input-style-login" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" id="password" class="form-control input-style-login" placeholder="Enter password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                            <label class="form-check-label">Check me out</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnLogin" id="btnLogin" class="btn btn-success" value="Login Now">
                        </div>
                        <div class="form-group" style="text-align: center">
                            <a href="#">Forgot your Password?</a> Or <a href="Signin/register" >Register Now</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="gap no-gap bluesh high-opacity btm-mockup">
            <div class="content-bg-wrap" style="background: url(public/images/resources/btm-banner.png)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="btm-baner">
                            <div class="baner-mockup">
                                <img src="public/images/resources/btm-baner-avatar.png" alt="">
                            </div>
                            <div class="baner-inf">
                                <span>wana more friends?</span>
                                <a href="#" title="">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#signin').on('submit',function (event) {
           if(!validForm()){
               event.preventDefault();
           }
        })
        function validForm() {
            var email = $('#email').val();
            var password = $('#password').val();
            if (!validEmail(email)){
                return false
            } else if (!validPassword(password)){
                return false
            }
            return true
        }
        function validEmail(email) {
            var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return re.test(email);
        }
        function validPassword(password) {
            const isStrongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/;
            return isStrongPassword.test(password)
        }
    })
</script>
</body>

</html>