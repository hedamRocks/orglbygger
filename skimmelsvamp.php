<?
    session_start();
    $sJson = file_get_contents('backend/json_files/skimmelsvamp.json');
    $billeder = json_decode($sJson, true);
    //shuffle($billeder);

    $imgArray = array("billed1", "billed2", "billed3", "billed4", "billed5", "billed6", "billed7", "billed8", "billed9");
?>
<div class="plain-col full-width section-divider" style="background-image:url(assets/img/orgel.jpg);">
</div>

<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
                    <?
                    if($_SESSION['admin']){
                        ?>
                        <a class="editBtn" href="backend/editor.php?section=skimmelsvamp"><button>Edit</button></a>
                        <?
                    }
                    ?>
                <div class="col-sm-12">
                    <h1><?php echo file_get_contents('backend/text_files/skimmelsvamp/title.txt');?></h1>
                    <blockquote>
                        <div class="stroke"></div>
                        <?php echo file_get_contents('backend/text_files/skimmelsvamp/blockquote.txt');?>
                    </blockquote>
                </div>
                <div class="col-sm-6 plain-text">
                    <p id="velcomeText">
                        <?php echo file_get_contents('backend/text_files/skimmelsvamp/block1.txt');?>
                    </p>
                </div>
                <div class="col-sm-6 plain-text">
                    <p>
                        <?php echo file_get_contents('backend/text_files/skimmelsvamp/block2.txt');?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <?
                    if($_SESSION['admin']){
                ?>
                <button id="addImg" class="editBtn">Tilføj Billede</button>
                <button id="removeImg" class="editBtn">Fjern Billeder</button><button class="editBtn" style="display:none;" id="removeImgDo">Slet</button>
                <br>
                <?
                }
                ?>
                
                <h2><br>Billeder af skimmelsvamp</h2>
                <h3>Her kan du se skimmelsvamp</h3>
                </div>
            </div>
            <div class="row"> 
                <?
                $colCount = 0;
                $i = 1;
                foreach ($billeder as $key => $billede) {
                    if($colCount == 3){
                        $colCount = 0;
                        ?>
                        </div>
                        <div class="row">
                        <?
                    }
                    $colCount++;
                    ?>
                        <div class="col-sm-4 big-pad" syle="position:relative;">
                            <div id="del<?=$key;?>" class="deleteCheck">
                                <h1><span class="glyphicon glyphicon-remove"></span></h1>
                            </div>
                            <div id="img<?=$i;?>" class="plain-col full-width full-height img-link-container full-bg" style="background-image:url(assets/img/skimmelsvamp/<?=$billede['img'];?>)">
                                <img class="full-width full-height" style="display:none;" src="assets/img/skimmelsvamp/<?=$billede['img'];?>">
                                <div class="plain-col full-width full-height img-link">
                                    <div class="heading3 light lighter-text"><?=$billede['title'];?></div>
                                    <div class="heading2 bold white-text"><?=$billede['type'];?></div>
                                    <div class="plain-text white-text">
                                        <?=$billede['desc'];?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    </center>
</div>
<div id="imgPopUp" class="white-text center-text">
    <div id="imgPopUpClose" class="fast-animate">
        <!--<div class="stroke1"></div>
        <div class="stroke2"></div>-->
        <span class="glyphicon glyphicon-remove"></span>
    </div>
    <div id="imgPopUpHead" class="med-pad no-pad-left-right no-pad-top"></div>
    <div>
        <div id="popUpControls">
            <div class="prev fast-animate">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </div>
            <div class="next fast-animate">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
        <div id="imgPopUpContent"></div>
    </div>
    <div id="imgPopUpFoot" class="med-pad no-pad-left-right no-pad-bot"></div>
</div>
<div id="imgUpload">
    <div id="imgUploadClose" class="fast-animate">
        <span class="glyphicon glyphicon-remove"></span>
    </div>
    <form action="backend/upload.php?type=skimmelsvamp" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="title" id="imgTitle" placeholder="Billedtitel" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="type" id="imgType" placeholder="Type (kirke, kapel eller andet)" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="file" class="form-control" name="fileToUpload" placeholder="Billedfil" id="fileToUpload" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="desc" id="imgDesc" placeholder="Beskrivelse" aria-describedby="basic-addon1">
        </div><br>
        <input type="submit" value="Tilføj billede" name="submit">
    </form>
</div>
<div id="deleteResponse">

</div>
<script>
    var maxImages = <?=count($billeder);?>;
    $('.img-link-container').height($('.img-link-container').width());
    var currImg;
    function popUpClose(){
        $('#imgPopUp').slideUp(200);
        currImg='';
        setTimeout(function(){
            $('#imgPopUpContent').html('');
        },200);
    }
    function uploadClose(){
        $('#imgUpload').slideUp(200);
        currImg='';
    }
    function changeImg(imgCont){
        $('#imgPopUpHead').html($('#'+imgCont).find('.heading3').clone().addClass('lighter-text'));
        $('#imgPopUpHead').append($('#'+imgCont).find('.heading2').clone().addClass('red-text'));
        $('#imgPopUpContent').html($('#'+imgCont).find('img').clone().show());
        $('#imgPopUpFoot').html($('#'+imgCont).find('.plain-text').clone());
    }
    $('.img-link-container').click(function(){
        console.log(parseInt($(this).attr('id').replace('img','')));
        console.log(maxImages);
        currImg = parseInt($(this).attr('id').replace('img',''));
        $('#imgPopUpHead').html($(this).find('.heading3').clone());
        $('#imgPopUpHead').append($(this).find('.heading2').clone().addClass('red-text'));
        $('#imgPopUpContent').html($(this).find('img').clone().show());
        $('#imgPopUpFoot').html($(this).find('.plain-text').clone());
        $('#imgPopUp').slideDown(200);
    });
    
    $('#imgPopUpClose').click(function(){
        popUpClose();
    });

    $('#addImg').click(function(){
        $('#imgUpload').slideDown(200);
    });

    $('#imgUploadClose').click(function(){
        uploadClose();
    });
    $('#popUpControls .next').click(function(){
        if(currImg == maxImages){
            currImg = 1;
        }else{
            currImg++;
        }
        var idString = 'img'+currImg;
        changeImg(idString);

    });
    $('#popUpControls .prev').click(function(){
        if(currImg == 1){
            currImg = maxImages;
        }else{
            currImg--;
        }
        var idString = 'img'+currImg;
        changeImg(idString);
    });

    $('#removeImg').click(function(){
        if($(this).hasClass('open')){
            $(this).removeClass('open');
            $(this).text('Fjern Billeder');
            $('.img-link-container').css('pointer-events','all');
            $('.deleteCheck').css('display','none');
            $('#removeImgDo').hide();
            $('.deleteCheck').removeClass('active');
        }else{
            $(this).addClass('open');
            $(this).text('Anuller');
            $('.img-link-container').css('pointer-events','none');
            $('.deleteCheck').css('display','block');
            $('#removeImgDo').show();
        }
    });
    $('.deleteCheck').click(function(){
        $(this).toggleClass('active');
    });
    $('#removeImgDo').click(function(){
        if($('.deleteCheck.active').size()>0){
            var stringArray = '[';
            $('.deleteCheck.active').each(function(i){
                var aNumber = parseInt($(this).attr('id').replace('del',''));
                stringArray += aNumber;
                if(i+1 < $('.deleteCheck.active').size()){
                   stringArray += ','; 
                }
            });
            stringArray += ']';
            console.log(stringArray);
            Ajax('backend/delete_skimmel.php?deleteArray='+encodeURIComponent(stringArray),'deleteResponse');
        }
    });
    $(window).resize(function(){
        $('.img-link-container').height($('.img-link-container').width());
    });
</script>