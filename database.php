<?php
class Database extends SQLite3{
	function __construct(){
		$this->open('topsoftinc.db');
    }


    function create_db_tables($db){
        $sql =<<<EOF
        CREATE TABLE EMPLOYEES(
            Id INT PRIMARY KEY     NOT NULL,
            Name           TEXT    NOT NULL,
            DateJoined DATE NULL
         );
         
         
        EOF;
            
            $data = array();
        
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $data[] = $row;
            }
            
            echo json_encode($data);   
    }

    function insert_tbl_employees(){
        $sql =<<<EOF
        
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (1, 'Nabimanya Nelson John Paul', '2019.12.12');
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (2, 'Kenneth Ojakol', '2020.06.13' );
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (3, 'Thomas Kyamagero', '2020.09.14' );
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (4, 'Paul Nabimanya', '2016.01.01' );
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (5, 'Kyamagero Paul', NULL );
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (6, 'Ssali Peter', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (7, 'Zizinga Pius', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (8, 'Jalia Nabukalu Esther', '2020.09.28');
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (9, 'John Zizinga', '2020.01.01');
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (10, 'Sharon Opoka', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (11, 'Nabimanya Paul', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (12, 'Ojakol Kenneth', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (13, 'Ojakol Jane Sharon', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (14, 'Kikoyo Paul', NULL);
         
         INSERT INTO EMPLOYEES(Id, Name, DateJoined)
         VALUES (15, 'Esther Nabukalu', NULL);
        EOF;
    }

    function get_employees($db){
        $sql =<<<EOF
        SELECT * from EMPLOYEES;
        EOF;
            
            $data = array();
        
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $data[] = $row;
            }
            
            return json_encode($data);   
    }

    function get_designations($db){
        $sql =<<<EOF
        SELECT * from DESIGNATIONS;
        EOF;
            
            $data = array();
        
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $data[] = $row;
            }
            
            return json_encode($data);   
    }
}
?>