<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";


$job_id = $_GET['job_id'];

$resultx = $conn->query("SELECT * FROM job_template_interview WHERE id = '$job_id'");
while ($rowx = $resultx->fetch_assoc()) {
    $template_questions = empty($rowx['template_questions']) ? array() : explode(",", $rowx['template_questions']);
}

foreach ($template_questions as $value) {

    $result = $conn->query("SELECT * FROM job_questions WHERE id = '$value'");
    while ($row = $result->fetch_assoc()) {
        $question_name = $row['question_name'];
        $description = $row['description'];
        $response_type = $row['response_type'];
        $rating_scale = $row['rating_scale'];
    }

?>
    <div class="question-box border p-3 mb-2">
        <div class="form-group">
            <label>Name of Question</label>
            <input type="text" class="form-control" name="qname[]" value="<?php echo $question_name; ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="2" name="qdescription[]" required><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label>Type of Response</label>
            <select class="form-control response-type" name="qresponse_type[]" required>
                <option value="<?php echo $response_type; ?>"><?php echo $response_type; ?>
                </option>
                <option value="Text">Text</option>
                <option value="Rating">Rating</option>
            </select>
        </div>
        <div class="form-group rating-scale" style="display: none;">
            <label>Rating Scale (1 - 100)</label>
            <input type="number" class="form-control" min="1" max="100" value="10" name="qrating_scale[]"
                value="<?php echo $rating_scale; ?>">
        </div>
        <button type="button" class="btn btn-danger btn-sm remove-question">Delete Question</button>
    </div>

<?php
}
?>