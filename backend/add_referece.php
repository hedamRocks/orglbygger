<?
    $sJson = file_get_contents('json_files/referencer.json');
    $referencer = json_decode($sJson, true);

    $nyRef = array('title' => $_GET['refTitle'], 'desc' => $_GET['refDesc']);

    array_push($referencer, $nyRef);

    $aJson = json_encode($referencer);

    $open = fopen("json_files/referencer.json","w+"); 
    $text = $aJson;
    fwrite($open, $text); 
    fclose($open);

    echo "<b class='green-text'>Reference (".$_GET['refTitle'].") blev tilføjet</b>";
?>