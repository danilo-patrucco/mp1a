<?php
/** program to output html table from a csv file */
main::start();

/** main class that will run when opening the index page */
class main {

    static public function start() {
        $records = csv::getRecords();
        $page = html::generateTable($records);
       /** $table = 'test'; */
        system::printPage($table);

    }
}

class csv {

    static public function getRecords() {}

}

class html {

    static public function generateTable() {}
}

class system {

    static public function printPage($page) {

        echo $page;
    }
}



