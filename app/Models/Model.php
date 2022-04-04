<?php

namespace App\Models;

include_once 'app/Classes/Initialize.php';
include_once 'app/Classes/Connection.php';

use App\Classes\Connection;

class Model
{
    private $pdo_conn;
    private $table;

    public function __construct()
    {
        global $env;
        $this->pdo_conn = Connection::get_connection();
        $this->prefix   = $env->database->db_tables_prefix;

        $table = explode('\\', \get_class($this));
        $table_name_count = count($table);
        $this->table = strtolower($table[--$table_name_count]);
    }

    public function save(array $columns, array $values)
    {
        if (count($columns) != count($values)) {
            exit('Columns and Values do not match');
        }

        $column_count = count($columns);
        $pad = \str_repeat(',?', $column_count-1);

        if ($column_count > 1) {
            $literal_values = '?' . $pad;
        } else {
            $literal_values = '?';
        }

        $all_columns = implode(',', $columns);
        try {
            $sql = "INSERT INTO  {$this->table} (
                $all_columns
            ) VALUES ($literal_values)";

            $stmt = $this->pdo_conn->prepare($sql);

            $bind_index = 0;
            foreach ($values as $key => $value) {
                $stmt->bindValue(++$bind_index, $value);
            }

            $stmt->execute();
        } catch (\throwable $e) {
            throw $e;
        }
    }
}
