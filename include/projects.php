<!-- projects -->
<div class="portfolio" id="projects">
    <div class="container">
        <h3 class="w3l-title">My Projects</h3>
        <div class="row">
            <?php foreach ($project as $item){ ?>
                <div class="col-md-3" style="margin-top: 50px;">
                    <div class="hovereffect">
                        <a class="cm-overlay" title="<?php echo $item['description']; ?>" href="images/projects/<?php echo $item['ppic']; ?>">
                            <img src="images/projects/<?php echo $item['ppic']; ?>" alt=" " width="100%" height="200">
                            <div class="overlay">
                                <h4><?php echo $item['projectname'] ?></h4>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //projects -->