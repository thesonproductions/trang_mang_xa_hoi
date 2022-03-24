
<div class="theme-layout">
    <?php include "mvc/views/temp/TopBar.php"; ?>
    <?php include "mvc/views/temp/Profiles.php"; ?>
    <!-- responsive header -->


    <!-- topbar -->

    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <div class="col-lg-4">
                                <aside class="sidebar static">
                                    <?php include "mvc/views/temp/ProfilesIntro.php"; ?>
                                    <!-- profile intro widget -->

                                </aside>
                            </div>
                            <!-- sidebar -->
                            <div class="col-lg-8">
                                <div class="central-meta bdradius">
                                    <ul class="photos">
                                        <?php
                                            foreach ($data['data'] as $key => $value){
                                        ?>
                                        <li>
                                            <a class="strip" href="public/images/post/<?php echo $value?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                <img src="public/images/post/<?php echo $value?>" alt="" style="max-height: 100%;max-width: 100%"></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                </div>
                                <!-- photos -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


