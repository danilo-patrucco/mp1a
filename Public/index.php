<?php
/** program to output html table from a csv file */

main::start("database.csv");

/** main class that will run when opening the index page */

class main {

        static public function start($filename) {

            $records = csv::getRecords($filename);
            html ::generateTable($records);
            //system::printPage($table);
            //print_r($records);
        }
/**     $records = csv::getRecords();
        $table = html::generateTable($records);

*/
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

        echo "<table>";
        foreach ($records as $record) {
            echo "<tr>";
            foreach ($record as $column) {
                echo "<td>$column</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

final class system {

    static public function printPage($page) {

        echo $page;
    }
}



