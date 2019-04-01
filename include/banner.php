<!-- banner -->
<div id="home" class="banner" <?php foreach ($background as $back){ if ($back['id'] == 1){ echo 'style="background:url(images/background/'.$back['pic'].')no-repeat center 0px; background-size:cover; position: relative;"';}} ?>>
    <div class="banner-agileinfo">
        <!-- header -->
        <div class="header">
            <div class="container">
                <div class="logo">
                    <h1><a href="index.php">Resume</a></h1>
                </div>
                <div class="menu">
                    <a href="" id="menuToggle"> <span class="navClosed"></span> </a>
                    <nav>
                        <a href="index.php" class="active">Home</a>
                        <a href="#about" class="scroll">About Me</a>
                        <a href="#skills" class="scroll">My Skills</a>
                        <a href="#services" class="scroll">My Services</a>
                        <a href="#experience" class="scroll">Experience</a>
                        <a href="#education" class="scroll">My Education</a>
                        <a href="#projects" class="scroll">My Projects</a>
                        <a href="#contact" class="scroll">Contact Me</a>
                    </nav>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //header -->
        <div class="banner-main">
            <div class="container">
                <div class="col-md-5 banner-left">
                    <img src="images/mypng/<?php echo $afterAssocPng['png']; ?>" alt="">
                </div>
                <div class="col-md-7 banner-text">
                    <p>Welcome</p>
                    <h2><span>I am <?php echo $afterAssocAdmin['username']; ?></span><?php echo $afterAssocAdmin['profession']; ?></h2>
                    <div class="w3agile_hire_right">
                        <a href="#contact" class="wthree-more w3more1 nina scroll" data-text="hire me">
                            <span>h</span><span>i</span><span>r</span><span>e</span> <span>m</span><span>e</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->