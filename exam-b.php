<?php
function get_scheme($html) {
    $schemes = []; // Inisialisasi array kosong untuk menyimpan nama skema
    
    // Pola regex untuk menemukan semua kemunculan atribut dengan awalan sc-
    $pattern = '/\bsc-([a-zA-Z0-9-]+)\b/';
    
    // Gunakan preg_match_all untuk menemukan semua cocok dari pola dalam string html
    if (preg_match_all($pattern, $html, $matches)) {
        // $matches[1] berisi semua nama skema yang ditemukan
        $schemes = $matches[1];
    }
    
    return $schemes; // Mengembalikan array nama skema
}

// Contoh kasus uji
$input1 = "<i sc-root>Hello</i>";
$output1 = get_scheme($input1); // Output: ["root"]
print_r($output1);

$input2 = '<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>';
$output2 = get_scheme($input2); // Output: ["rootbear", "org"]
print_r($output2);
?>
