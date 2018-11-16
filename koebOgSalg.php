<?

    session_start();
    /*
    class Product
    {
        public $title;
        public $desc;
        public $img;
        public $price;
        public $type;
    }

    $p1 = new Product();
    $p1->title = 'VARIO i massiv lys eg';
    $p1->desc = 'bænk';
    $p1->img = 'Vario_Bench_Light.jpg';
    $p1->price = 16.850;
    $p1->type = 'bænk';

    $p2 = new Product();
    $p2->title = 'VARIO i elegant sort finish';
    $p2->desc = '';
    $p2->img = 'Vario_Bench_Black.jpg';
    $p2->price = 16.850;
    $p2->type = 'bænk';

    $p3 = new Product();
    $p3->title = 'VARIO i hvid udgave';
    $p3->desc = 'bænk';
    $p3->img = 'Vario_Bench_White.jpg';
    $p3->price = 16.850;
    $p3->type = 'bænk';

    $p4 = new Product();
    $p4->title = 'VARIO i en spændende rød';
    $p4->desc = 'bænk';
    $p4->img = 'Vario_Bench_Red.jpg';
    $p4->price = 16.850;
    $p4->type = 'bænk';

    $p5 = new Product();
    $p5->title = 'LED Orgelbelysning model 01';
    $p5->desc = 'Diameter på belysningen er 14 mm. Dybden er 250 mm
Teleskopkonstruktion for dybderegulering (minus 50 mm)
Kan leveres i bredder fra 260 mm til 860 mm';
    $p5->img = 'orgel_01.jpg';
    $p5->price = 6.300;
    $p5->type = 'lys';

    $p6 = new Product();
    $p6->title = 'LED Orgelbelysning model 02 - vinklet';
    $p6->desc = 'Diameter på belysningen er 14 mm. Dybden er 250 mm. Højden er 70mm
Teleskopkonstruktion for dybderegulering (minus 40 mm)
Kan leveres i bredder fra 260 mm til 860 mm';
    $p6->img = 'orgel_02.jpg';
    $p6->price = 6.300;
    $p6->type = 'lys';

    $p7 = new Product();
    $p7->title = 'LED Orgelbelysning model 03 - buet';
    $p7->desc = 'Diameter på belysningen er 14 mm. Dybden er 250 mm. Højden er 80mm
Teleskopkonstruktion for dybderegulering (minus 40 mm)
Kan leveres i bredder fra 260 mm til 860 mm';
    $p7->img = 'orgel_03.jpg';
    $p7->price = 6.300;
    $p7->type = 'lys';

    $p8 = new Product();
    $p8->title = 'LED Orgelbelysning model 04';
    $p8->desc = 'Denne smukke belysning kan umiddelbart monteres på bagsiden af et nodestativ
Diameter på belysningen er 14 mm. Højden er 450 mm. Dybden er 200 mm
Kan leveres i bredder fra 360 mm til 860 mm';
    $p8->img = 'orgel_04.jpg';
    $p8->price = 6.300;
    $p8->type = 'lys';

    $p9 = new Product();
    $p9->title = 'LED Orgelbelysning model 05 - vinklet';
    $p9->desc = 'Belysningen monteres på spillebord med udhæng over nodestativ
Diameter på belysningen er 14 mm. Højden er 530 mm. Dybden er 320 mm.
Gevind på 35 mm. Kan leveres i bredderne 560 mm til 960 mm';
    $p9->img = 'orgel_05.jpg';
    $p9->price = 6.300;
    $p9->type = 'lys';

    $p10 = new Product();
    $p10->title = 'LED Orgelbelysning model 07 - buet';
    $p10->desc = 'Belysningen monteres på spillebord med udhæng over nodestativ
Diameter på belysningen er 14 mm. Højden er 530 mm. Dybden er 220 mm. 
Gevind på 35 mm. Kan leveres i bredderne 560 mm til 960 mm';
    $p10->img = 'orgel_07.jpg';
    $p10->price = 6.300;
    $p10->type = 'lys';

    $p11 = new Product();
    $p11->title = 'LED Orgelbelysning model 09';
    $p11->desc = 'Belysningen monteres på spillebord med lille udhæng over nodestativ
Diameter på belysningen er 14 mm. Højden er 460 mm. Dybden er 50 mm. 
Gevind på 35 mm. Kan leveres i bredderne 630 mm og 730 mm';
    $p11->img = 'orgel_09.jpg';
    $p11->price = 6.300;
    $p11->type = 'lys';


    $products = array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11);
    $sJson = "[";
    $itterator = 0;
    foreach ($products as $product) {
        $itterator++;
        $sJson .= '{"title":"'.$product->title.'", "type":"'.$product->type.'", "desc":"'.$product->desc.'", "img":"'.$product->img.'", "price":"'.$product->price.'"}';
        if($itterator != count($products)){
            $sJson .= ',';
        }
    }
    $sJson .= "]";

    $open = fopen("backend/text_files/produkter.txt","w+"); 
    $text = $sJson; 
    fwrite($open, $text); 
    fclose($open);

    echo '<div class="plain-col full-width white big-pad">'.$sJson.'</div>';*/
    //$imgArray = array("billed1", "billed2", "billed3", "billed4", "billed5", "billed6", "billed7", "billed8", "billed9");

    $sJson = file_get_contents('backend/json_files/produkter.json');
    $produkter = json_decode($sJson, true);

    $sJson2 = file_get_contents('backend/json_files/prod_cat.json');
    $kategorier = json_decode($sJson2, true);
?>
<div class="plain-col full-width section-divider" style="background-image:url(assets/img/orgel.jpg);">
</div>
<div class="plain-col full-width content-container">
    <center>
    <div class="content-container-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                <?
                    if($_SESSION['admin']){
                ?>
                    <button id="addImg" class="editBtn">Tilføj Produkt</button>
                    <button id="removeImg" class="editBtn">Fjern Produkt</button><button class="editBtn" style="display:none;" id="removeImgDo">Slet</button>
                    <br>
                    <?
                }
                ?>
                    <h1><br>Køb & salg</h1>
                    <blockquote>
                        <div class="stroke plain-col"></div>
                        <span id="cat_title"></span>
                    </blockquote>
                </div>
            </div>
            <div class="row">
                <div id="prod-wrap" class="col-sm-9">
                    <div class="row">
                        <?  
                            $prodCount = 0;
                            foreach ($produkter as $key => $produkt) {
                                $prodCount++;
                                ?>
                                <div class="col-sm-4 big-pad <?=$produkt['type'];?> fast-animate">
                                    <div id="del<?=$key;?>" class="deleteCheck">
                                        <h1><span class="glyphicon glyphicon-remove"></span></h1>
                                    </div>
                                    <div id="product<?=$prodCount;?>" class="plain-col full-width full-height product-container full-bg" style="background-image:url(assets/img/products/<?=$produkt['img'];?>)">
                                        <img class="full-width full-height" style="display:none;" src="assets/img/products/<?=$produkt['img'];?>">
                                        <div class="plain-col full-width full-height img-link">
                                            <div class="heading3 light lighter-text"><?=$produkt['title'];?></div>
                                            <div class="plain-text white-text overme">
                                                <?=$produkt['desc'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                        ?>
                    </div>
                </div>
                <div id="prod-cat" class="col-sm-3 ">
                    <h3>Produkt kategorier</h3>
                    
                    <div id="prod-cat-content">
                        <?
                        $i = 0;
                        foreach ($kategorier as $key => $kategori) {
                            ?>
                                <div class="plain-col full-width oneCat">
                                    <div class="plain-col med-pad no-pad-bot cat" id="<?=$kategori['val'];?>_cat" style="width:calc(100% - 32px);">
                                        <p class="bolder red-text"><b><?=$kategori['name'];?></b>
                                        </p>
                                    </div>
                                    <?if($_SESSION['admin']){?> <div class="plain-col"><span style="float:right;opacity:0.6;" id="catDel<?=$key;?>" class="removeCat glyphicon glyphicon-remove red-text small-pad"></span></div><?}?>
                                </div>
                            <?
                            $i++;
                        }?>
                    </div>
                    <?
                    if($_SESSION['admin']){
                    ?>
                        <button id="addCat" class="editBtn" style="margin-top:15px;">Tilføj Produktkategori</button>
                        <input type="text" id="catInput" style="display:none; margin-top:15px;" placeholder="kategori navn"><button id="catInputBtn" class="editBtn" style="display:none;margin-top:15px;">Tilføj</button>
                        <div id="catDeleteResponse">

                        </div>
                        <?
                    }
                    ?>
                </div>
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
    <form action="backend/upload.php?type=prod" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="title" id="imgTitle" placeholder="Titel" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <select class="form-control" name="type" id="imgType" placeholder="Produktkategori">
                <?foreach ($kategorier as $kategori) {?>
                    <option value="<?=$kategori['val'];?>"><?=$kategori['name'];?></option>
                <?}?>
            </select>
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="desc" id="imgDesc" placeholder="Beskrivelse" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" name="price" id="imgPrice" placeholder="Pris" aria-describedby="basic-addon1">
        </div><br>
        <input type="submit" value="Tilføj produkt" name="submit">
    </form>
</div>
<div id="deleteResponse">

</div>
<script>
function deleteProdCat(div){
        console.log($(div));
        $(div).parent().parent().remove();

        var stringArray = '[';
        var aNumber = parseInt($(div).attr('id').replace('catDel',''));
        stringArray += aNumber;
        stringArray += ']';
        console.log(stringArray);
        Ajax('backend/delete_prod_cat.php?deleteArray='+encodeURIComponent(stringArray),'catDeleteResponse');

}
var jsonArray = <?=json_encode($produkter, JSON_FORCE_OBJECT);?>;
$('.product-container').height($('.product-container').width());
    //console.log(JSON.stringify(jsonArray));
    var maxImages = <?=count($produkter);?>;
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
        $('#imgPopUpHead').html($('#'+imgCont).find('.heading3').clone().addClass('red-text'));
        $('#imgPopUpContent').html($('#'+imgCont).find('img').clone().show());
        $('#imgPopUpFoot').html($('#'+imgCont).find('.plain-text').clone().removeClass('overme'));
    }
    $('.product-container').click(function(){
        console.log(parseInt($(this).attr('id').replace('product','')));
        console.log(maxImages);
        currImg = parseInt($(this).attr('id').replace('product',''));
        $('#imgPopUpHead').html($(this).find('.heading3').clone().addClass('red-text'));
        $('#imgPopUpContent').html($(this).find('img').clone().show());
        $('#imgPopUpFoot').html($(this).find('.plain-text').clone().removeClass('overme'));
        $('#imgPopUp').slideDown(200);
    });
    $('#imgPopUpClose').click(function(){
        popUpClose();
    });
    $('#popUpControls .next').click(function(){
        if(currImg == maxImages){
            currImg = 1;
        }else{
            currImg++;
        }
        var idString = 'product'+currImg;
        changeImg(idString);

    });
    $('#popUpControls .prev').click(function(){
        if(currImg == 1){
            currImg = maxImages;
        }else{
            currImg--;
        }
        var idString = 'product'+currImg;
        changeImg(idString);
    });/*
    $('.cat').click(function(){
        var id= $(this).attr('id');
        if(id == 'cat0'){
            $('.bænk').show();
            $('.lys').show();
            $('.orgel').show();
        }
        else if(id == 'cat1'){
            $('.lys').hide();
            $('.bænk').show();
            $('.orgel').hide();
        }else if(id == 'cat2'){
            $('.bænk').hide();
            $('.lys').show();
            $('.orgel').hide();
        }else if(id == 'cat3'){
            $('.lys').hide();
            $('.bænk').hide();
            $('.orgel').show();
        }
    });*/
    $('#cat0').click(function(){
        <?
        foreach ($kategorier as $andreKategori) {
            ?>
                $('.<?=$andreKategori['val'];?>').show();
            <?
        }
        ?>
    });
    <?
    foreach ($kategorier as $kategori) {
        ?>
            $('#<?=$kategori['val'];?>_cat').click(function(){
                <?
                foreach ($kategorier as $andreKategori) {
                    ?>
                        $('.<?=$andreKategori['val'];?>').hide();
                    <?
                }
                ?>
                $('.<?=$kategori['val'];?>').show();
                $('#cat_title').html($(this).text());
            });
        <?
    }
    ?>
    $('#addImg').click(function(){
        $('#imgUpload').slideDown(200);
    });
    $('#imgUploadClose').click(function(){
        uploadClose();
    });
    $('#removeImg').click(function(){
        if($(this).hasClass('open')){
            $(this).removeClass('open');
            $(this).text('Fjern Billeder');
            $('.product-container').css('pointer-events','all');
            $('.deleteCheck').css('display','none');
            $('#removeImgDo').hide();
            $('.deleteCheck').removeClass('active');
        }else{
            $(this).addClass('open');
            $(this).text('Anuller');
            $('.product-container').css('pointer-events','none');
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
            Ajax('backend/delete_product.php?deleteArray='+encodeURIComponent(stringArray),'deleteResponse');
        }
    });
    $(window).resize(function(){
        $('.product-container').height($('.product-container').width());
    });
    $('#addCat').click(function(){
        $(this).hide();
        $('#catInput').show();
        $('#catInputBtn').show();
    });
    $('#catInputBtn').click(function(){
        var newCat = $('#catInput').val();
        var str = "Sonic Free Games";
        var newVal = newCat.replace(/\s+/g, '_').toLowerCase();
        var newNumber = $('#prod-cat-content .oneCat').length;
        if(newCat.length > 0){
            var newBlock = '<div class="plain-col full-width oneCat"><div class="plain-col med-pad no-pad-bot cat" style="width: calc(100% - 32px);" id="'+newCat+'_cat">';
            newBlock += '<p class="bolder red-text"><b>'+newCat+'</b></p></div>';
            newBlock += '<div class="plain-col"><span style="float:right;opacity:0.6;" id="catDel'+newNumber+'" class="removeCat glyphicon glyphicon-remove red-text small-pad"></span></div>';
            newBlock += '</div>';


            $('#prod-cat-content').append(newBlock);

            $('#'+newCat+'_cat').click(function(){
                <?
                foreach ($kategorier as $andreKategori) {
                    ?>
                        $('.<?=$andreKategori['val'];?>').hide();
                    <?
                }
                ?>
                $('.'+newCat).show();
            });
            $('.removeCat').hover(function(){
                $(this).css('opacity','1');
            },function(){
                $(this).css('opacity','0.6');
            });
            $('.removeCat').click(function(){
                deleteProdCat(this);
            });

            $('#addCat').show();
            $('#catInput').val('');
            $('#catInput').hide();
            $('#catInputBtn').hide();
            var eUrl = 'backend/add_prod_cat.php?newCat='+encodeURIComponent(newCat)+'&newVal='+encodeURIComponent(newVal);
            Ajax(eUrl,'catDeleteResponse');
        }

    });
    $('.removeCat').hover(function(){
        $(this).css('opacity','1');
    },function(){
        $(this).css('opacity','0.6');
    });
    $('.removeCat').click(function(){
        deleteProdCat(this);
    });
    $('#orgel_cat').click();
</script>