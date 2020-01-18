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
    public static $fileSqlPath = '../data/sql/category.sql'; // 'string' путь к файлу .sql 
    public static $dbTableName = 'category'; // 'string', имя таблицы в базе данных;
    public static $columnsSql = ""; //string промежуточная переменная метода getCsvColumns
    
    
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

        $columnsSql = implode (", ", $file->fgetcsv(",")); // string

        return $columnsSql;

    }
    


     /**
    * Получает значения полей csv-файла, записыввает их в строку запроса INSERT и формирует массив из запросов INSERT
    * @param string $fileCsvPath
    * @return string $dbTableName
    * @return array
    * @throws StringQueryException
    * */

    public static function loadCsvValues( string $fileCsvPath, string $dbTableName): string
    {
        
        $file = new \SplFileObject($fileCsvPath);

        $file->setFlags(\SplFileObject::READ_CSV);
        
            //считаем кол-во строк csv-файла
        
        $row = 0; 

        while (!empty($file->fgetcsv(","))) {
           
            $row++;
        }

        $columnsSql = self::getCsvColumns($fileCsvPath); //string

        //получаем строки значений полей из csv-файла
       
        $file->rewind();
                
        $i = 0;

        for ($i = 0; $i <= $row - 1; $i++) {


            $values = implode (", ", $file->current()); //string
            $values = '"' . implode ('", "', $file->current()) . '"';            
            $file->next(); 
                       
            $format =  "INSERT INTO %s (%s) " . PHP_EOL . "VALUES " . PHP_EOL . "%s;";
            //$format =  'INSERT INTO %s (%s) ' . PHP_EOL . 'VALUES ' . PHP_EOL . '(%s);';
            $sqlData[] = sprintf ($format, $dbTableName, $columnsSql, $values);

        }

        //получили массив из строк запросов INSERT

        unset($sqlData[0]); //удаляем первую строку с именами столбцов

        if (empty($sqlData)) {

            throw new StringQueryException('Не удалось записать данные запроса INSERT');
        }

        $sqlString = implode(" \n\r", $sqlData); //string - строка из массива строк запросов

        return  $sqlString;
    }   


    /**
    * Записывает строки запроса INSERT в sql-файл
    * @param string $fileSqlPath
    * @param string $dbTableName
    * @return bool
    */
    
    public function writeSqlFile (string $fileCsvPath, string $fileSqlPath, string $dbTableName ): bool
    {   
        
        $sqlString = self::loadCsvValues($fileCsvPath, $dbTableName);
       
        $record = file_put_contents ( $fileSqlPath, $sqlString, FILE_USE_INCLUDE_PATH | LOCK_EX | FILE_APPEND);

        if ($record === false) {

            throw new SqlRecordException('Не удалось записать данные в sql-файл');  
        } 
           return true;
    }
}
