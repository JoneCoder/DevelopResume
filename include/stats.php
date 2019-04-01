<!-- stats -->
<div class="stats wthree-sub" id="skills" <?php foreach ($background as $back){ if ($back['id'] == 2){ echo 'style="background:url(images/background/'.$back['pic'].')no-repeat center 0px; background-size:cover;"';}} ?>>
    <div class="container">
        <h3 class="w3l-title">My Skills</h3>
        <?php
        $skills = $afterAssocAdmin['skills'];
        $skill = explode(',', $skills);
        ?>
        <?php
        foreach ($skill as $key=> $data){
            ?>

        <div class="col-sm-6 stats_grid_right">
            <div class="skillbar" data-percent="85">
                <span class="skillbar-title" style="background: #2980b9;"><?php echo $data; ?></span>
                <p class="skillbar-bar" style="background: #3498db;"></p>
                <span class="skill-bar-percent"></span>
            </div>
            <!-- End Skill Bar -->
            </div>
        <?php } ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //stats -->