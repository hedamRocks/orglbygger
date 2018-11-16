<?

$sDeleteArray = $_GET['deleteArray'];
$deleteArray = json_decode($sDeleteArray, true);

$sJson = file_get_contents('json_files/billeder.json');
$billeder = json_decode($sJson, true);

foreach ($deleteArray as $number) {
    unset($billeder[$number]);
}

$aJson = json_encode($billeder);

$open = fopen("json_files/billeder.json","w+"); 
$text = $aJson; 
fwrite($open, $text); 
fclose($open);

?>
<script>
Ajax('billeder.php','main-content');
</script>