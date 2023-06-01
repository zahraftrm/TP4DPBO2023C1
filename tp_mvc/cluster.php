<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Cluster.controller.php");

$cluster = new ClusterController();

if (isset($_POST['add'])) {
    //memanggil add
    $cluster->addCluster($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $cluster->deleteCluster($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $cluster->updateCluster($id);
}
else{
    $cluster->index();
}

