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

$columns = ImportCsvData::$columnsSql;
$valuesTotalString = ImportCsvData::getCsvColumns('../data/categories.csv');

// FileExistException

try {
    $importcsv->parseCSV('../data/categories.csv');
}   catch (\Exception  $e) {
    assert (!$e instanceof FileExistException, 'File does not exist in this directory');
    }
    catch (\Exception  $e) {
    assert (!$e instanceof FileOpenException, 'Failed to open file for reading');
    }

assert (1 == 2, 'test ImportCSVData::parseCSV() is completed');

echo '<hr /> . $valuesTotalString';"\n";
var_dump($importcsv->loadCsvValues('../data/categories.csv'));"\n";

echo '<hr /> .$columns';"\n";
var_dump(ImportCSVData::getCsvColumns('../data/categories.csv'));"\n";

// проверка записи строки запроса INSERT

echo '<hr /> . $sqlData';"\n";
var_dump($importcsv->getSqlQuery('../data/categories.csv','category', $col, $val));"\n";

// exception StringQueryException

try {
    $importcsv->getSqlQuery('../data/categories.csv', 'category');
}   catch (\Exception  $e) {
    assert (!$e instanceof StringQueryException, 'Failed to write data to sql-file');
}
   
assert(1 == 2, 'test ImportCsvData::getSqlQuery() is completed'); 


// проверка записи данных в sql-файл

// SqlRecordException

try {
    $importcsv->writeSqlFile('../data/sql/category.sql', 'category');
}   catch (\Exception  $e) {
    assert (!$e instanceof FileOpenException, 'Failed to write data to sql-file');
    }

    catch (\Exception  $e) {
    assert (!$e instanceof SqlRecordException, 'Failed to write data to sql-file');
    }   
   
assert(1 == 2, 'test ImportCsvData::writeSqlFile() is completed');    
