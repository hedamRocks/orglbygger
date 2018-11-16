<?

$sDeleteArray = $_GET['deleteArray'];
$deleteArray = json_decode($sDeleteArray, true);

$sJson = file_get_contents('json_files/skimmelsvamp.json');
$billeder = json_decode($sJson, true);

foreach ($deleteArray as $number) {
    unset($billeder[$number]);
}
$billeder = array_values($billeder);
$aJson = json_encode($billeder);

$open = fopen("json_files/skimmelsvamp.json","w+"); 
$text = $aJson; 
fwrite($open, $text); 
fclose($open);

?>
<script>
Ajax('skimmelsvamp.php','main-content');
</script>