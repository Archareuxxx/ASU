<?php
$uploadDir = __DIR__ . '/../uploads/';
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt', 'docx'];
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        die('Ekstensi file tidak diizinkan.');
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $fileTmpPath);
    finfo_close($finfo);
    $allowedMimeTypes = [
        'image/jpeg', 'image/png', 'image/gif', 'application/pdf',
        'text/plain', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];
    if (!in_array($mimeType, $allowedMimeTypes)) {
        die('Tipe file tidak sesuai.');
    }
    $newFileName = hash('sha256', uniqid('', true)) . '.' . $fileExtension;
    $destPath = $uploadDir . $newFileName;
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        echo 'File uploaded successfully.';
    } else {
        die('An error occurred while saving the file.');
    }
} else {
    die('No files uploaded or an error occurred.');
}

