<?php
include_once("conf.php");
include_once("models/Cluster.class.php");
include_once("views/Cluster.view.php");

class ClusterController {
  private $cluster;

  function __construct(){
    $this->cluster = new Cluster(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->cluster->open();
    $this->cluster->getCluster();
    $data = array();
    while($row = $this->cluster->getResult()){
      array_push($data, $row);
    }

    $this->cluster->close();

    $view = new ClusterView();
    $view->render($data);
  }

  
  function addCluster($data){
    $this->cluster->open();
    $this->cluster->addCluster($data);
    $this->cluster->close();
    
    header("location:cluster.php");
  }

  function updateCluster($id){
    $this->cluster->open();
    $this->cluster->updateCluster($id);
    $this->cluster->close();
    
    header("location:cluster.php");
  }

  function deleteCluster($id){
    $this->cluster->open();
    $this->cluster->deleteCluster($id);
    $this->cluster->close();
    
    header("location:cluster.php");
  }


}