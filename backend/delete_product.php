<?

$sDeleteArray = $_GET['deleteArray'];
$deleteArray = json_decode($sDeleteArray, true);

$sJson = file_get_contents('json_files/produkter.json');
$produkter = json_decode($sJson, true);

foreach ($deleteArray as $number) {
    unset($produkter[$number]);
}

$produkter = array_values($produkter);
$aJson = json_encode($produkter);

$open = fopen("json_files/produkter.json","w+"); 
$text = $aJson; 
fwrite($open, $text); 
fclose($open);

?>
<script>
console.log(<?=$_GET['deleteArray'];?>);
console.log(<?=$aJson;?>);
console.log(<?=$sJson;?>);
Ajax('koebOgSalg.php','main-content');
</script>