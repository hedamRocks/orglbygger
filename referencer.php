<?
    session_start();
    $sJson = file_get_contents('backend/json_files/referencer.json');
    $referencer = json_decode($sJson, true);
?>
<div class="plain-col full-width section-divider" style="background-image:url(assets/img/orgel.jpg);">
</div>

<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h1>Referencer</h1>
                    <blockquote>
                        <div class="stroke plain-col"></div>
                        Jeg har i tidens løb været involveret i mange spændende opgaver, nedenstående er derfor kun et lille udvalg.
                        Referencelisten er opdateret 2016
                        Ønsker de yderligere oplysninger, så ring/skriv.
                    </blockquote>
                </div>
                <div class="col-sm-6">
                    <h3>Bemærk:</h3>
                    <p>
                    Det er meget vigtigt at nedenstående referenceliste kun tages vejledende, da nogle af projekterne er udført som ansat i et større firma, og min del i projekterne derfor også er tilsvarende lille.
                    Når jeg har valgt at indskrive sagerne i min referenceliste, er det alene fordi disse projekter har haft min interesse, og således er af betydning for de opgaver, jeg sidenhen som selvstændig har valgt at involvere mig i.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </center>
</div>

<div class="plain-col full-width section-divider" style="background-image:url(assets/img/soerbymagle.JPG);">
</div>

<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
            <?
            if($_SESSION['admin']){
            ?>
                <div class="col-sm-12">
                    <button id="addRef">Tilføj Reference</button>
                </div>
                <b id="actionResponse"></b>
                <b id="refDeleteResponse"></b>
                <div id="refPopUp" style="display:none;">
                    <div id="refPopUpClose" class="fast-animate">
                        <span class="glyphicon glyphicon-remove"></span>
                    </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="text" class="form-control" name="title" id="refTitel" placeholder="Reference titel" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="text" class="form-control" name="desc" id="refDesc" placeholder="Reference beskrivelse" aria-describedby="basic-addon1">
                        </div><br>
                        <button id="addRefBtn" onClick="addReference();">Tilføj reference</button>

                        <h1 id="inputResponse"></h1>
                </div>
            </div>
            <div id="refCont" class="plain-col full-width">
                <div class="row">
            <?
            }
            ?>
            <?
                $colCount = 0;
                $i = 1;
                $script = "var roomInRow = true;";
                foreach ($referencer as $key => $reference) {
                    if($colCount == 2){
                        $colCount = 0;
                        $script = "var roomInRow = true;";
                        ?>
                        </div>
                        <div class="row">
                        <?
                    }else{
                        $script = "var roomInRow = false;";
                    }
                    $colCount++;
                    ?>
                    <div class="col-sm-6">
                        <div class="plain-text gray-text">
                            <div class="plain-col full-width reference">
                                <span class="heading3 red-text"><?=$reference['title'];?></span>
                                <?
                                if($_SESSION['admin']){
                                ?>
                                <span style="opacity:0.6;" id="refDel<?=$key;?>" class="removeRef glyphicon glyphicon-remove red-text small-pad"></span>  
                                <?
                                }
                                ?>
                                <br>- <?=$reference['desc'];?><br>
                            </div>
                        </div>
                    </div>
                    <?
                }
            ?>
            </div>
        </div>
    </div>
    </center>
</div>

<div class="plain-col full-width section-divider" style="background-image:url(assets/img/soerbymagle.JPG);">
</div>

<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Referencer som ansat</h1>
                    <blockquote>
                        <div class="stroke plain-col"></div>
                        Andre orgler jeg har arbejdet med i min tid som ansat.
                        Dem jeg husker og i tilfældig rækkefølge.
                    </blockquote>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h2>Krohn:</h2>
                    <p>
                    - Olaus Petri Ørebro Sverige<br>
                    - Ranum Kirke<br>
                    - Engesvang Kirke<br>
                    - Kildebrønde Kirke<br>
                    - Sct. Olai Kirke Sverige<br>
                    - Johanneskirken Stockholm. <br>
                    - Tibble Kirke Täby Sverige (glaskirken)<br>
                    - Systofte Kirke<br>
                    - Herrup Kirke og igen i 2009<br>
                    - Hallsberg Sverige<br>
                    - Östra Fagelvik Kirke Sverige<br>
                    - Kimmerslev Kirke<br>
                    - Brorstrup Kirke<br>
                    - Gørløse Kirke<br>
                    - Hillerød kirke tidligere Hillerød Kapel<br>
                    - Älmhult Kirke Sverige<br>
                    - Hjallerup Kirke<br>
                    - Sct. Antoni Kbh.<br>
                    - Mosbjerg Kirke<br>
                    - Bjuv Kirke Sverige.<br>
                    - Stenild Kirke<br>
                    - Holeby Kirke<br>
                    - Borris Kirke<br>
                    - Falkerslev Kirke (her er mit svendestykke)<br>
                    - Fåborg Kirke<br>
                    - Ganløse Kirke<br>
                    - Treenighedskirken Esbjerg<br>
                    - Högserød Kirke Sverige<br>
                    - Vetterslev Kirke<br>
                    - Orsa Kirke Dalerne Sverige.<br>
                    </p>
                </div>
                <div class="col-sm-6">
                    <h2>Jensen & Thomsen</h2>
                    <p>
                    - Asferg Kirke<br>
                    - Dragør Kirke Kbh.<br>
                    - Baunekirken Tjørring<br>
                    - Oppe Sundby Kirke<br>
                    - Snesere Kirke <br>
                    - Godthåbskirken Kbh.<br>
                    - Tingbjerg Kirke Kbh.<br>
                    - Dall Kirke.<br>
                    - Fensmark Kirke.<br>
                    - Gladsaxe Kirke Kbh.<br>
                    - Skoven Kirke <br>
                    - Ullerød Kirke<br>
                    - Hørsholm Kirke<br>
                    - Hørsholm Kapel.<br>
                    - Himmelev Kirke<br>
                    - Store Magleby Kirke<br>
                    - Kristrup Kapel<br>
                    - Ålum Kirke<br>
                    - Bjerregrav Kirke<br>
                    - Godsted Kirke<br>
                    - Kokkedal Kirke<br>
                    - Sakskøbing Kapel<br>
                    - Bjergsted Kirke<br>
                    - Gunderslev Kirke<br>
                    - Handrup Kirke<br>
                    - Galten Kirke<br>
                    - Højdevangskirken Kbh.<br>
                    - Vestre fængsel.<br>
                    - Johannes Døber Kbh.<br>
                    - Vindinge Kirke. <br>
                    - Jesuskirken Kbh.  Apostelorglet<br>
                    - Lund Kirke Norge.<br>
                    - Hjelmeland Kirke Norge.<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </center>
</div>
<div id="imgHoverDiv"></div>
<script>
    <?=$script;?>
    function addReference(){
        var refTitle = $('#refTitel').val();
        var refDesc = $('#refDesc').val();
        if($('#refTitel').val().length > 0 && $('#refDesc').val().length > 0){
            Ajax('backend/add_referece.php?refTitle='+encodeURIComponent(refTitle)+'&refDesc='+encodeURIComponent(refDesc), 'actionResponse');
            popUpClose();
            $('#inputResponse').html('');
            if(roomInRow){
                var refBlock = '<div class="col-sm-6">';
                refBlock += '<div class="plain-text gray-text">';
                refBlock += '<div class="plain-col full-width reference">';
                refBlock += '<span class="heading3 red-text">'+refTitle+'</span><br> - '+refDesc+'<br>';
                refBlock += '</div></div></div>';
                
                $( "#refCont .row" ).last().append(refBlock);
                roomInRow = false;
            }else{
                var refBlock = '<div class="row"><div class="col-sm-6">';
                refBlock += '<div class="plain-text gray-text">';
                refBlock += '<div class="plain-col full-width reference">';
                refBlock += '<span class="heading3 red-text">'+refTitle+'</span><br> - '+refDesc+'<br>';
                refBlock += '</div></div></div></div>';
                
                $( "#refCont" ).append(refBlock);

                roomInRow = true;
            }
        }else{
            $('#inputResponse').html('<b class="red-text">Begge felter skal være udfyldt!</b>');
        }

    }
    function deleteRef(div){
        console.log($(div));
        $(div).parent().parent().parent().remove();

        var stringArray = '[';
        var aNumber = parseInt($(div).attr('id').replace('refDel',''));
        stringArray += aNumber;
        stringArray += ']';
        console.log(stringArray);
        Ajax('backend/delete_ref.php?deleteArray='+encodeURIComponent(stringArray),'refDeleteResponse');

    }
    function popUpClose(){
        $('#refPopUp').slideUp(200);
        currImg='';
        setTimeout(function(){
            $('#imgPopUpContent').html('');
        },200);
    }
    $('#refPopUpClose').click(function(){
        popUpClose();

    });

    $('#addRef').click(function(){
        $('#refPopUp').slideDown(200);
    });

    $('.removeRef').hover(function(){
        $(this).css('opacity','1');
    },function(){
        $(this).css('opacity','0.6');
    });
    $('.removeRef').click(function(){
        deleteRef(this);
    });

   /*
    $('.img-icon').hover(function(){
        $('#imgHoverDiv').html($(this).parent().parent().find('img').clone().css('display','block'));
    },function(){
        $('#imgHoverDiv').html('');
    });
    $( ".img-icon" ).mousemove(function( event ) {
        var divTop;
        var divLeft;
        if(event.pageX > $('html').width() / 2){
            console.log('RIGHT');
            divLeft = event.pageX - ($('#imgHoverDiv').width() / 2) - 300;
        }else{
            console.log('LEFT');
            divLeft = event.pageX - 300;
        }
            console.log(event.pageY - $(window).scrollTop());
        if(event.pageY - $(window).scrollTop() < $(window).height() / 2){
            console.log('TOP');
            divTop = event.pageY;
        }else{
            console.log('BOT');
            divTop = event.pageY - $('#imgHoverDiv').height();
        }
        $('#imgHoverDiv').css({'top':divTop , 'left': divLeft});
    });*/
</script>