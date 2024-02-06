<?php
// Nama file JSON tempat menyimpan data
$jsonFilePath = 'database.json';

// Fungsi untuk membaca data dari file JSON
function readData() {
    global $jsonFilePath;
    $data = file_get_contents($jsonFilePath);
    return json_decode($data, true);
}

// Fungsi untuk menulis data ke file JSON
function writeData($data) {
    global $jsonFilePath;
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($jsonFilePath, $jsonData);
}

// Tanggapi permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data dari permintaan POST
    $postData = json_decode(file_get_contents("php://input"), true);

    // Validasi data jika diperlukan
    $currentData = readData();

    // Cek apakah data sudah ada
    $existingIndex = findDataIndex($currentData, $postData);

    if ($existingIndex !== false) {
        // Jika data sudah ada, ganti dengan data yang baru
        $currentData[$existingIndex] = $postData;
        writeData($currentData);
        echo json_encode(['message' => 'Data updated successfully']);
    } else {
        // Jika data belum ada, tambahkan data baru
        $currentData[] = $postData;
        writeData($currentData);
        echo json_encode(['message' => 'Data added successfully']);
    }
} else {
    // Tanggapi jika metode permintaan tidak diizinkan
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Method not allowed']);
}

// Fungsi untuk mencari indeks data yang sama
function findDataIndex($data, $newData) {
    foreach ($data as $index => $existingData) {
        if ($existingData['name'] === $newData['name']) {
            return $index;
        }
    }
    return false;
}
?>
