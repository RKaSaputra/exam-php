<?php
function sum_deep($tree, $char, $level = 1) {
    $sum = 0; // Inisialisasi variabel untuk menyimpan jumlah level

    // Memeriksa apakah elemen pertama dari level saat ini mengandung karakter yang dicari
    if (strpos($tree[0], $char) !== false) {
        $sum += $level; // Jika ya, tambahkan level saat ini ke jumlah
    }

    // Iterasi melalui elemen-elemen lain dalam array (yang merupakan sub-array)
    for ($i = 1; $i < count($tree); $i++) {
        if (is_array($tree[$i])) {
            // Panggil sum_deep secara rekursif untuk setiap node anak, dengan meningkatkan level
            $sum += sum_deep($tree[$i], $char, $level + 1);
        }
    }

    return $sum; // Kembalikan jumlah total level yang ditemukan
}

// Contoh kasus uji
$input1 = ["AB", ["XY"], ["YP"]];
$char1 = 'Y';
echo sum_deep($input1, $char1); // Output: 4

$input2 = ["", ["", ["XXXXX"]]];
$char2 = 'X';
echo sum_deep($input2, $char2); // Output: 3

$input3 = ["X"];
$char3 = 'X';
echo sum_deep($input3, $char3); // Output: 1

$input4 = [""];
$char4 = 'X';
echo sum_deep($input4, $char4); // Output: 0

$input5 = ["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]];
$char5 = 'X';
echo sum_deep($input5, $char5); // Output: 7

$input6 = ["X", [""], ["X"], ["X"], ["Y", [""]], ["X"]];
$char6 = 'X';
echo sum_deep($input6, $char6); // Output: 7
?>
