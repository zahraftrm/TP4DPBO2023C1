<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Cluster.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $cluster;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->cluster = new Cluster(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->cluster->open();
    $this->members->getMembers();
    $this->cluster->getCluster();
    
    $data = array(
      'members' => array(),
      'cluster' => array()
    );
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    while($row = $this->cluster->getResult()){
      array_push($data['cluster'], $row);
    }
    $this->members->close();
    $this->cluster->close();

    $view = new MembersView();
    $view->render($data);
  }

  
  function addMembers($data){
    $this->members->open();
    $this->members->addMembers($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function updateMembers($id){
    $this->members->open();
    $this->members->updateMembers($id);
    $this->members->close();

    header("location:index.php");
  }

  function deleteMembers($id){
    $this->members->open();
    $this->members->deleteMembers($id);
    $this->members->close();

    header("location:index.php");
  }

}