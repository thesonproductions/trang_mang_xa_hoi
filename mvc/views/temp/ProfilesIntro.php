<div class="widget bdradius">
    <h4 class="widget-title">Profile intro</h4>
    <ul class="short-profile">
        <li>
            <span>about</span>
            <p><?php echo $ob->readUser($_GET['id'])->description; ?></p>
        </li>
        <li>
            <span>Education</span>
            <p><?php
                $tex = '';
                if (($top->readWork($_GET['id'])) != null) {
                    $work = $top->readWork($keyId);
                    if (isset($work->description)) {
                        $work = json_decode($work->description);
                    }

                    if (isset($work->isStudy)) {
                        $tex .= $work->isStudy . ', ';
                    }
                    if (isset($work->graduate)) {
                        $tex .= $work->graduate . ', ';
                    }
                    if (isset($work->masters)) {
                        $tex .= $work->masters . ' ';
                    }
                    if (isset($work->study)) {
                        $tex .= $work->study;
                    }
                }

                echo $tex;
                ?></p>
        </li>
        <li>
            <span>Contact me</span>
            <p>+<?php echo isset($ob->readUser($_GET['id'])->phone_number) ? $ob->readUser($_GET['id'])->phone_number : ''; ?></p>
        </li>
    </ul>
</div>
<!-- profile intro widget -->