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
        .jumbotron{margin:5px auto;padding:5px 5px; width:1200px;
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
        }
}

/** remember to refactor!!!!!!! */

class csv {

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


        /** call the table style striped */

        $table = "<table class='table table-striped'>";

        /** var  $count initialization for table creation loop */

        $count = 0;

        /** start the loop to produce the table and print it out  */

        echo (table::create_table_body($records,$count,$table));


    }
}

class theader {

    /** class to create the header for the table */

    static public function create_header($record,$table) {

        /** add to the variable table the opener for the table header */

        $table .= "<thead><tr>";

        /** loop to create columns in the header */

        foreach ($record as $column) {

                $table .= "<th scope='col'>$column</th>";
            }

        $table .= "</tr></thead>";

        /** returning the variable table back to the html class */

        return $table;
    }

}


class tbody {

    /** class to create the body for the table */

    static public function create_table_body($record,$table) {

        /** add to the variable table the opener for the table body (also used to CR LF the records) */

        $table .= "<tr>";

        /** loop to create columns in the body of the table */

        foreach ($record as $column) {

            $table .= "<td>$column</td>";

        }

        $table .= "</tr>";

        /** returning the variable table back to the html class */

        return $table;
    }

}

class table {

    static public function create_table_body($records,$count,$table)

    {

        foreach ($records as $record) {

            /** use an if statement to identify the header vs. the body of the table */

            if ($count == 0) {

                /** define the style of row, in this case header */


                $table = theader::create_header($record,$table);

            }

            /** create the body of the table */

            else {

                $table = tbody::create_table_body($record,$table);

            }
            /** increment  var $count to support the row creation loop */

            $count++;
        }

        /** close the table */

        $table .= "</table>";

        /** return the table variable back to the main class */

        return $table;
    }
}