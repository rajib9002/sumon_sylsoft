 <link rel="stylesheet" href="style/vanillaSlideshow.css">
<div class="slider_banner" style="overflow:hidden;height:400px;position:relative;border:0;">
    <div class="slider" style="position:absolute;z-index:0;width:100%;border:0;">
        <div id="vanilla-slideshow-container">
            <div id="vanilla-slideshow">

                


                <div class="vanilla-slide">
                     <img src="images/1.jpg" alt="tiger">
                 </div>
                <div class="vanilla-slide">
                     <img src="images/2.jpg" alt="tiger">
                 </div>
                 <div class="vanilla-slide">
                     <img src="images/3.jpg" alt="tiger">
                 </div>
            </div>
            <div id="vanilla-indicators"></div>
            <div id="vanilla-slideshow-previous">
                <img src="images/arrow-previous.png" alt="slider arrow">
            </div>
            <div id="vanilla-slideshow-next">
                <img src="images/arrow-next.png" alt="slider arrow">
            </div>
        </div>
        <script src="scripts/vanillaSlideshow.min.js"></script>
        <script>
            vanillaSlideshow.init({
                slideshow: true,
                delay: 5000,
                arrows: true,
                indicators: true,
                random: false,
                animationSpeed: '1s'
            });
        </script>
    </div>
    <div class="t_r" style="position:absolute;z-index:1;width:100%;">
        <h2><?php //echo $about_data['event_name']?></h2>
        
    </div>
</div>