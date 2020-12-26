<?php
function hitungGaji($nama, $valueGajiPokok, $banyakBulan, $isTunjangan)
{
    // Jika $banyakBulan negatif, maka program berakhir
    if($banyakBulan < 0) {
        echo "Isian banyak bulan tidak boleh kurang dari nol!";
        return false;
    }
    
    // Jika $isTunjangan bukan boolean, maka program berakhir
    if(!is_bool($isTunjangan)) {
        echo "Isian tunjangan hanya diisi true atau false!";
        return false;
    }

    // Kalkulasi nilai tunjangan, bpjs, pajak
    $valueTunjangan = $isTunjangan ? 500000 : 0;
    $valueBPJS = $valueGajiPokok * 0.03;
    $valuePajak = $valueGajiPokok * 0.05;
    
    // Kalkulasi nilai gaji bersih
    $valueGajiBersih = $valueGajiPokok + $valueTunjangan - $valueBPJS - $valuePajak;

    // Kalkulasi nilai total gaji
    $valueTotalGaji = $valueGajiBersih * $banyakBulan;

    echo
        "
        ===============================
        Nama Karyawan : $nama
        Gaji Pokok : " . number_format($valueGajiPokok) . "
        Tunjangan : " . number_format($valueTunjangan) . "
        BPJS : " . number_format($valueBPJS) . "
        Pajak : " . number_format($valuePajak) . "
        ===============================
        Gaji bersih: " . number_format($valueGajiBersih) . " / bulan
        ===============================
        Total Gaji: " . number_format($valueTotalGaji) . "
        ";
}

hitungGaji("Andi", 100000, 5, true);
?>