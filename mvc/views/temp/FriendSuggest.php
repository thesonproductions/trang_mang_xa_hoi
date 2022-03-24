<div class="widget bdradius">
    <h4 class="widget-title">Who's follownig</h4>
    <ul class="followers">
        <?php
            $friend = $top->suggestFollow($keyId);
            for ($i = 0; $i < (count($friend) < 6 ? count($friend) : 6); $i++){
                $user = $ob->readUser(($friend[$i]->id_follower));
        ?>
        <li>
            <figure style="height: 50px; width: 50px;">
                <img src="public/images/avatar/<?php echo ($user->avatar == null) ? 'unknownUser.jpg' : $user->avatar; ?>" alt="" style="max-width: 100%;max-height: 100%;object-fit: cover;">
            </figure>
            <div class="friend-meta">
                <h4><a href="profile/index.php?id=<?php echo $user->id_user; ?>" title=""><?php echo $user->username; ?></a></h4>
                <a href="#" title="" class="underline addFollow" id="follow_<?php echo $user->id_user; ?>_<?php echo $keyId; ?>">Follow</a>
                <input type="hidden" value="0" id="suggest_<?php echo $user->id_user; ?>">
            </div>
        </li>
        <?php } ?>
    </ul>
</div>