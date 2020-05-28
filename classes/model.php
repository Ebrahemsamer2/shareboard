<?php 

abstract class Model
{
	protected $pdo;
	protected $stmt;

	public function __construct()
	{
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
		);
		$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";
		try
		{
			$this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options); 
		}
		catch(PDOException $e)
		{
			$error_msg = $e->getMessage();
			echo $error_msg;
		}
	}

	public function query($query)
	{
		$this->stmt = $this->pdo->prepare($query);
	}

	public function bind($param, $value)
	{
		if(is_int($value))
		{
			$this->stmt->bindValue($param, $value, PDO::PARAM_INT);
		}
		else if(is_string($value))
		{
			$this->stmt->bindValue($param, $value, PDO::PARAM_STR);
		}
		else if(is_bool($value))
		{
			$this->stmt->bindValue($param, $value, PDO::PARAM_BOOL);
		}
		else
		{
			$this->stmt->bindValue($param, $value);
		}
	}

	public function execute()
	{
		if($this->stmt->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function result()
	{
		return $this->stmt->fetchAll();
	}

	// Some Custom DB Function

	// get all rows in $table as object
	public function getAll($table)
	{
		$query = "SELECT * FROM $table";
		$this->query($query);
		$this->execute();
		return $this->result();
	}

	// insert using arr of $columns and array of $values
	public function insert($table, $columns, $values)
	{
		$query = "";
		$imploded_columns = implode(",", $columns);
		$imploded_values = implode(",:", $columns);

		$query .= "INSERT INTO $table ($imploded_columns) VALUES (:$imploded_values)";
		echo $query;

		$this->query($query);
		for($i = 0; $i < count($values); $i++) {
			$this->bind(":".$columns[$i], $values[$i]);
		}
		return $this->execute() ? true : false;
	}

	// update using arr of $columns and $values
	public function update($table, $columns, $values, $id)
	{
		$query = "UPDATE $table SET ";
		for($i = 0; $i < count($values); $i++) {
			$col = $columns[$i];
			$val = $values[$i];
			$query .= "$col = :$col";
			if($i != count($columns) - 1)
			{
				$query .= ",";
			}
		}
		$query .= " WHERE id = :id"; 
		$this->query($query);
		for($i = 0; $i < count($values); $i++) {
			$this->bind(":".$columns[$i], $values[$i]);
		}
		$this->bind(":id", $id);
		return $this->execute();
	}

	// delete using id
	public function deleteWithId($table, $id)
	{
		$this->query("DELETE FROM $table WHERE id = :id");
		$this->bind(":id", $id);
		return $this->execute();
	}

}