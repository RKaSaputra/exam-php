<?php
function pattern_count($text, $pattern) {
    $textLength = strlen($text); // Menghitung panjang teks
    $patternLength = strlen($pattern); // Menghitung panjang pola
    $count = 0; // Inisialisasi jumlah kemunculan pola

    // Loop untuk memeriksa setiap karakter di dalam teks hingga posisi di mana sisa teks dapat mengandung pola
    for ($i = 0; $i <= $textLength - $patternLength; $i++) {
        $match = true; // Variabel untuk melacak apakah pola ditemukan

        // Loop untuk memeriksa apakah substring dari posisi saat ini cocok dengan pola
        for ($j = 0; $j < $patternLength; $j++) {
            if ($text[$i + $j] !== $pattern[$j]) {
                $match = false; // Jika ada karakter yang tidak cocok, set match menjadi false
                break; // Keluar dari loop karena tidak cocok
            }
        }

        if ($match) {
            $count++; // Jika cocok, tambah jumlah kemunculan
        }
    }

    return $count; // Mengembalikan total jumlah kemunculan pola
}

// Contoh penggunaan:
$text = "aaaaaa";
$pattern = "aa";
echo pattern_count($text, $pattern); // Output: 5
