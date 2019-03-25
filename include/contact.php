<!-- introduce -->
<div class="confi-w3l">
    <div class="container text-justify">
        <h3>Hello....</h3>
        <p><?php echo $afterAssocAdmin['about']; ?></p>
    </div>
</div>
<!-- //introduce -->
<!-- //contact -->
<div class="address" id="contact">
    <div class="container">
        <h3 class="w3l-title">Contact Me</h3>
        <div class="address-row">
            <div class="col-md-6 address-left wow agile fadeInLeft animated" data-wow-delay=".5s">
                <div class="address-grid">
                    <h4 class="wow fadeIndown animated" data-wow-delay=".5s">Get In Touch</h4>
                    <?php
                    if(!empty($_SESSION['success'])){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo 'Message successfully sent.';
                            unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>
                    <form action="validate/message_post.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Name" name="userName" required="">
                        <p class="text-danger">
                            <?php
                            if (!empty($_GER['userNameErr'])){
                                if ($_GET['userNameErr'] == 1){
                                    echo 'Please fill out this field.';
                                }
                                elseif ($_GET['userNameErr'] == 2){
                                    echo 'Name must be 50 charters!';
                                }
                            }
                            ?>
                        </p>
                        <input type="email" placeholder="Email" name="email" required="">
                        <p class="text-danger">
                            <?php
                            if (!empty($_GET['emailErr'])){
                                if ($_GET['emailErr'] == 1){
                                    echo 'Please fill out this field.';
                                }
                                elseif ($_GET['emailErr'] == 2){
                                    echo 'Invalid email address!';
                                }
                            }
                            ?>
                        </p>
                        <input type="text" placeholder="Subject" name="subject" required="">
                        <p class="text-danger">
                            <?php
                            if (!empty($_GER['SubjectErr'])){
                                if ($_GET['SubjectErr'] == 1){
                                    echo 'Please fill out this field.';
                                }
                                elseif ($_GET['SubjectErr'] == 2){
                                    echo 'Subject must be 100 charters!';
                                }
                            }
                            ?>
                        </p>

                        <textarea placeholder="Message" name="message" required=""></textarea>
                        <p class="text-danger">
                            <?php
                            if (!empty($_GET['messageFieldErr'])){
                                echo 'Please fill out this field.';
                            }
                            elseif (!empty($_GET['messageWordErr'])){
                                echo 'Message must be 500 charter include';
                            }
                            ?>
                        </p>
                        <input type="file" name="photo" accept="image/*">
                        <p class="text-danger">
                            <?php
                            if (!empty($_GET['fileErr'])){
                                echo 'Invalid file format';
                            }
                            ?>
                        </p>
                        <input type="submit" value="SEND">
                    </form>
                </div>
            </div>
            <div class="col-md-6 address-right">
                <div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
                    <h4>Address</h4>
                    <p><?php echo $afterAssocAdmin['address1']; ?></p>
                </div>
                <div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
                    <h4>Phone </h4>
                    <p>+88<?php echo $afterAssocAdmin['mobile']; ?></p>
                    <p>+8801842015935</p>
                </div>
                <div class="address-info agileits-info wow fadeInRight animated" data-wow-delay=".6s">
                    <h4>Mail</h4>
                    <p><a href="<?php echo $afterAssocAdmin['email']; ?>" target="_blank"><?php echo $afterAssocAdmin['email']; ?></a></p>
                    <p><a href="mohummadsharif4@gmail.com" target="_blank"> mohummadsharif4@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//contact-->