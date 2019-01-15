<?php

namespace model;


use interfaces\DataBaseObjectInterface;

abstract class BaseTable implements DataBaseObjectInterface
{

    protected $db;
    protected $tableName;

    /**
     * BaseTable constructor.
     */
    public function __construct()
    {
        $connect = Connect::getInstance();
        $this->db = $connect->getConnection();
    }

    /**
     * Get All rows
     * @return bool|\mysqli_result
     */
    public function getAll()
    {
        return $this->db->query('SELECT * FROM '.$this->tableName);
    }

    /**
     * Get one row by id
     * @param $id
     * @return bool|\mysqli_result
     */
    public function getOne($id)
    {
        return $this->db->query('SELECT * FROM '.$this->tableName.' WHERE id ='.$id);
    }

    /**
     * Save row
     * @return mixed
     */
    abstract function save();

    /**
     * Update row
     * @param $id
     * @return mixed
     */
    abstract function update($id);

}