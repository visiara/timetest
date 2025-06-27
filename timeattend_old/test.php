<?php
include __DIR__ . "/../includes/config.php"; // go one level up


/*
$filename = "tams/noimage.png";
$file = fopen($filename, "rb");
$contents = fread($file, filesize($filename));
fclose($file);
*/
/*
$handle = fopen("$filename", "rb"); 
$contents = stream_get_contents($handle); 
fclose($handle);
*/

//echo $contents;


//  check image byte

$id = $_GET['id'];
$sql = "SELECT * FROM photos WHERE id='1'";
$r = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($r);
//header('content-type: image/png');
//echo base64_decode($result['photo']);
//echo $result['bitByte'];


?>

<div class="ca pd-10">
    <span>
        <h6 class="tx-inverse mg-b-25">Finger <?php echo $fingerid; ?></h6>
    </span><br>
    <img src="data:image/png;base64,<?php echo $result['photo']; ?>" class="img-fluid">
</div>
<div class="ca pd-10">
    <span>
        <h6 class="tx-inverse mg-b-25">Finger <?php echo $fingerid; ?></h6>
    </span><br>
    <img src="data:image/png;base64,<?php echo $result['photo']; ?>" class="img-fluid">
</div>

<?php
mysqli_close($mysqli);
?>