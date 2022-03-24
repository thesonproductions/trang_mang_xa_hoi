<div class="theme-layout">
    <?php include "mvc/views/temp/TopBar.php"; ?>
    <?php include "mvc/views/temp/Profiles.php"; ?>
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <!-- sidebar -->
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="central-meta">
                                <ul class="photos">
                                    <?php foreach ($data['data'] as $key => $value){
                                        $filePath = 'public/images/post/' . $value->media_content;
                                        $typeMedia = mime_content_type($filePath);
                                    ?>
                                    <li>

                                            <video style="text-align: center"
                                                   class="post-media-content-video" controls>
                                                <source src="<?php echo $filePath; ?>"
                                                        type="<?php echo $typeMedia; ?>">
                                            </video>


                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                            </div>
                            <!-- photos -->
                        </div>
                        <!-- centerl meta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>