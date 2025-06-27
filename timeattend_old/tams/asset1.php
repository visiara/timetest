<?php $therealpagename = '';
include "" . __DIR__ . "/header.php";

$ty = $_GET['ty'] ?? 'All';

$active1 = '';
$active2 = '';
$active3 = '';
$active4 = '';
$active5 = '';
$active6 = '';

if ($ty == 'All') {
    $active1 = 'active';
} elseif ($ty == 'Images') {
    $active2 = 'active';
} elseif ($ty == 'Videos') {
    $active3 = 'active';
} elseif ($ty == 'Documents') {
    $active4 = 'active';
} elseif ($ty == 'Audio') {
    $active5 = 'active';
} elseif ($ty == 'Archive') {
    $active6 = 'active';
} else {
    $active1 = 'active';
}
?>
<div class="col-lg-12">
    <div class="d-flex align-items-center justify-content-between  pd-t-0 mg-b-20 mg-sm-b-30">

        <div class="btn-group hidden-xs-down">
            <a href="#" class="btn btn-outline-info" onclick="deleteSelectedFiles();">Delete Selected</a>
        </div><!-- btn-group -->

        <div>
            <!--<span class="tx-24"><h4><?php echo $ty; ?> Files</h4></span>-->
            <button class="btn btn-info" data-toggle="modal" data-target="#fileUploadModal">Add New File</button>
        </div>

        <div class="btn-group hidden-sm-down">
            <a href="#" onclick="showPage('asset1.php?ty=All')"
                class="btn btn-outline-info <?php echo $active1; ?>">All</a>
            <a href="#" onclick="showPage('asset1.php?ty=Images')"
                class="btn btn-outline-info <?php echo $active2; ?>">Images</a>
            <a href="#" onclick="showPage('asset1.php?ty=Videos')"
                class="btn btn-outline-info <?php echo $active3; ?>">Videos</a>
            <a href="#" onclick="showPage('asset1.php?ty=Documents')"
                class="btn btn-outline-info <?php echo $active4; ?>">Documents</a>
            <a href="#" onclick="showPage('asset1.php?ty=Audio')"
                class="btn btn-outline-info <?php echo $active5; ?>">Audio</a>
            <a href="#" onclick="showPage('asset1.php?ty=Archive')"
                class="btn btn-outline-info <?php echo $active6; ?>">Archive</a>
        </div><!-- btn-group -->

    </div><!-- d-flex -->

    <div class="card bd-0 pd-t-10">
        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 p-2" id="mainTableClass">
            <thead class="thead-colored thead-dark">
                <tr>
                    <th class="wd-5p">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this.checked);"><span></span>
                        </label>
                    </th>
                    <!-- <th class="tx-10-force tx-mont tx-medium">Unique ID</th> -->
                    <th class="tx-10-force tx-mont tx-medium">File Name</th>
                    <th class="tx-10-force tx-mont tx-medium">Folder</th>
                    <th class="tx-10-force tx-mont tx-medium">Classification</th>
                    <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Last Modified</th>

                    <th class="wd-5p"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fileCategory = $ty;
                $fileTypeConditions = [
                    "Documents" => "('pdf', 'docx', 'txt', 'rtf', 'ppt', 'pptx', 'xls', 'xlsx')",
                    "Images" => "('jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'tiff')",
                    "Audio" => "('mp3', 'wav', 'ogg', 'flac')",
                    "Videos" => "('mp4', 'avi', 'mpeg', 'mov', 'wmv', 'flv')",
                    "Archive" => "('zip', 'rar', '7z', 'gz', 'tar')"
                ];

                $extensionIcons = [
                    // Documents
                    'pdf' => 'fa-file-pdf text-danger',
                    'docx' => 'fa-file-word text-primary',
                    'txt' => 'fa-file-lines text-secondary',
                    'rtf' => 'fa-file-lines text-secondary',
                    'ppt' => 'fa-file-powerpoint text-warning',
                    'pptx' => 'fa-file-powerpoint text-warning',
                    'xls' => 'fa-file-excel text-success',
                    'xlsx' => 'fa-file-excel text-success',

                    // Images
                    'jpg' => 'fa-file-image text-info',
                    'jpeg' => 'fa-file-image text-info',
                    'png' => 'fa-file-image text-info',
                    'gif' => 'fa-file-image text-info',
                    'svg' => 'fa-file-image text-info',
                    'webp' => 'fa-file-image text-info',
                    'tiff' => 'fa-file-image text-info',

                    // Audio
                    'mp3' => 'fa-file-audio text-purple',
                    'wav' => 'fa-file-audio text-purple',
                    'ogg' => 'fa-file-audio text-purple',
                    'flac' => 'fa-file-audio text-purple',

                    // Videos
                    'mp4' => 'fa-file-video text-indigo',
                    'avi' => 'fa-file-video text-indigo',
                    'mpeg' => 'fa-file-video text-indigo',
                    'mov' => 'fa-file-video text-indigo',
                    'wmv' => 'fa-file-video text-indigo',
                    'flv' => 'fa-file-video text-indigo',

                    // Archives
                    'zip' => 'fa-file-zipper text-muted',
                    'rar' => 'fa-file-zipper text-muted',
                    '7z' => 'fa-file-zipper text-muted',
                    'gz' => 'fa-file-zipper text-muted',
                    'tar' => 'fa-file-zipper text-muted'
                ];

                if (isset($fileTypeConditions[$fileCategory]) && $fileCategory != 'All') {
                    $sql = "SELECT * FROM archive_files WHERE company = '$companyMain' AND file_type IN " . $fileTypeConditions[$fileCategory] . " ORDER BY upload_date DESC";
                } else {
                    $sql = "SELECT * FROM archive_files WHERE company = '$companyMain' ORDER BY upload_date DESC";
                }

                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $fileid = $row['id'];
                    $filelabel = $row['label'];
                    $fileclassification = $row['classification'];
                    $ext = strtolower($row['file_type']);
                    $icon = $extensionIcons[$ext] ?? 'fa-file text-secondary';
                ?>
                    <tr>
                        <td class="valign-middle wd-5p">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox" class="file-checkbox" value="<?php echo $fileid; ?>"><span></span>
                            </label>
                        </td>
                        <td class="hidden-xs-down fs-2">
                            <i class="fa-solid <?php echo $icon; ?> fs-2 tx-22 lh-0 valign-middle"></i>
                            <?php echo $row['file_name']; ?>
                            <small class="d-block text-muted">.<?php echo $ext; ?></small>

                        </td>
                        <td class="hidden-xs-down"><?php echo $row['label']; ?></td>
                        <td class="hidden-xs-down"><?php echo $row['classification']; ?></td>
                        <td class="hidden-xs-down"><?php echo $row['upload_date']; ?></td>
                        <td class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info">
                                <i class="icon ion-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pd-10">
                                <nav class="nav nav-style-1 flex-column">
                                    <a href="../uploads/<?php echo $row['file_path']; ?>" class="nav-link" download>Download</a>
                                    <a href="#" class="nav-link"
                                        onclick='editFile("<?php echo $fileid; ?>", "<?php echo $filelabel; ?>", "<?php echo $fileclassification; ?>")'>Rename</a>
                                    <a href="#" class="nav-link" onclick='deleteFile("<?php echo $fileid; ?>")'>Delete</a>
                                </nav>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div><!-- col-12 -->