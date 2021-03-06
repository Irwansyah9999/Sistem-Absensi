<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use engine\database\order\DDLQuery;
use engine\database\order\OtherQuery;
/**
 * Description of Jadwal
 *
 * @author Irwansyah
 */
class Jadwal {
    //put your code here
	// nama tabel bisa diubah pada variabel $tableName
    public $ddl,$other,
            $tableName = "Jadwal";
    
    
    
    public function __construct() {
        $this->ddl = new DDLQuery();
        $this->other = new OtherQuery();
    }
    
    public function create() {
        /* 
		fungsi dengan tipe data yang tersedia. Seperti varchar, integer, floats, char dan text
		(nama kolom,kosong atau tidak atau default,panjang length,nilai default,autoIncrement{khusus int})
		
		fungsi tanpa tipe data yang tidak tersedia. Selain yang disebutkan pada paragraf pertama
		(nama kolom,tipe data,kosong atau tidak atau default,panjang length,nilai default,autoIncrement{khusus int})
		
		*/
        
        $this->ddl->varchar("varchar","not null",10);
        $this->ddl->integer("int","not null",10,"","autoIncrement");
        $this->ddl->floats("float","default",10,6.5);
        $this->ddl->char("char","null");
        $this->ddl->text("text");
        $this->ddl->typeData("columnName","date", "null", 20,"autoIncrement");
        
        $this->ddl->primaryKey("columnName");
        $this->ddl->foreignKey("columnName","tableName","columnNameTable");
        $this->ddl->unique("columnName");
        
        $this->ddl->createTable($this->tableName)->ready();
    }
    
    public function alter(){
        $this->ddl->alterTable($this->tableName)->addPrimaryKey("namaKolom");
        //$this->ddl->alterTable($this->tableName)->change($columnBefore, $columnAfter);
		//$this->ddl->alterTable($this->tableName)->add($column,$afterColom);
        //$this->ddl->alterTable($this->tableName)->modify($columnBefore,$typeData);
        //$this->ddl->alterTable($this->tableName)->drop($columnName);
        
        
        $this->ddl->execute($this->ddl->executeAlter());
    }
    
    public function truncate(){
        $this->other->truncate($this->tableName);
        
        $this->other->ready();
    }

    public function drop(){
        $this->other->dropTable($this->tableName);
        
        $this->other->ready();
    }
}
