    <?
        $arrKey = $_POST['arrPlace'];
        $newTitle = $_POST['title'];
        $newType = $_POST['type'];
        $newDesc = $_POST['desc'];
        if($arrKey){
            $sJson = file_get_contents('json_files/billeder.json');
            $prodCat = json_decode($sJson, JSON_UNESCAPED_UNICODE);
            if($newTitle){
                $prodCat[$arrKey]['title'] = $newTitle;
            }else{
                $prodCat[$arrKey]['title'] = "";
            }
            if($newType){
                $prodCat[$arrKey]['type'] = $newType;
            }else{
                $prodCat[$arrKey]['type'] = "";
            }
            if($newDesc){
                $prodCat[$arrKey]['desc'] = $newDesc;
            }else{
                $prodCat[$arrKey]['desc'] = "";
            }

            $aJson = json_encode($prodCat, JSON_UNESCAPED_UNICODE);
            $open = fopen("json_files/billeder.json","w+"); 
            $text = $aJson; 
            fwrite($open, $text); 
            fclose($open);
        }
        Header("Location: ../index.php?from=billeder");
?>