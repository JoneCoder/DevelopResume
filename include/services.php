<!-- services -->
<div class="services" id="services">
    <div class="container">
        <h3 class="w3l-title">My Services</h3>
        <div class="box2">
            <?php foreach ($service as $item){ ?>
                <div class="col-md-4 s-1" style="margin-top: 50px;">
                    <a href="#">
                        <div class="view view-fifth">
                            <i class="<?php echo $item['icons']; ?>" aria-hidden="true"></i>
                            <div class="mask">
                                <i class="<?php echo $item['icons']; ?>" aria-hidden="true"></i>
                                <h4><?php echo $item['title']; ?></h4>
                                <p><?php echo $item['description']; ?></p>
                            </div>
                            <h3><?php echo $item['title']; ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //services -->