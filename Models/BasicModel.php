<?php

namespace Models;

use atk4\core\Exception;

class BasicModel
{
    public function __construct()
    {
        $this->db = db_get_dsql_connection();
        $this->dsql_connection = db_get_dsql_connection();
    }

    protected function executeStatement($sql, $data = NULL)
    {
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute($data);
        }   catch (Exception $e) {
        }
        return $statement;
    }
}