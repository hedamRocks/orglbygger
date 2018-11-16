<?php
    session_start();
    $sJson = file_get_contents('json_files/slides.json');
    $slides = json_decode($sJson, true);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Orgelbygger.dk</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<!--STYLESHEETS-->
		<link href='../assets/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
		<link href='../assets/css/style.css' type='text/css' rel='stylesheet'>
		<link href='../assets/css/breakpoints.css' type='text/css' rel='stylesheet'>
		<link href='../assets/css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<!-- SCRIPTS-->
		<script src="../assets/js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/script.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/canvas-video-player.js?n=1" type="text/javascript"></script>

        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		
		<!--FONTS-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	</head>
	<body class="white">
        <a href="login/logout.php"><button id="logoutBtn" class="red white-text">LOGOUT</button></a>
        <div id="content" class="content-container">
                <center>
                <div class="content-container-inner">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 id="editor_title" class="editor" contenteditable="true">
                                    Rediger forsidebilleder
                                </h1>
                            </div>
                            <?
                            if($_SESSION['admin']){
                            ?>
                                <div class="col-sm-12">
                                    <a href="../index.php"><button id="addImg" class="editBtn">Tilbage til forside</button></a>
                                    <button id="addImg" class="editBtn">Tilføj forsidebillede</button>
                                    <button id="removeImg" class="editBtn">Fjern forsidebilleder</button><button class="editBtn" style="display:none;" id="removeImgDo">Slet</button>
                                </div>
                            <?
                            }
                            ?>
                        </div>
                        <?  
                            $i = 1;
                            foreach ($slides as $slide) {
                                ?>
                                    <div class="row sliderBlock" style="margin-bottom:50px;">
                                        <div class="col-sm-12">
                                            <h2 class="sliderName"><?=$slide['name'];?></h2>
                                        </div>
                                        <div class="col-sm-12 no-pad full-bg" style="height:300px; background-position:center; background-image:url(../assets/img/slider/<?=$slide['img'];?>)">
                                            <div id="del<?=$i;?>" class="deleteCheck">
                                                <h1><span class="glyphicon glyphicon-remove"></span></h1>
                                            </div>
                                            <div class="slider-text white-text">
                                                <div class="heading3 light lighter-text"><?=$slide['title'];?></div>
                                                <div class="heading2 bold white-text"><?=$slide['type'];?></div>
                                                <div class="plain-text">
                                                    <?=$slide['desc'];?> 
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
                </center>
            </div>

        <h1 id="deleteSlideResponse"></h1>
        <div id="imgUploadSlide">
            <div id="imgUploadSlideClose" class="fast-animate">
                <span class="glyphicon glyphicon-remove"></span>
            </div>
            <form action="upload.php?type=slide" method="post" enctype="multipart/form-data">
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
                <input type="submit" value="Tilføj forsidebillede" name="submit">
            </form>
        </div>
        <script>
            function uploadSlideClose(){
                console.log('yaaay');
                $('#imgUploadSlide').slideUp(200);
                currImg='';
            }
            $('#imgUploadSlideClose').click(function(){
                uploadSlideClose();
            });

            $('#addImg').click(function(){
                $('#imgUploadSlide').slideDown(200);
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
                        stringArray += aNumber - 1;
                        if(i+1 < $('.deleteCheck.active').size()){
                        stringArray += ','; 
                        }
                    });
                    stringArray += ']';
                    console.log(stringArray);
                    //Ajax('delete_slide.php?deleteArray='+stringArray,'deleteSlideResponse');
                    window.location.assign("delete_slide.php?deleteArray="+stringArray);
                }
            });
        </script>
    </body>
</html>

