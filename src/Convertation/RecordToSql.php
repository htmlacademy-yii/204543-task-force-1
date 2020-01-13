<?php 

	namespace YiiTaskForce\Convertation;

	class RecordToSQL
	{
		public $fileCsvPath = ""; // 'string' путь к файлу .csv;
		public $fileSqlPath = ""; // 'string' путь к файлу .sql;
		public $dbTableName = 'category'; // 'string', имя таблицы в базе данных;
		public $sqlData = ""; // 'string'

		
		public function __construct($path, $sqlPath)
    	{
        	$this->fileCsvPath = $fileCsvPath;
        	$this->fileSqlPath = $fileSqlPath;
        	$this->dbTableName = $dbTableName;
    	}

    	public function getSqlQuery( /*string $fileCsvPath, string $fileSqlPath*/ ): string
    	{
    		/*$file = new \SplFileObject('../data/categories.csv');
        	$file->setFlags(\SplFileObject::READ_CSV);
        	$file->setCsvControl(",", '"', "\"");*/

        	/*$sqlQuery = sprintf(
			"INSERT INTO `%s` (%s) " . PHP_EOL . "VALUES " . PHP_EOL . "%s;",
			$tableName,
			implode(', ', array_map(function($item) {
				return "`{$item}`";
			}, $columns)),
			implode(', ' . PHP_EOL, $values)
		);  */

			$format = 'INSERT INTO %1$s (%2$s) VALUES (%3$s)'; 
			$sqlData = sprintf ($this->format, 'category', 'name, icon', 'Уборка, clean'); 

			return $this->sqlData;
    	}
	}