<?php
ini_set('error_reporting', E_ALL);


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

$cities = new ImportCSVData('../data/cities.csv', '../data/sql/cities.sql', 'cities'); 

echo '<hr /> . $sqlString';"\n";
var_dump($cities->loadCsvValues('../data/cities.csv', 'cities'));"\n";

echo '<hr /> .$columnsSql';"\n";
var_dump(ImportCSVData::getCsvColumns('../data/cities.csv'));"\n";

try {
    $cities->parseCSV('../data/cities.csv');
}   catch (\Exception  $e) {
    assert (!$e instanceof FileExistException, 'File does not exist in this directory');
    }
    catch (\Exception  $e) {
    assert (!$e instanceof FileOpenException, 'Failed to open file for reading');
    }

// exception StringQueryException = проверка записи строки запроса INSERT

try {
    $cities->loadCsvValues('../data/cities.csv', 'cities');
}   catch (\Exception  $e) {
    assert (!$e instanceof StringQueryException, 'Failed to write data to sql-file');
}
   
assert(1 == 2, 'test ImportCsvData::loadCsvValues() is completed'); 


// SqlRecordException = проверка записи данных в sql-файл

try {
    $cities->writeSqlFile('../data/cities.csv', '../data/sql/cities.sql', 'cities');
}    catch (\Exception  $e) {
    assert (!$e instanceof SqlRecordException, 'Failed to write cities data to sql-file');
    }   
 
assert(1 == 2, 'test ImportCsvData::writeSqlFile() is completed');    

assert(1 == 2, 'test loading cities is completed');  
