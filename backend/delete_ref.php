<?

$sDeleteArray = $_GET['deleteArray'];
$deleteArray = json_decode($sDeleteArray, true);

$sJson = file_get_contents('json_files/referencer.json');
$produkter = json_decode($sJson, true);

foreach ($deleteArray as $number) {
    unset($produkter[$number]);
}

$produkter = array_values($produkter);
$aJson = json_encode($produkter);

$open = fopen("json_files/referencer.json","w+"); 
$text = $aJson; 
fwrite($open, $text); 
fclose($open);


?>
<script>
    Ajax('referencer.php','main-content');
</script>