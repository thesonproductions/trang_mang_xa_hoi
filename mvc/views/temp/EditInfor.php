<div class="widget bdradius">
    <h4 class="widget-title">Edit info</h4>
    <ul class="naves">
        <li>
            <i class="ti-info-alt"></i>
            <a title="" href="Profile/editProfile?id=<?php echo $_GET['id']; ?>">Basic info</a>
        </li>
        <li>
            <i class="ti-mouse-alt"></i>
            <a title="" href="Profile/editWork?id=<?php echo $_GET['id']; ?>">Education &amp; Work</a>
        </li>
<!--        <li>-->
<!--            <i class="ti-heart"></i>-->
<!--            <a title="" href="edit-interest.html">My interests</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <i class="ti-settings"></i>-->
<!--            <a title="" href="edit-account-setting.html">account setting</a>-->
<!--        </li>-->
        <li>
            <i class="ti-lock"></i>
            <a title="" href="Profile/changePassword?id=<?php echo $_GET['id']; ?>">change password</a>
        </li>
    </ul>
</div>