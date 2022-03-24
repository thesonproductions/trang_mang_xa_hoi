<div class="widget bdradius">
    <h4 class="widget-title">Recent Activity</h4>
    <ul class="activitiez">
        <?php
            $recent = $top->recentActiviti($keyId);
            $readAc = array('DisLike','Like','Comment');
            foreach ($recent as $key => $value){
                $detailUserActiviti = $ob->readUser($value->id_user);
        ?>
        <li>
            <div class="activity-meta">
                <i><?php echo $processTime->time_ago($value->create_at); ?></i>
                <span><a href="#" title="">You <?php echo $readAc[$value->type]; ?>ed on post </a></span>
                <h6>of <a href="Profile/index/<?php echo $detailUserActiviti->id_user; ?>"><?php echo $detailUserActiviti->username; ?> .</a></h6>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>
<!-- recent activites -->