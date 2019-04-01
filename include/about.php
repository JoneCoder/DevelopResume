<!-- about -->
<div class="about" id="about">
    <div class="container">
        <h3 class="w3l-title">My Self</h3>
        <div class="about-w3l-agileifo-grid">
            <div class="col-md-7 agile-w3l-ab">
                <ul class="rslides" id="slider">
                    <?php foreach ($slider as $slid){ ?>
                    <li>
                        <div class="agile-w3l-ab-img">
                            <img src="images/slider/<?php echo $slid['image']; ?>" class="img-responsive" alt="Homey Designs">
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-5 w3ls-agile-left">
                <div class="w3ls-agile-left-info">
                    <h4>Name</h4>
                    <p><?php echo $afterAssocAdmin['fullname']; ?></p>
                </div>
                <div class="w3ls-agile-left-info">
                    <h4>Sex</h4>
                    <p><?php echo $afterAssocAdmin['gender']; ?></p>
                </div>
                <div class="w3ls-agile-left-info">
                    <h4>Address</h4>
                    <p><?php echo $afterAssocAdmin['address1']; ?></p>
                </div>
                <div class="w3ls-agile-left-info">
                    <h4>Phone Number</h4>
                    <p>+88<?php echo $afterAssocAdmin['mobile']; ?></p>
                </div>
                <div class="w3ls-agile-left-info">
                    <h4>Email Address</h4>
                    <p><a href="<?php echo $afterAssocAdmin['email']; ?>"><?php echo $afterAssocAdmin['email']; ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //about -->