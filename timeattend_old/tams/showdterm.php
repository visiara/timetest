<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];

if ($q == '1') { ?>
  <label for="month">End Month: <span class="tx-danger">*</span></label>
  <select id="month" name="month" class="form-control select2" required>
    <option value="">Choose End Month</option>
    <option name="January" value="01">January</option>
    <option name="February" value="02">February</option>
    <option name="March" value="03">March</option>
    <option name="April" value="04">April</option>
    <option name="May" value="05">May</option>
    <option name="June" value="06">June</option>
    <option name="July" value="07">July</option>
    <option name="August" value="08">August</option>
    <option name="September" value="09">September</option>
    <option name="October" value="10">October</option>
    <option name="November" value="11">November</option>
    <option name="December" value="12">December</option>
  </select>
<?php } else { ?>
  <label for="month">Quater: <span class="tx-danger">*</span></label>
  <select id="month" name="month" class="form-control select2" required>
    <option value="">Choose Quater</option>
    <option name="March" value="03">Quater 1</option>
    <option name="June" value="06">Quater 2</option>
    <option name="September" value="09">Quater 3</option>
    <option name="December" value="12">Quater 4</option>
  </select>
<?php
}
?>