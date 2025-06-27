<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

$intload14gb3w = mysqli_query($conn, "SELECT * FROM states WHERE id = '$q'");
while ($intload14agb3w = mysqli_fetch_array($intload14gb3w)) {
    $sid = $intload14agb3w["stateid"];
}
?>
<label>Local Gorvernment Area: <span class="tx-danger">*</span></label>
<select class="form-control select2 " id="lga" name="lga" data-placeholder="Choose LGA" required>
    <option value="">Choose LGA</option>
    <?php
    $intload14gb3 = mysqli_query($conn, "SELECT * FROM lga WHERE stateid = '$sid' ORDER BY id asc");
    while ($intload14agb3 = mysqli_fetch_array($intload14gb3)) {
        $inid14gb3 = $intload14agb3["id"];
        $iname14gb3 = $intload14agb3["name"];
    ?>
        <option value="<?php echo $inid14gb3; ?>"><?php echo $iname14gb3; ?></option>
    <?php
    }
    ?>
</select>