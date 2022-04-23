<?php



// $mahasiswa = [
//     [
//         "nama" => "muhammad",
//         "nrp" => "202210044",
//         "email" => "muhammad@yahoo.com"
//     ],
//     [
//         "nama" => "muhammad",
//         "nrp" => "202210044",
//         "email" => "muhammad@yahoo.com"
//     ]
// ];

$dbh = new PDO('mysql:host=192.168.64.2;dbname=phpmvc', 'dwi', 'dwi');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
