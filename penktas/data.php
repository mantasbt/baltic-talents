<?php
date_default_timezone_set('Europe/Vilnius');

$files = normalize_files_array($_FILES);
$storage = "files.txt";
$newLine = "\r\n";

foreach($files['userfile'] as $file){
    $uploaddir = __DIR__."\\uploads\\";
    $uploadfile = $uploaddir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
        echo "Failas: " . "'" . $file['name']. "'" . " buvo sėkmingai įkeltas! <br>";
        $info = $file['name'] . " " . date("Y-m-d H:i:s") . $newLine;
        file_put_contents($storage, $info, FILE_APPEND);
    } else {
        echo "Nebuvo pasirinktas joks failas<br>";
    }
}

echo "<br>";
echo "<h3>Failo įrašai:</h3>";

$storage_data = file($storage);

foreach ($storage_data as $storage) {
    echo $storage . "<br>";
}

function normalize_files_array($files = []) {
    $normalized_array = [];
    foreach($files as $index => $file) {
        if (!is_array($file['name'])) {
            $normalized_array[$index][] = $file;
            continue;
        }
        foreach($file['name'] as $idx => $name) {
            $normalized_array[$index][$idx] = [
                'name' => $name,
                'type' => $file['type'][$idx],
                'tmp_name' => $file['tmp_name'][$idx],
                'error' => $file['error'][$idx],
                'size' => $file['size'][$idx]
            ];
        }
    }
    return $normalized_array;
}


?>