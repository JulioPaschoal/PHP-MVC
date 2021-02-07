<?php

use App\Core\model;

class Note extends model
{
    //METODO PARA LISTA TODOS OS DADOS DO BANCO\\
    public function getAll()
    {
        $sql = "SELECT * FROM notes";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }
}
