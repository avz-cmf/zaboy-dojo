<?php
/**
 * Created by PhpStorm.
 * User: victorsecuring
 * Date: 09.10.16
 * Time: 12:53 PM
 */

return [

    'dataStore' => [

        'users' => [
            'class' => 'zaboy\rest\DataStore\CsvBase',
            'filename' => __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..".DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "csv-storage" . DIRECTORY_SEPARATOR . 'users.csv',
            //'filename' => sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'testCsvBase.tmp',
            'delimiter' => ';',
        ],
        'filters' => [
            'class' => 'zaboy\rest\DataStore\CsvBase',
            'filename' => __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..".DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "csv-storage" . DIRECTORY_SEPARATOR . 'filters.csv',
            //'filename' => sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'testCsvBase.tmp',
            'delimiter' => ';',
        ],
        'testMemory' => [
            'class' => 'zaboy\rest\DataStore\Memory',
        ],
    ]

];