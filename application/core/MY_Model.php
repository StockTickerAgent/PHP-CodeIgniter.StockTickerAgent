<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class MY_Model extends CI_Model {

    public function parseURL($url)
    {
        $test = array();
        $row = 1;
        if (($handle = fopen($url, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                $test2 = array();
                for ($c=0; $c < $num; $c++) {
                    $test2[] = $data[$c];
                }
                $test[] = $test2;
            }
            fclose($handle);
        }
        return $test;
    }

}
