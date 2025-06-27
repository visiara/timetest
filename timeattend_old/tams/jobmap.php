<?php
$therealpagename = '';
include "" . __DIR__ . "/header.php";


// Get year filter from request, default to current year
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');

// Initialize data array with months from 0 to 11 set to 0
$data = array_fill(0, 12, ["x" => 0, "y" => 0]);
foreach ($data as $index => &$entry) {
    $entry["x"] = $index; // Assign month index
}

$data2 = array_fill(0, 12, ["x" => 0, "y" => 0]);
foreach ($data2 as $index2 => &$entry2) {
    $entry2["x"] = $index2; // Assign month index
}

// Fetch data: Count total entries grouped by month from `published_jobs` for the selected year first data
$totaljobs = 0;
$sql = "SELECT MONTH(date_created) - 1 AS x, COUNT(*) AS y 
        FROM published_jobs 
        WHERE YEAR(date_created) = ?
        GROUP BY x 
        ORDER BY x";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $data[(int)$row["x"]]["y"] = (int)$row["y"];
    $totaljobs = $totaljobs + (int)$row["y"];
}

// Fetch data: Count total entries grouped by month from `job_applications` for the selected year second data
$totalapp = 0;
$sql2 = "SELECT MONTH(date_created) - 1 AS x, COUNT(*) AS y 
        FROM job_applications 
        WHERE YEAR(date_created) = ?
        GROUP BY x 
        ORDER BY x";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $year);
$stmt2->execute();
$result2 = $stmt2->get_result();

while ($row2 = $result2->fetch_assoc()) {
    $data2[(int)$row2["x"]]["y"] = (int)$row2["y"];
    $totalapp = $totalapp + (int)$row2["y"];
}

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode(["data" => array_values($data), "data2" => array_values($data2), "totaljobs" => $totaljobs, "totalapp" => $totalapp]);
//echo json_encode(["data" => $data,"data2" => $data2, "totaljobs" => $totaljobs, "totalapp" => $totalapp]);
