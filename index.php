<?php
echo "Testing pake php";

//variable
$npm = 2124110009;

echo "<br>";
echo "NPM: ". $npm;

// array

$mahasiswa = ["rizky", "agung", "okta", "rindi", "ribka"];

echo "<h2>Mahasiswa</h2>";
// tampil array

foreach($mahasiswa as $item){
    echo $item;
    echo "<br>";
}


$mahasiswa_4a = [
    [
    "npm" => 2124110001,
    "nama" => "Ani",
    "asal" => "Sekayu"
    ],
    [
    "npm" => 2124110002,
    "nama" => "Alii",
    "asal" => "Prabumulih"
    ]
];

echo "<h2> Mahasiswan MI4A </h2>";

echo "<table border = 1>
<tr>
    <th>NPM</th><th>Nama</th><th>Asal</th>
</tr>";

foreach($mahasiswa_4a as $item){
    echo "<tr>
            <td>".$item['npm']."</td>
            <td>".$item['nama']."</td>
            <td>".$item['asal']."</td>
        </tr>";
}

echo '</table>';