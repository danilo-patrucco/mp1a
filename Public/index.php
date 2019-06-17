<?php
/** program to output html table from a csv file */

main::start("database.csv");

/** main class that will run when opening the index page */

class main {

        static public function start($filename) {

            $records = csv::getRecords($filename);
            $table = html ::generateTable($records);
            system::printPage($table);
            print_r($records);
        }
/**     $records = csv::getRecords();
        $table = html::generateTable($records);

*/
}

/** remember to refactor!!!!!!! */

class csv {

    static public function getRecords($filename) {

/** Open the file for reading */
        if (($csv_file = fopen("{$filename}", "r")) !== FALSE)
        {
            /** Each line in the file is converted into an individual array that we call $data
            The items of the array are comma separated */
            while (($data = fgetcsv($csv_file, 1000, ",")) !== FALSE)
            {
                /** Each individual array is being pushed into the nested array */
                $records [] = $data;
            }

            /** Close the file */
            fclose($csv_file);
            return $records;
        }

    }

}

class html {

    static public function generateTable() {}
}

final class system {

    static public function printPage($page) {

        echo $page;
    }
}



