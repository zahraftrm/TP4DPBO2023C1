<?php

  class MembersView {
    public function render($data){
      $no = 1;
      $dataHeader = "<tr>
        <th>NO</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>CLUSTER</th>
        <th>JOINING DATE</th>
        <th>ACTIONS</th>
      </tr>";
      $dataMembers = null;
      $dataCluster = null;
      
      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join, $id_cluster) = $val;

        $clusterName = isset($data['cluster'][$id_cluster]['name_cluster']) ? $data['cluster'][$id_cluster]['name_cluster'] : '';

        $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join . "</td>
                <td>" . $clusterName . "</td>
                <td>" . $id_cluster . "</td>
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-success' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td></tr>";
      }

      foreach($data['cluster'] as $val){
        list($id, $name) = $val;
        $dataCluster .= "<option value='".$id."'>".$name."</option>";
      }

      $tpl = new Template("templates/index.html");

      $tpl->replace("OPTION", $dataCluster);
      $tpl->replace("DATA_HEADER", $dataHeader);
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write(); 
    }
  }
?>