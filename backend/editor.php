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
		<link href='editor.css' type='text/css' rel='stylesheet'>
		<!-- SCRIPTS-->
		<script src="../assets/js/jquery-1.12.3.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/script.js?n=1" type="text/javascript"></script>
		<script src="../assets/js/canvas-video-player.js?n=1" type="text/javascript"></script>

        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		
        <script src="editor.js?n=1" type="text/javascript"></script>
		<!--FONTS-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	</head>
	<body class="white">
        <?
            $section = $_GET['section'];
        ?>
        <div id="content" class="content-container">
                <center>
                <div class="content-container-inner">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 id="editor_title" class="editor" contenteditable="true">
                                    <?php echo file_get_contents('text_files/'.$section.'/title.txt');?>
                                </h1>
                                <blockquote id="editor_block" class="editor" contenteditable="true">
                                    <div class="stroke"></div>
                                    <?php echo file_get_contents('text_files/'.$section.'/blockquote.txt');?>
                                </blockquote>
                            </div>
                            <div class="col-sm-12 no-pad">
                                <div class="plain-col full-width big-pad gray">
                                    <select id="headingSelect">
                                        <option value="h1">Heading 1</option>
                                        <option value="h2">Heading 2</option>
                                        <option value="h3">Heading 3</option>
                                        <option value="blockquote">Block quote</option>
                                        <option value="p">Normal text</option>
                                    </select>
                                    <button class="small-pad" id="boldText"><span class="glyphicon glyphicon-bold"></span></button>
                                    <button class="small-pad" id="cursiveText"><b><span class="glyphicon glyphicon-italic"></span></b></button>

                                    <button class="small-pad" id="addLink"><b><span class="glyphicon glyphicon-link"></span></b></button>
                                    <?
                                    if($_GET['section']=='skimmelsvamp'){
                                    ?>
                                        <a href="../index.php?from=skimmelsvamp" style="float:right;"><button class="editBtn small-pad">Tilbage til skimmelsvamp</button></a>
                                    <?
                                    }else{
                                    ?>
                                        <a href="../index.php" style="float:right;"><button class="editBtn small-pad">Tilbage til forside</button></a>
                                    <?
                                    }
                                    ?>
                                    <button id="saveChanges" class="small-pad" style="float:right;" onClick="saveChanges('<?=$section;?>');">Save Changes</button>
                                </div>

                                <div id="link-set-popup" class="plain-col full-width darker big-pad no-pad-top" style="display:none;">
                                    <div class="col-sm-5 no-pad-bot">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Tekst</span>
                                            <input id="linkTextInput" class="form-control" placeholder="Link adresse" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 no-pad-bot">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Link</span>
                                            <input id="linkInput" class="form-control" placeholder="Link adresse" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 no-pad-bot">
                                        <button class="med-pad full-width" onClick="addLinkFunction();">Indsæt</button>
                                    </div>
                                </div>
                                <div id="img-set-popup" style="display:none;"></div>
                            </div>
                            <div class="col-sm-6 editor plain-text" id="editor_1" contenteditable="true">
                                <?php echo file_get_contents('text_files/'.$section.'/block1.txt');?>
                            </div>
                            <div class="col-sm-6 editor plain-text" id="editor_2" contenteditable="true">
                                <?php echo file_get_contents('text_files/'.$section.'/block2.txt');?>
                            </div>
                        </div>
                    </div>
                </div>
                </center>
            </div>

        <h1 id="editResponse"></h1>
        
    </body>
</html>

