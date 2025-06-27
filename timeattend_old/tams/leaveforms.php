<?php
include __DIR__ . "/../includes/config.php"; // go one level up


$levelnamey = $_GET["qid"];
?>
<div class="form-group mg-b-20-force levelclass" id="row">
    <label>Approval Level <?php echo $levelnamey; ?>: <span class="tx-danger">*</span></label>

    <div class="input-group">
        <select class="form-control select2 " name="plevel[]" data-placeholder="Choose Approval Level" required>
            <option value="">Choose Approval Level</option>
            <?php
            $intload1 = mysqli_query($conn, "SELECT * FROM approvallevels ORDER BY id asc");
            while ($intload1a = mysqli_fetch_array($intload1)) {
                $inid1 = $intload1a["id"];
                $iname1 = $intload1a["levelnick"];
            ?>
                <option value="<?php echo $inid1; ?>"><?php echo $iname1; ?></option>
            <?php
            }
            ?>
        </select>
        <div class="input-group-append">
            <button class="btn btn-danger" id="DeleteRow" type="button">
                Remove
            </button>
        </div>
    </div>

</div>