<? 
session_start();
/*if($_GET['admin']){
    $_SESSION['admin']=true;
}*/
$sJson = file_get_contents('backend/text_files/slides.txt');
$slides = json_decode($sJson, true);

if($_GET['from']){
    $script = "Ajax('".$_GET['from'].".php','main-content');";
    $script .= 'window.history.pushState("object or string", "Title", window.location.href.substring(window.location.href.lastIndexOf("/") + 1).split("?")[0]);';
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Orgelbygger.dk</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<!--STYLESHEETS-->
		<link href='assets/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
		<link href='assets/css/style.css?n=4' type='text/css' rel='stylesheet'>
		<link href='assets/css/breakpoints.css' type='text/css' rel='stylesheet'>
		<link href='assets/css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<!-- SCRIPTS-->
		<script src="assets/js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js?n=1" type="text/javascript"></script>
		<script src="assets/js/script.js?n=2" type="text/javascript"></script>
		<script src="assets/js/canvas-video-player.js?n=1" type="text/javascript"></script>
		<!--FONTS-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	</head>
	<body class="black">
        <?
            if($_SESSION['admin']){
        ?>
            <a href="login/logout.php"><button id="logoutBtn" class="red white-text">LOGOUT</button></a>
        <?
            }
        ?>
        <div id="mobileHeader" class="big-pad mobileOn">
            <div id="mobileLogo" class="plain-col full-height">
                <img src="assets/img/logo_light.png" style="height:100%;">
            </div>
            <div id="mobileMenuBtn" class="faster-animate" style="display: block;">
                <div id="mStroke1" class="fast-animate" style="background: white;"></div>
                <div id="mStroke2" class="fast-animate" style="background: white;"></div>
                <div id="mStroke3" class="fast-animate" style="background: white;"></div>
            </div>
            <div id="mobileMenu" class="white-text plain-col-right big-pad" style="display:none;">

                <div class="plain-col"><h3 class="lighter-text">Menu</h3></div>

                <div class="menu-item plain-col big-pad full-width" onClick="location.reload();closeMenu();">FORSIDE</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('firmaprofil.php','main-content');closeMenu();">FIRMAPROFIL</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('billeder.php','main-content');closeMenu();">BILLEDER</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('referencer.php','main-content');closeMenu();">REFFERENCER</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('koebOgSalg.php','main-content');closeMenu();">KØB & SALG</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('skimmelsvamp.php','main-content');closeMenu();">SKIMMELSVAMP</div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('kontakt.php','main-content');closeMenu();">KONTAKT</div>
                
            </div>
        </div>
        <div id="header" class="gray no-pad left mobileOff">
            <div id="logo" class="white plain-col full-width big-pad">
                <div class="plain-col full-width big-pad no-pad-bot">
                    <img src="assets/img/logo_dark.png" style="width:60%;">
                </div>
            </div>
            <div id="menu" class="plain-col white-text big-pad full-width">
                <div class="plain-col"><h3 class="lighter-text">Menu</h3></div>

                <div class="menu-item plain-col full-width big-pad" onClick="location.reload();">
                    <div class="register active fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text active fast-animate plain-col">FORSIDE</div>
                </div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('firmaprofil.php','main-content');">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col">FIRMAPROFIL</div>
                </div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('billeder.php','main-content');">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col">BILLEDER</div>
                </div>
                <div class="menu-item plain-col big-pad full-width" onClick="Ajax('referencer.php','main-content');">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col">REFFERENCER</div>
                </div>
                <div class="menu-item plain-col big-pad full-width">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col" onClick="Ajax('koebOgSalg.php','main-content');closeMenu();">KØB & SALG</div>
                </div>
                
                <div class="menu-item plain-col big-pad full-width">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col" onClick="Ajax('skimmelsvamp.php','main-content');closeMenu();">SKIMMELSVAMP</div>
                </div>

                <div class="menu-item plain-col big-pad full-width">
                    <div class="register fast-animate">
                        <div class="neck"></div>
                        <div class="head"></div>
                    </div>
                    <div class="menu-item-text fast-animate plain-col" onClick="Ajax('kontakt.php','main-content');closeMenu();">KONTAKT</div>
                </div>
            </div><!--
            <div id="sub_menu" class="plain-col white-text big-pad full-width">
                <div class="plain-col"><h3 class="lighter-text">Links</h3></div>

                <div class="menu-item plain-col full-width big-pad no-pad-left-right"  onclick="window.open('http://www.sarastro.dk/orgel.htm','_blank');">
                    <img class="link-box-icon plain-col" src="assets/img/icons/history_icon.png" style="height:30px;">
                    <div class="menu-item-text white-text active fast-animate plain-col" style="padding: 8px 10px;">Orglets historie</div>
                </div>
                <div class="menu-item plain-col full-width big-pad no-pad-left-right"  onClick="Ajax('saadanVirkerOrglet.php','main-content');">
                    <img class="link-box-icon plain-col" src="assets/img/icons/organ_icon.png" style="height:30px;">
                    <div class="menu-item-text white-text active fast-animate plain-col" style="padding: 8px 10px;">Sådan virker orglet</div>
                </div>
                <div class="menu-item plain-col full-width big-pad no-pad-left-right" onClick="Ajax('enAegteOrgelGyser.php','main-content');" >
                    <img class="link-box-icon plain-col" src="assets/img/icons/ghost_icon.png" style="height:30px;">
                    <div class="menu-item-text white-text active fast-animate plain-col" style="padding: 8px 10px;">En ægte orgelgyser</div>
                </div>
                <div class="menu-item plain-col full-width big-pad no-pad-left-right" onClick="Ajax('snittegninger.php','main-content');">
                    <img class="link-box-icon plain-col" src="assets/img/icons/draw_icon.png" style="height:30px;">
                    <div class="menu-item-text white-text active fast-animate plain-col" style="padding: 8px 10px;">Snittegninger</div>
                </div>
            </div>-->
        </div>
        <div id="header" class="black big-pad" style="display:none;">
            <div id="logo" class="plain-col full-height">
                <img src="assets/img/logo_light.png" style="height:100%;">
            </div>
            <div id="menu" class="white-text plain-col-right">
                <div class="menu-item plain-col big-pad" onClick="location.reload();">FORSIDE</div>
                <div class="menu-item plain-col big-pad" onClick="Ajax('firmaprofil.php','main-content');">FIRMAPROFIL</div>
                <div class="menu-item plain-col big-pad" onClick="Ajax('billeder.php','main-content');">BILLEDER</div>
                <div class="menu-item plain-col big-pad" onClick="Ajax('referencer.php','main-content');">REFFERENCER</div>
                <div class="menu-item plain-col big-pad">KØB & SALG</div>
            </div>
        </div>
        <div id="main-content" class="left">
            <?php include 'slider.php';?>
            
            <div id="content" class="content-container">
                <center>
                <div class="content-container-inner">
                    <div class="container-fluid">
                        <div class="row" style="margin: -140px 0px 50px 0px;">
                            <div class="col-sm-3">
                                <div class="link-box plain-col full-width white big-pad">
                                    <center>
                                        <img class="link-box-icon" src="assets/img/icons/history_icon.png">
                                        <h3 class="overme">Orglets historie</h3>
                                        <div class="slider-text-link fastest-animate" style="float: initial;" onclick="window.open('http://www.sarastro.dk/orgel.htm','_blank');">
                                            VIS MERE <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="link-box plain-col full-width white big-pad">
                                    <center>
                                        <img class="link-box-icon" src="assets/img/icons/organ_icon.png">
                                        <h3 class="overme">Sådan virker Orglet</h3>
                                        <div class="slider-text-link fastest-animate" onClick="Ajax('saadanVirkerOrglet.php','main-content');" style="float: initial;">
                                            VIS MERE <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="link-box plain-col full-width white big-pad">
                                    <center>
                                        <img class="link-box-icon" src="assets/img/icons/ghost_icon.png">
                                        <h3 class="overme">En ægte orgelgyser</h3>
                                        <div class="slider-text-link fastest-animate" onClick="Ajax('enAegteOrgelGyser.php','main-content');" style="float: initial;">
                                            VIS MERE <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="link-box plain-col full-width white big-pad">
                                    <center>
                                        <img class="link-box-icon" src="assets/img/icons/draw_icon.png">
                                        <h3 class="overme">Snittegninger</h3>
                                        <div class="slider-text-link fastest-animate" onClick="Ajax('snittegninger.php','main-content');" style="float: initial;">
                                            VIS MERE <span class="glyphicon glyphicon-chevron-right"></span>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <?
                                if($_SESSION['admin']){
                                    ?>
                                    <a class="editBtn" href="backend/editor.php?section=velkommen"><button>Edit</button></a>
                                    <?
                                }
                                ?>
                            <div class="col-sm-12">
                                <h1><?php echo file_get_contents('backend/text_files/velkommen/title.txt');?></h1>
                                <blockquote>
                                    <div class="stroke"></div>
                                    <?php echo file_get_contents('backend/text_files/velkommen/blockquote.txt');?>
                                </blockquote>
                            </div>
                            <div class="col-sm-6 plain-text">
                                <p id="velcomeText">
                                    <?php echo file_get_contents('backend/text_files/velkommen/block1.txt');?>
                                </p>
                            </div>
                            <div class="col-sm-6 plain-text">
                                <p>
                                    <?php echo file_get_contents('backend/text_files/velkommen/block2.txt');?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </center>
            </div>
        </div>
        
        <div id="footer" class="plain-col full-width big-pad right-text black">
            <p class="white-text">Orgelbygger Sven Hjorth <span class="mobileOn"><br></span>- Andersen. Tlf: <a class="lighter-text" href="tel:+4540876829">+45 40 87 68 29</a> <span class="mobileOn"><br></span>- E-mail: <a class="lighter-text" href="mailto:hjorth@post11.tele.dk" target="_top">hjorth@post11.tele.dk</a> ©</p>
            <img src="http://www.zipstat.dk/cgi-bin/zipstat/zipstat.cgi2?brugernavn=hjorth&version=150&ssto=1920x1080&referer=&colors=24&java=true&js=true&billed=trans">
        </div>
        <!-- 
        <div class="container-fluid no-pad">
            <div class="row no-pad">
                <div class="col-sm-12"></div>
            </div>
            <div class="row no-pad">
                <div class="col-sm-12"></div>
            </div>
            <div class="row no-pad">
                <div class="col-sm-12"></div>
        </div>
        -->
        </div>
        <script>
        <?=$script;?>
        setupCustomCols();
        
            
            $('#mobileMenuBtn').click(function(){
                $(this).find('div').toggleClass('open');
                $('#mobileMenu').stop().slideToggle(200);
            });

            $('.menu-item').click(function(){
                console.log('click');
                $('.menu-item').find('.register').removeClass('active');
                $('.menu-item').find('.menu-item-text').removeClass('active');
                $(this).find('.register').addClass('active');
                $(this).find('.menu-item-text').addClass('active');    
            });
        </script>
    </body>
</html>