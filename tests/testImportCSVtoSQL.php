<?php
require_once '../vendor/autoload.php';

    /**
      * File for testing Import csv-files to SQL data base
      */

use YiiTaskForce\Convertation\ImportCsvData;
use YiiTaskForce\Exceptions\FileExistException;
use YiiTaskForce\Exceptions\FileOpenException;
use YiiTaskForce\Exceptions\StringQueryException;
use YiiTaskForce\Exceptions\SqlRecordException;

//настройки assert()
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });


$fileCsvPath = '../data/categories.csv';
$importcsv = new ImportCsvData($fileCsvPath);

$importcsv->fileCsvPath = $fileCsvPath;

try {
    $importcsv->parseCSV($fileCsvPath);
}   catch (\Exception  $e) {
    assert (!$e instanceof FileExistException, 'File does not exist in this directory');
    }
    catch (\Exception  $e) {
    assert (!$e instanceof FileOpenException, 'Failed to open file for reading');
    }

assert (1 == 2, 'test ImportCSVData::parseCSV() is completed');


echo '<hr /> . $valuesTotalString';"\n";
var_dump($importcsv->getCsvLines($fileCsvPath));"\n";

echo '<hr /> .$columns';"\n";
var_dump($importcsv->columns);"\n";

echo '<hr /> .$values';"\n";
var_dump($importcsv->values);"\n";



assert(1 == 2, 'test ImportCsvData::getCsvLines() is completed');


// проверка записи строки запроса INSERT
// ???? при создании объекта класса ImportCsvData() выдает ошибку, что получает null в качестве всех трех аргументов.  



$importcsv = new ImportCsvData($dbTableName, $columns, $valuesTotalString); 
$fileCsvPath = '../data/categories.csv';
$fileSqlPath = '../data/sql/category.sql';
$dbTableName = 'category';

$importcsv->fileCsvPath;
$importcsv->fileSqlPath; 
$importcsv->dbTableName;

$importcsv->columns = $columns;
$importcsv->valuesTotalString = $valuesTotalString;


echo '<hr /> . $sqlData';"\n";

// вариант с подставленными значениями параметров для отладки
//var_dump($importcsv->getSqlQuery('category', 'name, icon', 'Курьерские услуги, delivary; Уборка, clean;'));"\n";
//
var_dump($importcsv->getSqlQuery($dbTableName, $columns, $valuesTotalString));"\n";
// exception StringQueryException


try {
    $importcsv->getSqlQuery($dbTableName, $columns, $valuesTotalString);
}   catch (\Exception  $e) {
    assert (!$e instanceof StringQueryException, 'Failed to write data to sql-file');
}
   
assert(1 == 2, 'test ImportCsvData::getSqlQuery() is completed'); 

// проверка записи данных в sql-файл
// SqlRecordException

$fileSqlPath = '../data/sql/category.sql';

$importcsv = new ImportCsvData('../data/sql/category.sql'); 
$importcsv->fileSqlPath = $fileSqlPath;

try {
    $importcsv->writeSqlFile($fileSqlPath);
}   catch (\Exception  $e) {
    assert (!$e instanceof SqlRecordException, 'Failed to write data to sql-file');
}
   
assert(1 == 2, 'test ImportCsvData::writeSqlFile() is completed');    
