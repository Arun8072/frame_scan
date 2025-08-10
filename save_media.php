<?php
$assetsDir = __DIR__ . '/assets/';

// Save photo
if (!empty($_POST['photoData'])) {
    $imgData = $_POST['photoData'];
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = str_replace(' ', '+', $imgData);
    $decodedData = base64_decode($imgData);
    $photoName = 'photo_' . time() . '.png';
    file_put_contents($assetsDir . $photoName, $decodedData);
}

// Save video
if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
    $videoName = 'video_' . time() . '_' . basename($_FILES['video']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'], $assetsDir . $videoName);
}

echo "✅ Photo and/or video saved in assets folder.";
?>
