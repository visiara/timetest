<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$tid = $_GET["a"];

$query = mysqli_query($conn, "SELECT * FROM smsservers WHERE id='$tid'");
while ($f1 = mysqli_fetch_array($query)) {
	$theid = $f1["id"];

	$pa1 = $f1['pa1'];
	$pa2 = $f1['pa2'];
	$pa3 = $f1['pa3'];
	$pa4 = $f1['pa4'];
	$pa4v = $f1['pa4v'];
	$pa5 = $f1['pa5'];
	$pa5v = $f1['pa5v'];
	$pa6 = $f1['pa6'];
	$pa6v = $f1['pa6v'];
	$pa7 = $f1['pa7'];
	$pa7v = $f1['pa7v'];
	$pa8 = $f1['pa8'];
	$pa8v = $f1['pa8v'];
	$pa9 = $f1['pa9'];
	$pa9v = $f1['pa9v'];
	$pa10 = $f1['pa10'];
	$pa10v = $f1['pa10v'];
	$apiaddress = $f1['apiaddress'];
	$accountname = $f1['accountname'];
	$sendername = $f1['sendername'];
}

?>
<form class="form" action="sms3.php" method="POST">
	<div class="form-body">

		<div class="form-group">
			<label for="accountname"><strong>Account Name</strong></label>
			<input type="text" id="accountname" name="accountname" class="form-control" placeholder="Account Name" value="<?php echo $accountname; ?>" required>

		</div>

		<div class="form-group">
			<label for="sendername"><strong>Sender Name</strong></label>
			<input type="text" id="sendername" name="sendername" class="form-control" placeholder="Sender Name" value="<?php echo $sendername; ?>" required>

		</div>

		<div class="form-group">
			<label for="apiaddress"><strong>API Address</strong></label>
			<input type="text" id="apiaddress" name="apiaddress" class="form-control" placeholder="API Address Here" value="<?php echo $apiaddress; ?>" required>

		</div>

		<div class="form-group">
			<label for="pa1"><strong>Sender Parameteer</strong></label>
			<input type="text" id="pa1" name="pa1" class="form-control" placeholder="Sender Parameteer" value="<?php echo $pa1; ?>" required>

		</div>

		<div class="form-group">
			<label for="pa2"><strong>Recipient Parameter</strong></label>
			<input type="text" id="pa2" name="pa2" class="form-control" placeholder="Recipient Parameter" value="<?php echo $pa2; ?>" required>

		</div>

		<div class="form-group">
			<label for="pa3"><strong>Message Parameter</strong></label>
			<input type="text" id="pa3" name="pa3" class="form-control" placeholder="Message Parameter" value="<?php echo $pa3; ?>" required>

		</div>
		======
		<div class="form-group">
			<input type="text" name="pa4" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa4; ?>">
			<input type="text" name="pa4v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa4v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa5" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa5; ?>">
			<input type="text" name="pa5v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa5v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa6" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa6; ?>">
			<input type="text" name="pa6v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa6v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa7" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa7; ?>">
			<input type="text" name="pa7v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa7v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa8" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa8; ?>">
			<input type="text" name="pa8v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa8v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa9" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa9; ?>">
			<input type="text" name="pa9v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa9v; ?>">

		</div>

		<div class="form-group">
			<input type="text" name="pa410" class="form-control" placeholder="Extra Parameter Here" value="<?php echo $pa10; ?>">
			<input type="text" name="pa10v" class="form-control" placeholder="Extra Value Here" value="<?php echo $pa10v; ?>">
			<input type="hidden" name="rid2" value="<?php echo $theid; ?>" size="1">
		</div>

		<div class="form-actions left">
			<button type="submit" name="submit" class="btn btn-primary btn-lg">
				<i class="icon-check2"></i> Update Gateway Info
			</button>
		</div>

	</div>
</form>