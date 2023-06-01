<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join = $data['join_date'];
        $id_cluster = $data['id_cluster'];
        $query = "INSERT INTO members VALUES('', '$name', '$email', '$phone', '$join', '$id_cluster')";
        return $this->executeAffected($query);
    }

    function updateMembers($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join = $data['join_date'];
        $id_cluster = $data['id_cluster'];
        $query = "UPDATE members SET 'name' ='$name', email ='$email', phone ='$phone', join_date ='$join', id_cluster ='$id_cluster' WHERE id=$id";
        return $this->executeAffected($query);
    }

    function deleteMembers($id)
    {
        $query = "DELETE FROM members WHERE id=$id";
        return $this->executeAffected($query);
    }
}
