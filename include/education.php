<!-- education -->
<div class="experience" id="education">
    <div class="container">
        <h3 class="w3l-title">My Education</h3>
        <div class="col-md-12 abt-left">
            <div class="accordion">
                <?php foreach ($education as $edu){ ?>
                <div class="accordion-section">
                    <h5><a class="accordion-section-title" href="#accordion-<?php echo $edu['sn'] ?>">
                            <span><?php echo $edu['passing'] ?></span><?php echo $edu['institution'] ?>
                            <i class="glyphicon glyphicon-chevron-down"></i>
                        </a></h5>
                    <div id="accordion-<?php echo $edu['sn'] ?>" class="accordion-section-content">
                        <h6><?php echo $edu['degree'] ?></h6>
                        <ul>
                            <li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><a href="#"><?php echo $edu['description'] ?></a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- //education -->