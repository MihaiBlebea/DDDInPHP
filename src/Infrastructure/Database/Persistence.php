<?php

namespace App\Infrastructure\Database;

use Exception;


class Persistence implements PersistenceInterface
{
    private $connector;

    private $schema;

    private $sortSchema;

    private $limitSchema;

    private $table;


    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    public function getTable()
    {
        if($this->table === null)
        {
            throw new \Exception('Table is not setup, use setTable()', 1);
        }
        return $this->table;
    }

    public function setTable(String $table_name)
    {
        $this->table = $table_name;
        return $this;
    }

    public function table(String $table_name)
    {
        $this->setTable($table_name);
        return $this; 
    }

    private function connect()
    {
        return $this->connector->connect();
    }

    public function where($valueA, $operand, $valueB = null)
    {
        if($valueB === null)
        {
            $valueB = $operand;
            $operand = '=';
        }

        if($this->schema === null)
        {
            $this->schema = $valueA . $operand . "'" . $valueB . "'";
        } else {
            $this->schema .= " AND " . $valueA . $operand . "'" . $valueB . "'";
        }
        return $this;
    }

    public function orWhere($valueA, $operand, $valueB = null)
    {
        if($valueB === null)
        {
            $valueB = $operand;
            $operand = '=';
        }

        if($this->schema === null)
        {
            $this->schema = $valueA . $operand . "'" . $valueB . "' OR ";
        } else {
            $this->schema .= " OR " . $valueA . $operand . "'" . $valueB . "'";
        }
        return $this;
    }

    public function create(array $array)
    {
        if(count($array) === 0)
        {
            throw new \Exception('Attribute array doesn\'t is null', 1);
        }
        $create_schema = $this->createSchema($array);

        return $this->connect()
                    ->prepare("INSERT INTO " . $this->getTable() . $create_schema)
                    ->execute();
    }

    private function createSchema(array $array)
    {
        $insertKeySchema = "";
        $insertValueSchema = "";
        $i = 0;

        foreach($array as $index => $item)
        {
            if($i < count($array) - 1)
            {
                $insertKeySchema .= $index . ', ';
                $insertValueSchema .= "'" . $item . "', ";
            } else {
                $insertKeySchema .= $index;
                $insertValueSchema .= "'" . $item . "'";
            }
            $i++;
        }

        return " ( " . $insertKeySchema . " ) VALUES ( " . $insertValueSchema . " )";
    }

    public function update(array $array)
    {
        if(count($array) === 0)
        {
            throw new \Exception('Attribute array doesn\'t is null', 1);
        }
        $update_schema = $this->updateSchema($array);

        if($this->schema === null)
        {
            throw new \Exception('Please add conditions before calling update', 1);
        }
        return $this->connect()
                    ->prepare("UPDATE " . $this->getTable() . " SET " . $update_schema . " WHERE " . $this->schema)
                    ->execute();
    }

    private function updateSchema(array $array)
    {
        $updateSchema = '';
        $i = 0;
        foreach($array as $index => $item)
        {
            if($i < count($array) - 1)
            {
                $updateSchema .= $index . "= '" . $item . "', ";
            } else {
                $updateSchema .= $index . "= '" . $item . "'";
            }
            $i++;
        }
        return $updateSchema;
    }

    public function count()
    {
        if($this->schema !== null)
        {
            $statement = $this->connect()
                              ->query("SELECT COUNT(*) as count FROM " . $this->getTable() . " WHERE " . $this->schema)
                              ->fetch();
        } else {
            $statement = $this->connect()
                              ->query("SELECT COUNT(*) as count FROM " . $this->getTable())
                              ->fetch();
        }
        return intval($statement->count);
    }

    public function selectOne()
    {
        if($this->schema === null)
        {
            throw new Exception("No conditions where selected");
        }
        $result = $this->connect()
                       ->query("SELECT * FROM " . $this->getTable() . " WHERE " . $this->schema)
                       ->fetch(\PDO::FETCH_ASSOC);
        $this->clearSchema();
        return $result;
    }

    public function select()
    {
        if($this->schema === null)
        {
            throw new Exception("No conditions were selected");
        }
        $result = $this->connect()
                       ->query("SELECT * FROM " . $this->getTable() . " WHERE " . $this->schema . $this->sortSchema . $this->limitSchema)
                       ->fetchAll(\PDO::FETCH_ASSOC);

        $this->clearSchema();
        if(count($result) === 1)
        {
            return $result[0];
        }
        return $result;
    }

    public function selectAll()
    {
        $result = $this->connect()
                       ->query("SELECT * FROM " . $this->getTable() . $this->sortSchema . $this->limitSchema)
                       ->fetchAll(\PDO::FETCH_ASSOC);
        $this->clearSchema();
        return $result;
    }

    public function sortBy($sortBy, $order)
    {
        $sortSchema = "";
        if(in_array($order, ["ASC", "DESC"]) === false)
        {
            throw new Exception("Invalid sorting params.");
        }
        $this->sortSchema = " ORDER BY " . $sortBy . " " . strtoupper($order);
        return $this;
    }

    public function limit($limit = null, $offset = null)
    {
        $this->limitSchema = "";
        // CHeck if limit is set
        if($limit !== null)
        {
            $this->limitSchema = " LIMIT $limit";
            // Check if offset is set
            if($offset !== null)
            {
                $this->limitSchema .= " OFFSET $offset";
            }
        }
        return $this;
    }

    public function delete()
    {
        if($this->schema === null)
        {
            throw new Exception("No conditions were selected");
        }
        $result = $this->connect()
                       ->prepare("DELETE FROM " . $this->getTable() . " WHERE " . $this->schema)
                       ->execute();

        $this->clearSchema();
        return $result;
    }

    private function clearSchema()
    {
        $this->schema      = null;
        $this->sortSchema  = '';
        $this->limitSchema = '';
    }
}
