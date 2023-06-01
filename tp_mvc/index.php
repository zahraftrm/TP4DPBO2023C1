<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    //memanggil add
    $members->addMembers($_POST);
} else if (!empty($_GET['id_hapus'])) {
    //memanggil delete
    $id = $_GET['id_hapus'];
    $members->deleteMembers($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil update
    $id = $_GET['id_edit'];
    $members->updateMembers($id);
} else{
    $members->index();
}
