<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getDB
 *
 * @author TOSHIBA
 */
class getDB {
   function __construct() {
       $mongo = new MongoClient();
       $db = $mongo->selectDB('eTicaretDatabase');
       return $db;
   }
}
