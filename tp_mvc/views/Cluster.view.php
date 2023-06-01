<?php
  class ClusterView{
    public function render($data){
      $no = 1;
      $dataHeader = "<tr>
        <th>NO</th>
        <th>NAME</th>
        <th>ACTIONS</th>
      </tr>";
      $dataCluster = null;
      foreach($data as $val){
        list($id, $name) = $val;
        $dataCluster .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>
                    <a href='cluster.php?id_edit=" . $id .  "' class='btn btn-success''>Edit</a>
                    <a href='cluster.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
      }

      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_HEADER", $dataHeader);
      $tpl->replace("DATA_TABEL", $dataCluster);
      $tpl->write();
    }
  }