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

$importcsv = new ImportCsvData('../data/categories.csv', '../data/sql/category.sql', 'category');

//$columnsSql = ImportCsvData::getCsvColumns('../data/categories.csv');
//$sqlString = ImportCsvData::loadCsvVAlues('../data/categories.csv', 'category');


// FileExistException + FileOpenException = проверка метода parseCSV

try {
    $importcsv->parseCSV('../data/categories.csv');
}   catch (\Exception  $e) {
    assert (!$e instanceof FileExistException, 'File does not exist in this directory');
    }
    catch (\Exception  $e) {
    assert (!$e instanceof FileOpenException, 'Failed to open file for reading');
    }

assert (1 == 2, 'test ImportCSVData::parseCSV() is completed');


echo '<hr /> . $sqlString';"\n";
var_dump($importcsv->loadCsvValues('../data/categories.csv', 'category'));"\n";

echo '<hr /> .$columnsSql';"\n";
var_dump(ImportCSVData::getCsvColumns('../data/categories.csv'));"\n";



// exception StringQueryException = проверка записи строки запроса INSERT

try {
    $importcsv->loadCsvValues('../data/categories.csv', 'category');
}   catch (\Exception  $e) {
    assert (!$e instanceof StringQueryException, 'Failed to write data to sql-file');
}
   
assert(1 == 2, 'test ImportCsvData::loadCsvValues() is completed'); 


// SqlRecordException = проверка записи данных в sql-файл

try {
    $importcsv->writeSqlFile('../data/categories.csv', '../data/sql/category.sql', 'category');
}    catch (\Exception  $e) {
    assert (!$e instanceof SqlRecordException, 'Failed to write data to sql-file');
    }   
 
assert(1 == 2, 'test ImportCsvData::writeSqlFile() is completed');    
