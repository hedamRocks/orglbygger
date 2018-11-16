<?

$sDeleteArray = $_GET['deleteArray'];
$deleteArray = json_decode($sDeleteArray, true);

$sJson = file_get_contents('json_files/prod_cat.json');
$produkter = json_decode($sJson, true);

foreach ($deleteArray as $number) {
    unset($produkter[$number]);
}

$produkter = array_values($produkter);
$aJson = json_encode($produkter);

$open = fopen("json_files/prod_cat.json","w+"); 
$text = $aJson; 
fwrite($open, $text); 
fclose($open);

echo "<b class='red-text'>Kategorien blev fjernet</b>";
?>