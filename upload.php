<?php
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_POST["upload"])) {
    if (!empty($_FILES["file"]["name"])) {

        $fileName = basename($_FILES["file"]["name"]);
        $safeName = time() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", $fileName);
        $targetPath = $uploadDir . $safeName;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
            header("Location: go.php?file=" . urlencode($targetPath));
            exit;
        } else {
            $error = "❌ Upload failed!";
        }

    } else {
        $error = "❌ Please select a file!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>

<h2>📤 Upload File</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="upload">Upload</button>
</form>

</body>
</html>
