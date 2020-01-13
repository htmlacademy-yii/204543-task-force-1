<?php

namespace YiiTaskForce\Convertation;

use YiiTaskForce\Exceptions\FileExistExcetion;
use YiiTaskForce\Exceptions\FileSizeExcetion;
use YiiTaskForce\Exceptions\FileOpenExcetion;

class ImportCsvData
{
    public $fileCsvPath = ""; // 'string' путь к файлу .csv; для категорий = '../data/categories.csv';
    public $values = []; // 'array' массив значений полей файла csv
    public $columns = []; // 'array' массив имен столбцов/полей файла csv
    public $csvData =[]; //'array' массив 1 строки  csv-файла
    public $columnsNames = "";
    public $valuesString = ""; // строка из элементов массива строки csv-файла



    public function __construct( string $fileCsvPath)
    {
        $this->fileCsvPath = $fileCsvPath;
    }
    /**
    * Функция для проверки существования файла и возможности его открыть дял чтения
    * @param string $fileCsvPath
    * @return void
    * @throws FileExistException
    * @throws FileSizeException
    * @throws FileOpenException
    */

    public function parseCSV (string $fileCsvPath): void
    {
        if (!file_exists($this->fileCsvPath)) {
            throw new FileExistException('Файл не найден в данной директории'); // exception needs try-catch in test
        }

        $this->fp = fopen($this->fileCsvPath, "rb");

        if (!$this->fp) {
            throw new FileOpenException('Не удалось открыть файл для чтения'); // exception needs try-catch in test
        }

    }

    /**
    * Функция для получения имен столбцов/полей
    * @param string $fileCsvPath
    * @return string
    */
   
    public function getCsvLines($fileCsvPath)
    {
        $file = new \SplFileObject($this->fileCsvPath);
        $file->setFlags(\SplFileObject::READ_CSV);
        $file->setCsvControl(",", '"', "\"");          

        //получаем заголовки полей/столбцов
      
        $file->seek(0);

        $this->columns = $file->fgetcsv(","); // array

        $this->columnsNames = implode (", ", $this->columns);// string


        //считаем кол-во строк csv-файла
        $row = 0; 

        while (!empty($file->fgetcsv(","))) {
           
            $row++;
        }

        //получаем строки значений полей из csv-файла
        $file->seek(1);
        $i = 1;

        for ($i = 1; $i <= $row - 1; $i++) {
          
          $this->values = $file->fgetcsv(",");  
        
        }

        //либо используем другой цикл, что не меняет картины.. 
    /*
        while (!empty($file->fgetcsv(","))) {
            
            if ($file->key() >= 1) {
            
            $this->values = $file->fgetcsv(","); //array
            $this->valueString = implode(", ", $values); //string  
            $file->next(); 
            
            }
        }    
    */       
       //варианты return для тестирования
        return $this->columns;
        //return $this->values;
        //return $this->valuesString;
        //return $this->columnsNames;
        //return $this->columnsString;
        //return $this->csvData;
    }
    
    public $fileSqlPath = ""; // 'string' путь к файлу .sql;
    public $dbTableName = 'category'; // 'string', имя таблицы в базе данных;
    public $sqlData = ""; // 'string'
    
    /**
    * Функция формирования строки запроса INSERT для записи в sql-файл
    * @param string $dbTableName
    * @param string $fileCsvPath
    * @param string $fileSqlPath
    * @return string $sqlData
    */
    public function getSqlQuery( /*string $dbTableName, string $fileCsvPath, string $fileSqlPath*/ ): string
        {
           
            $format = 'INSERT INTO %1$s (%2$s) VALUES (%3$s)'; 
            //в printf() подставлены значения переменных для тестирования
            $sqlData = printf ($format,'category', 'name, icon', 'Уборка, clean'); 

            return $this->sqlData;

            //далее запись в файл ../data/sql/category.sql
        }
}
