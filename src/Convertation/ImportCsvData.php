<?php

namespace YiiTaskForce\Convertation;

use YiiTaskForce\Exceptions\FileExistException;
use YiiTaskForce\Exceptions\FileOpenException;
use YiiTaskForce\Exceptions\StringQueryException;
use YiiTaskForce\Exceptions\SqlRecordException;

class ImportCsvData
{
    public static $fileCsvPath = '../data/categories.csv'; // 'string' путь к файлу .csv; 
    public static $values = []; // 'array' массив значений  файла csv
    public static $columns = []; // 'array' массив имен столбцов файла csv
    public static $valuesTotalString = ""; //string все значения $values в одну строку
    public static $fileSqlPath = '../data/categories.csv'; // 'string' путь к файлу .sql 
    public static $dbTableName = 'category'; // 'string', имя таблицы в базе данных;
    public static $columnsSql = ""; //string промежуточная переменная метода getCsvColumns
    public $sqlData = ""; // 'string'
    
   

    public function __construct( string $fileCsvPath,  string $fileSqlPath, string $dbTableName)
    {
        $this->fileCsvPath = $fileCsvPath;
        $this->fileSqlPath = $fileSqlPath;
        $this->dbTableName = $dbTableName;
    }


    /**
    * Проверка существования файла и возможности его открыть для чтения
    * @param string $fileCsvPath
    * @return void
    * @throws FileExistException
    * @throws FileOpenException
    */

    public function parseCSV (string $fileCsvPath): void
    {
        if (!file_exists($this->fileCsvPath)) {

            throw new FileExistException('Файл не найден в данной директории'); 
        }

        $this->fp = fopen($this->fileCsvPath, "rb");

        if (!$this->fp) {
            throw new FileOpenException('Не удалось открыть файл для чтения'); 
        }

    }

    /**
    * Получаем имена столбцов файла *csv
    * @param string $fileCsvPath
    * @return string
    */
   
    public static function getCsvColumns($fileCsvPath): string 
    {
        $file = new \SplFileObject($fileCsvPath);

        $file->setFlags(\SplFileObject::READ_CSV);

        $file->setCsvControl(",", '"', "\"");   

        
        //получаем заголовки полей/столбцов
      
        $file->seek(0);
        //$columnsCsv[0] = $file->fgetcsv(",");
        $columns = implode (", ", $file->fgetcsv()); // string

       return $columns;

    }

    public static function loadCsvValues($fileCsvPath): string
    {
        
        $file = new \SplFileObject($fileCsvPath);
        $file->setFlags(\SplFileObject::READ_CSV /*| \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY*/);
        
    
        //считаем кол-во строк csv-файла
        
        $row = 0; 

        while (!empty($file->fgetcsv(","))) {
           
            $row++;
        }

        //получаем строки значений полей из csv-файла
       
        $file->rewind();
                
        $i = 0;

        for ($i = 0; $i <= $row - 1; $i++) {
            
            $values[] = implode (", ", $file->current()); 
                        
            $file->next();
        }

        unset($values[0]);

        $valuesTotalString = implode ("; \n", $values);

        return $valuesTotalString;
    }
    
    
          
    /**
    * Формирует строки запроса INSERT для записи в sql-файл
    * @param string $dbTableName
    * @param string $fileCsvPath
    * @param string $fileSqlPath
    * @return string $sqlData
    * @throws SqlRecordException
    */
    public function getSqlQuery(string $fileCsvPath, string $dbTableName): string
    {
       
       $col = self::getCsvColumns($fileCsvPath);
       $val = self::loadCsvValues($fileCsvPath);


        $format = "INSERT INTO ${dbTableName} (${col}) VALUES (${val})";        
    
        $this->sqlData = sprintf ($format, $this->dbTableName, $col, $val);
        
        if (empty($this->sqlData)) {

            throw new StringQueryException('Не удалось записать данные в строку запроса INSERT');
        }

        return $this->sqlData;
    }

    /**
    * Функция для записи строки запроса INSERT в sql-файл
    * @param string $fileSqlPath
    * @return true
    */

    
    public function writeSqlFile ( string $fileSqlPath,string $dbTableName ): bool
    {
        $fw = fopen($fileSqlPath , 'w');
        
        if (!$fw) {

            throw new FileOpenException('Не удалось открыть sql-файл для записи');
        }

        $sqlString = self::getSqlQuery($fileSqlPath, $dbTableName);
       
        //fclose($fd);

        $file = new \SplFileObject($sqlString, "w");
        
        $record = $file->fwrite($sqlString, 1000);

        if ($record === false) {

            throw new SqlRecordException('Не удалось записать данные в sql-файл');  
        } 
           return true;
    }
}
