<?php

class Cluster extends DB
{
    function getCluster()
    {
        $query = "SELECT * FROM cluster";
        return $this->execute($query);
    }

    function getClusterById($id)
    {
        $query = "SELECT * FROM cluster WHERE id_cluster=$id";
        return $this->execute($query);
    }

    function addCluster($data)
    {
        $name = $data['name'];
        $query = "INSERT INTO cluster VALUES('', '$name')";
        return $this->executeAffected($query);
    }

    function updateCluster($id, $data)
    {
        $name = $data['name'];
        $query = "UPDATE cluster SET name_cluster='$name' WHERE id_cluster=$id";
        return $this->executeAffected($query);
    }

    function deleteCluster($id)
    {
        $query = "DELETE FROM cluster WHERE id_cluster=$id";
        return $this->executeAffected($query);
    }
}
