<div class="widget friend-list stick-widget bdradius">
    <h4 class="widget-title">Friends</h4>
    <div id="searchDir"></div>
    <ul id="people-list" class="friendz-list">
        <?php
        $readList = $mess->readChat($keyId);
        foreach ($readList as $key => $value){

        ?>
        <li id="chatUserMini_<?php echo $value->id_user; ?>" class="choseChat" onclick="$('#titlename').html('<?php echo $value->username; ?>')">
            <figure style="height: 45px;width: 45px;">
                <img src="public/images/avatar/<?php echo ($value->avatar == NULL) ? 'unknownUser.jpg' : $value->avatar; ?>" alt="" style="object-fit: cover;width: 100%;height: 100%">
            </figure>
            <div class="friendz-meta">
                <a href="time-line.html"><?php echo $value->username; ?></a>
            </div>
        </li>
        <?php } ?>
    </ul>
    <div class="chat-box">
        <div class="chat-head">
            <span class="status f-online"></span>
            <h6 id="titlename"></h6>
            <div class="more">
                <span><i class="ti-more-alt"></i></span>
                <span class="close-mesage"><i class="ti-close"></i></span>
            </div>
        </div>
        <div class="chat-list">
            <div class="peoples-mesg-box" style="width: 89%;">

            </div>
        </div>
    </div>
</div>
