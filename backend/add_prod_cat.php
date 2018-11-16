    <?
    if($_GET['newCat'] && $_GET['newVal']){

        $sJson = file_get_contents('json_files/prod_cat.json');
        $prodCat = json_decode($sJson, JSON_UNESCAPED_UNICODE);
        $newCat = array('name' => $_GET['newCat'], 'val' => $_GET['newVal']);
        array_push($prodCat, $newCat);
        $aJson = json_encode($prodCat, JSON_UNESCAPED_UNICODE);

        $open = fopen("json_files/prod_cat.json","w+"); 
        $text = $aJson; 
        fwrite($open, $text); 
        fclose($open);

        echo "<b class='green-text'>Kategorien blev tilføjet</b>";
    }else{
        echo "<b class='red-text'>Ingen tekst blev tilføjet</b>";
        echo "<br>".$_GET['newCat']; 
        echo "<br>".$_GET['newVal'];
    }
?>