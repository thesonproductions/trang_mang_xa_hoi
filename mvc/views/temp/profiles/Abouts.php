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


                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta bdradius">
                                <div class="about">
                                    <div class="personal">
                                        <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
                                        <p>
                                            <?php
                                            if (($top->readWork($_GET['id'])) != null) {
                                                $work = $top->readWork($_GET['id']);
                                                if (isset($work->description)) {
                                                    $work = json_decode($work->description);
                                                }
                                                echo $work->desc;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="d-flex flex-row mt-2">
                                        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                                            <li class="nav-item">
                                                <a href="#basic" class="nav-link active" data-toggle="tab">Basic info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#work" class="nav-link" data-toggle="tab">work and education</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#interest" class="nav-link" data-toggle="tab">address</a>
                                            </li>
<!--                                            <li class="nav-item">-->
<!--                                                <a href="#lang" class="nav-link" data-toggle="tab">languages</a>-->
<!--                                            </li>-->
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="basic">
                                                <ul class="basics">
                                                    <li><i class="ti-user"></i><?php echo $ob->readUser($_GET['id'])->f_name.' '.$ob->readUser($_GET['id'])->l_name; ?></li>
                                                    <li><i class="ti-map-alt"></i><?php echo isset($ob->readUser($_GET['id'])->address) ? $ob->readUser($_GET['id'])->address : ''; ?></li>
                                                    <li><i class="ti-mobile"></i><?php echo isset($ob->readUser($_GET['id'])->phone_number) ? '+'.$ob->readUser($_GET['id'])->phone_number : ''; ?></li>
                                                    <li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c4553494e515d55507c59515d5550125f5351">[email&#160;protected]</a></li>
                                                    <li><i class="ti-world"></i>www.Winku.com</li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="work" role="tabpanel">
                                                <div>

                                                    <a href="#" title="">Envato</a>
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
                                                    <ul class="education">
                                                        <li><i class="ti-twitter"></i> <a href="profile/index.php?id=<?php echo $_GET['id']; ?>">follow me</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="interest" role="tabpanel">
                                                <ul class="basics">
                                                    <?php
                                                    if (($top->readWork($_GET['id'])) != null) {
                                                        $work = $top->readWork($keyId);
                                                        if (isset($work->description)) {
                                                            $work = json_decode($work->description);
                                                        }

                                                        if (isset($work->isStudy)) {
                                                            echo "<li>".$work->isStudy."</li>";
                                                        }
                                                        if (isset($work->graduate)) {
                                                            echo "<li>".$work->graduate."</li>";
                                                        }
                                                        if (isset($work->masters)) {
                                                            echo "<li>".$work->masters."</li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="lang" role="tabpanel">
                                                <ul class="basics">
                                                    <li>english</li>
                                                    <li>french</li>
                                                    <li>spanish</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- centerl meta -->
                        <div class="col-lg-3">

                        </div>
                        <!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>