<?php
    session_start();
    $sJson = file_get_contents('backend/json_files/slides.json');
    $slides = json_decode($sJson, true);
    shuffle($slides);
    
?>

<div id="custSlider">
    <?
    if($_SESSION['admin']){
        ?>
        <a class="editBtn" href="backend/slide_editor.php"><button id="editSlideBtn">Rediger Billeder</button></a>
        <?
    }
    ?>
    <div id="sliderControls" class="white-text mobileOff">
        <div id="prevBtn" onClick="prevSlide();" class="plain-col slider-btn">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </div>
        <div id="nextBtn" onClick="nextSlide();" class="plain-col-right slider-btn">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </div>
    </div>
    <div id="custSliderInner"class="full-height white-text center-text">
    <?  
        if(count($slides) == 2){
            for($i = 0; $i <= 1; $i++){
                ?><script>console.log(<?=$i;?>)</script><?
                foreach ($slides as $slide) {
                    ?>
                    <script>console.log('slide');</script>
                        <div id="<?=$slide['name'];?>" class="sliderBlock custom-col full-height" style="background-image:url(assets/img/slider/<?=$slide['img'];?>)">
                            <?
                            if(ctype_space($slide['desc'])){
                            ?>
                                <div class="slider-text">
                                    <div class="heading3 light lighter-text"><?=$slide['title'];?></div>
                                    <div class="heading2 bold white-text"><?=$slide['type'];?></div>
                                    <div class="plain-text">
                                        <?=$slide['desc'];?> 
                                    </div>
                                </div>
                            <?
                            }
                            ?>
                        </div>
                    <?
                }
            }
        }elseif(count($slides) == 1){
            for($i = 0; $i <= 2; $i++){
                ?><script>console.log(<?=$i;?>)</script><?
                foreach ($slides as $slide) {
                    ?>
                    <script>console.log('slide');</script>
                        <div id="<?=$slide['name'];?>" class="sliderBlock custom-col full-height" style="background-image:url(assets/img/slider/<?=$slide['img'];?>)">
                            <?
                            if(ctype_space($slide['desc'])){
                            ?>
                                <div class="slider-text">
                                    <div class="heading3 light"><?=$slide['title'];?></div>
                                    <div class="heading2 bold"><?=$slide['type'];?></div>
                                    <div class="plain-text">
                                        <?=$slide['desc'];?> 
                                    </div>
                                </div>
                            <?
                            }
                            ?>
                        </div>
                    <?
                }
            }
        }else{

            foreach ($slides as $slide) {
                ?>
                    <div id="<?=$slide['name'];?>" class="sliderBlock custom-col full-height" style="background-image:url(assets/img/slider/<?=$slide['img'];?>)">
                        <?
                        if(ctype_space($slide['desc'])){
                        ?>
                        <div class="slider-text">
                            <div class="heading3 light"><?=$slide['title'];?></div>
                            <div class="heading2 bold"><?=$slide['type'];?></div>
                            <div class="plain-text">
                                <?=$slide['desc'];?> 
                            </div>
                        </div>
                        <?
                        }
                        ?>
                    </div>
                <?
            }
        }
    ?>
    </div>
</div>
<script>
var autoSlideTimer;
var sliderLength = 100 * <?=count($slides);?>;
if(sliderLength == 100){
    sliderLength = 300;
}
if(sliderLength == 200){
    sliderLength = 400;
}
console.log(sliderLength);
$('#custSliderInner').css('width', sliderLength+'%');
function autoSlide(){
    nextSlide();
    autoSlideTimer = setTimeout(function(){autoSlide();},5000);
}
function nextSlide(){
    $('#custSliderInner').animate({'margin-left':'-200%'},500);
    setTimeout(function(){
        var tempBlock = $('.sliderBlock').first();
        $('#custSliderInner').append(tempBlock);
        //$('.sliderBlock').first().remove();
        
        $('#custSliderInner').animate({'margin-left':'-100%'},0);
    },500);
    //clearTimeout(autoSlideTimer);
    //autoSlideTimer = setTimeout(function(){autoSlide();},5000);
}
function prevSlide(){
    $('#custSliderInner').animate({'margin-left':'0%'},500);
    setTimeout(function(){
        var tempBlock = $('.sliderBlock').last();
        $('#custSliderInner').prepend(tempBlock);
        //$('.sliderBlock').first().remove();
        
        $('#custSliderInner').animate({'margin-left':'-100%'},0);
    },500);
    //clearTimeout(autoSlideTimer);
    //autoSlideTimer = setTimeout(function(){autoSlide();},5000);
}
$('#custSlider').hover(function(){
    console.log('ON');
    clearTimeout(autoSlideTimer);
},function(){
    console.log('OFF');
    autoSlideTimer = setTimeout(function(){autoSlide();},5000);
})
autoSlideTimer = setTimeout(function(){autoSlide();},5000);


    /*
    var isIOS = /iPad|iPhone|iPod/.test(navigator.platform);

    if (isIOS) {

        var canvasVideo = new CanvasVideoPlayer({
            videoSelector: '.video',
            canvasSelector: '.canvas',
            timelineSelector: false,
            autoplay: true,
            makeLoop: true,
            pauseOnClick: false,
            audio: false
        });
        
    }else {
        
        // Use HTML5 video
        document.querySelectorAll('.canvas')[0].style.display = 'none';
        
    }*/
    
    var left = 0;
    $(window).scroll(function(){
        left = $('body').scrollTop()/100;
        $('#custSlider').css('opacity' , 1 - (left/10));
        $('#custSlider').css('margin-left' , -10 + (left*2) + '%');
        $('#custSlider').css('width' , 120 - (left*4) + '%');
        $('#section').css('top',(($('body').scrollTop()-$(window).height())*-1)/2);
    });
</script>