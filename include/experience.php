<!-- experience -->
<div class="services-w3l" id="experience">
    <div class="container">
        <h3 class="w3l-title">Work Experience</h3>
        <div class="wthree_latest_albums_grids">
            <div class="cntl"> <span class="cntl-bar cntl-center"> <span class="cntl-bar-fill"></span> </span>
                <div class="cntl-states">
                    <?php $x = 1; foreach ($experience as $expert){ ?>
                    <div class="cntl-state">
                        <div class="cntl-content">
                            <h4><?php echo $expert['start_end']; ?></h4>
                            <p><?php echo $expert['title']; ?></p>
                        </div>
                        <div class="cntl-image">
                            <img src="images/experience/<?php echo $expert['pic']; ?>" alt=" " class="img-responsive" />
                            <div class="w3ls_cntl_image_pos">
                                <p><?php echo $expert['institute']; ?></p>
                            </div>
                        </div>
                        <div class="cntl-icon cntl-center"><?php echo $x; $x++; ?></div>
                    </div>
                    <?Php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //experience -->