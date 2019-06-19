<!-- call for HTML bootstrap style -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSV file to HTML table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>1</title>
    <!-- Bootstrap CSS and other repositories -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.csheros" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- https://www.phpclasses.org/browse/file/116204.html used this website for the jumbotron code underneath -->
    <style>
        .jumbotron{margin:5px auto;padding:5px 5px; width:1500px;
    </style>

</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <h3>CSV file to HTML table</h3>
    <br/>


<?php
/** program to output html table from a csv file */

main::start("database.csv");

/** main class that will run when opening the index page */

class main {

        static public function start($filename) {

            $records = csv::getRecords($filename);
            html ::generateTable($records);
            /**system::printPage($table);
            print_r($records);*/
        }
}

/** remember to refactor!!!!!!! */

class csv {

    /**
     * @param $filename
     * @return array
     */
    static public function getRecords($filename) {

/** Open the csv file and prep it for reading */
        if (($csv_file = fopen("{$filename}", "r")) !== FALSE)
        {
            /** Each line in the file is converted into an individual array that we call $data */
            while (($data = fgetcsv($csv_file, 1000, ",")) !== FALSE)
            {
                /** Each individual array is being pushed into the nested array */
                $records [] = $data;
            }

            /** Close the file */
            fclose($csv_file);
        }
        /** return the array to the main for processing in the html class */
        /** @var array $records */
        return $records;
    }

}

class html {

    static public function generateTable($records) {
        $count = 0;
        echo "<table class='table table-striped'>";
        foreach ($records as $record) {
        if ($count == 0) {

                echo "<thead><tr>";
                foreach ($record as $column) {
                    echo "<th scope='col'>$column</th>";
                }
                echo "</tr></thead>";
            }
        else {
                echo "<tr>";
                foreach ($record as $column) {
                    echo "<td scope='row'>$column</td>";
                }
                echo "</tr>";
        }
        $count ++;
        }
        echo "</table>";
    }
}


/**class system {

    static public function printPage($page) {

        echo $page;
    }
}
*/


