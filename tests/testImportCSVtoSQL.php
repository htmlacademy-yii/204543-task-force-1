<?php
require_once '../vendor/autoload.php';

    /**
      * File for testing Import csv-files to SQL data base
      */

use YiiTaskForce\Convertation\ImportCsvData;
use YiiTaskForce\Convertation\RecordToSQL;
use YiiTaskForce\Exceptions\FileExistExcetion;
use YiiTaskForce\Exceptions\FileSizeExcetion;
use YiiTaskForce\Exceptions\FileOpenExcetion;

//настройки assert()
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_CALLBACK, function () {
        echo '<hr />';
        echo func_get_arg(3);
    });


$fileCsvPath = '../data/categories.csv';
$importcsv = new ImportCsvData($fileCsvPath);

$importcsv->filePath = $fileCsvPath;

try {
    $importcsv->parseCSV($fileCsvPath);
}   catch (\Exception  $e) {
    assert ($e instanceof FileExistException, 'File does not exist in this directory');
    }
    catch (\Exception  $e) {
    assert ($e instanceof FileSizeException, 'File is empty');
    }
    catch (\Exception  $e) {
    assert ($e instanceof FileOpenException, 'Failed to open file for reading');
    }

assert (1 == 2, 'test ImportCSVData::parseCSV() is completed');

echo '<hr /> . $columns';"\n";
var_dump($importcsv->getCsvLines($fileCsvPath));"\n";

echo '<hr /> . $columnsNames';"\n";
var_dump($importcsv->columnsNames);"\n";

echo '<hr /> .$values';"\n";
var_dump($importcsv->values);"\n";

echo '<hr /> . $valueString';"\n";
var_dump($importcsv->valueString);"\n";

echo '<hr /> . $row';"\n";
var_dump($importcsv->row);"\n";

echo '<hr /> . $csvData';"\n";
var_dump($importcsv->csvData);"\n";

$fileCsvPath = '../data/categories.csv';
$fileSqlPath = '../data/sql/category.sql';
$dbTableName = 'category';

 
echo '<hr /> . $sqlData';"\n";
var_dump($importcsv->getSqlQuery());"\n";


assert(false, 'test ImportCsvData::getCsvLines() is completed');
