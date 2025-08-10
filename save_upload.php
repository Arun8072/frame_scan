<?php
$assetsDir = __DIR__ . '/assets/';

// Ensure assets folder exists
if (!file_exists($assetsDir)) {
    mkdir($assetsDir, 0777, true);
}

// Function to get next available filename
function getNextFileName($prefix, $ext, $dir) {
    $i = 1;
    while (file_exists("$dir{$prefix}{$i}.{$ext}")) {
        $i++;
    }
    return "{$prefix}{$i}.{$ext}";
}

if (isset($_FILES['photo'])) {
    // Handle photo capture
    $fileName = getNextFileName('photo', 'jpg', $assetsDir);
    move_uploaded_file($_FILES['photo']['tmp_name'], $assetsDir . $fileName);
    echo "Photo saved as $fileName";
} elseif (isset($_FILES['video'])) {
    // Handle video upload
    $fileName = getNextFileName('video', 'mp4', $assetsDir);
    move_uploaded_file($_FILES['video']['tmp_name'], $assetsDir . $fileName);
    echo "Video saved as $fileName";
} else {
    echo "No file uploaded.";
}
?>
