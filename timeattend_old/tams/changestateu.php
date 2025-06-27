<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
?>
<label>State: <span class="tx-danger">*</span></label>
<select class="form-control select2 " id="state" name="stateU" data-placeholder="Choose State" onchange="ChangelgaU(this.value)" required>
    <option value="">Choose State</option>
    <?php
    $intload14gb3 = mysqli_query($conn, "SELECT * FROM states WHERE countryid = '$q' ORDER BY id asc");
    while ($intload14agb3 = mysqli_fetch_array($intload14gb3)) {
        $inid14gb3 = $intload14agb3["id"];
        $iname14gb3 = $intload14agb3["name"];
    ?>
        <option value="<?php echo $inid14gb3; ?>"><?php echo $iname14gb3; ?></option>
    <?php
    }
    ?>
</select>