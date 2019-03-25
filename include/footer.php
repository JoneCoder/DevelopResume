<!-- footer -->
<div class="footer w3ls">
    <div class="container">
        <div class="w3ls-social-icons-2">
            <a class="facebook" href="<?php echo $afterAssocAdmin['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="twitter" href="<?php echo $afterAssocAdmin['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="pinterest" href="<?php echo $afterAssocAdmin['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            <a class="linkedin" href="<?php echo $afterAssocAdmin['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a class="linkedin" href="<?php echo $afterAssocAdmin['website']; ?>" target="_blank"><i class="fa fa-globe"></i></a>
            <!--<a class="tumblr" href="#" target="_blank"><i class="fa fa-tumblr"></i></a>-->
        </div>
    </div>
</div>
<div class="copyrights">
    <p>&copy; 2019 My CV. All rights reserved | Design & Developed by Jone</p>
</div>
<!-- //footer -->

<!-- js-scripts -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- for-bottom-to-top smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //for-bottom-to-top smooth scrolling -->
<!-- menu-script -->
<script>
    (function($){
        // Menu Functions
        $(document).ready(function(){
            $('#menuToggle').click(function(e){
                var $parent = $(this).parent('.menu');
                $parent.toggleClass("open");
                var navState = $parent.hasClass('open') ? "hide" : "show";
                $(this).attr("title", navState + " navigation");
                // Set the timeout to the animation length in the CSS.
                setTimeout(function(){
                    console.log("timeout set");
                    $('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
                }, 200);
                e.preventDefault();
            });
        });
    })(jQuery);
</script>
<!-- //menu-script -->
<!-- baneer-js -->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider").responsiveSlides({
            auto: true,
            pager:false,
            nav:false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- //baneer-js -->
<!-- skills -->
<script src="js/skill.bars.jquery.js"></script>
<script>
    $(document).ready(function(){

        $('.skillbar').skillBars({
            from: 0,
            speed: 4000,
            interval: 100,
            decimals: 0,
        });

    });
</script>
<!-- //skills -->
<!-- timeline -->
<script type="text/javascript" src="js/jquery.cntl.js"></script>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.cntl').cntl({
            revealbefore: 300,
            anim_class: 'cntl-animate',
            onreveal: function(e){
                console.log(e);
            }
        });
    });
</script>
<!-- //timeline -->
<!-- accordion -->
<script>
    jQuery(document).ready(function() {
        function close_accordion_section() {
            jQuery('.accordion .accordion-section-title').removeClass('active');
            jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
        }

        jQuery('.accordion-section-title').click(function(e) {
            // Grab current anchor value
            var currentAttrValue = jQuery(this).attr('href');

            if(jQuery(e.target).is('.active')) {
                close_accordion_section();
            }else {
                close_accordion_section();

                // Add active class to section title
                jQuery(this).addClass('active');
                // Open up the hidden content panel
                jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
            }

            e.preventDefault();
        });
    });
</script>
<!-- //accordion -->
<!-- for projects -->
<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/jquery.cm-overlay.js"></script>
<script>
    $(document).ready(function(){
        $('.cm-overlay').cmOverlay();
    });
</script>
<!-- //for projects -->
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- //js-scripts -->

</body>
</html>