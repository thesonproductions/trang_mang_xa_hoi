<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Winku Social Network Toolkit</title>
    <base href="http://localhost/finalexam/trang_mang_xa_hoi/">
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
            <a title="" href="newsfeed.html"><img src="public/images/logo2.png" alt=""></a>
        </div>

    </div><!-- topbar transparent header -->
    <section>
        <div class="ext-gap bluesh high-opacity " style="padding: 50px 0!important;">
            <div class="content-bg-wrap" style="background: url(public/images/resources/animated-bg2.png)"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-banner">
                            <h1>Register Now</h1>
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
                <div class="form-side bdradius">
                    <h1 style="text-align: center;">CREATE AN ACCOUNT</h1>
                    <form method="POST" id="signup">
                        <span class="form-message"></span>


                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" id="email" class="form-control input-style" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" id="password" class="form-control input-style" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="password" class="form-control" id="confirmPass"
                                   placeholder="Enter confirm password">
                        </div>
                        <div class="form-group">
                            <label>username:</label>
                            <input type="text" name="username" id="username" class="form-control input-style" placeholder="Enter username">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>First Name:</label>
                                <input type="text" name="fname" class="form-control input-style" id="fname"
                                       placeholder="Enter first name">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Last Name:</label>
                                <input type="text" name="lname" class="form-control input-style" id="lname"
                                       placeholder="Enter last name">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control input-style" style="    border: none;
                                                                        border-bottom: 2px solid #0a98dc;
                                                                        height: 40px;">
                                    <option value="-1">--Select--</option>
                                    <option value="0">Male</option>
                                    <option value="1">FeMale</option>
                                    <option value="2">Orther</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnRegister" id="btnRegister" class="btn btn-success" value="Submit now">
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

        $('#signup').on('submit',function (e) {

            e.preventDefault()
            var email = $('#email').val()
            var password = $('#password').val()
            var username = $('#username').val()
            var fname = $('#fname').val()
            var lname = $('#lname').val()
            var gender = $('#gender').val()

            // alert(validForm()===true)
            console.log({email: email, password: password, username: username, fname: fname, lname: lname,gender: gender})
            if (validForm()){
                $.ajax({
                    type: 'POST',
                    url: 'Register/signup',
                    data: {email: email, password: password, username: username, fname: fname, lname: lname,gender: gender},
                    cache:false,
                    dataType: 'json',
                    beforeSend:function(){
                        $('#btnRegister').attr('disabled', 'disabled');
                    },
                    success:function (response) {
                        $('.form-message').css('display','block')
                        $('#btnRegister').attr('disabled', false);
                        if (response.status == 1){
                            $('.form-message').html('<p style="color: #14e314;">' + response.message + '</p>')
                            $('#signup')[0].reset()
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sign Up Success',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location = "Login";
                            });
                        } else {
                            $('.form-message').css('display','block')
                            $('.form-message').html('<p>' + response.message + '</p>')
                        }
                    }
                })
            }
        })


        function validForm() {
            var email = $('#email').val()
            var password = $('#password').val()
            if (validEmail(email) === false){
                $('.form-message').css('display','block')
                $('.form-message').html('<p class="">' + 'invalid Email! please try again.' + '</p>')
                return false
            }else if (validPassword(password) === false){
                $('.form-message').css('display','block')
                $('.form-message').html('<p class="">' + 'invalid Password! password must have At least six characters, include letters, numbers, special characters, and periods.' + '</p>')
                return false
            } else if (password != $('#confirmPass').val()) {
                $('.form-message').css('display','block')
                $('.form-message').html('<p class="">' + 'invalid Password, wrong confirm! please try again..' + '</p>')
                return false
            }else {
                return true
            }
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