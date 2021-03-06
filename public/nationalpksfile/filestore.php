<?php

 class Filestore {

     public $filename = '';
     public $handle;


     function __construct($filename = '') {
          $this->filename = $filename;
     }

     /**
      * Returns array of lines in $this->filename
      */
     function read_lines() {
            $contents_array = [];

        if (filesize($filename) > 0) {
            $this->handle = fopen($this->filename, "r");
            $contents = trim(fread($this->handle, filesize($this->filename)));
            $contents_array = explode("\n", $contents); 
            fclose($handle);
        }
        return $contents_array;   
         }

     /**
      * Writes each element in $array to a new line in $this->filename
      */
     function write_lines($array) {
        $this->handle = fopen($this->filename, 'w');

          foreach ($array as $line) {
              fwrite($this->handle, $line . PHP_EOL);
              
          }

        fclose($this->handle);
     }

     /**
      * Reads contents of csv $this->filename, returns an array
      */
     function read_csv() {
        $csvRow = [];

        $this->handle = fopen($this->filename, 'r');
        //errorMessage();
        //!feof = while not at the end of file for the pointer $handle, do the following things".

        while (!feof($handle)) {
            $row = fgetcsv($this->handle);
        //take each row from the $handle and if its not empty create a new array value called $row           
            if (!empty($row)){
                    $csvRow[] = $row;
                }

            }

        fclose($this->handle);
        return $csvRow;
            // Code to read file $this->filename

     }

     /**
      * Writes contents of $array to csv $this->filename
      */
     function write_csv($array) {
          $this->handle = fopen($this->filename, 'w');

          foreach ($array as $row) {
              fputcsv($this->handle, $row . PHP_EOL);
              
          }

        fclose($this->handle);

     }

 }
