<?php
$file = isset($_GET["file"]) ? $_GET["file"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Success</title>
</head>
<body>

<h2>✅ Upload Successful</h2>

<?php if ($file): ?>

    <p>Your file is ready to download:</p>

    <a href="download.php?file=<?php echo urlencode($file); ?>">
        📥 Download File
    </a>

    <br><br>

    <p>Direct file path:</p>
    <input type="text" value="<?php echo htmlspecialchars($file); ?>" style="width:300px;" readonly>

<?php else: ?>
    <p>❌ No file found</p>
<?php endif; ?>

<br><br>
<a href="upload.php">⬅ Upload Another File</a>

</body>
</html>
