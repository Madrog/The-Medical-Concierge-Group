<?php
    class DataOperations {
        function create_tbl_employees($db){
            $sql =<<<EOF
            CREATE TABLE EMPLOYEES(
                Id INT PRIMARY KEY     NOT NULL,
                Name           TEXT    NOT NULL,
                DateJoined DATE NULL
             );  
             
            EOF;
                
            $ret = $db->exec($sql);
            if(!$ret){
                echo $db->lastErrorMsg();
            } else {
                echo "Table: employees created successfully\n";
            }
        }

        function create_tbl_designations($db){
            $sql =<<<EOF
            CREATE TABLE DESIGNATIONS (
                Id INT PRIMARY KEY      NOT NULL,
                Designation CHAR(50) NOT NULL,
                Emp_Id         INT      NOT NULL
             );
            EOF;
                
            $ret = $db->exec($sql);
            if(!$ret){
                echo $db->lastErrorMsg();
            } else {
                echo "Table: designation created successfully\n";
            }
        }

        function create_db_tables($db){
            create_tbl_employees($db);
            create_tbl_designations($db);
        }
    
        function insert_tbl_data($db){
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

            $ret = $db->exec($sql);

            if(!$ret) {
                echo $db->lastErrorMsg();
            } else {
                echo "Records for Employees created successfully\n";
            }

            $sql =<<<EOF
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (1, 'Manager', 1);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (2, 'Backend Developer', 2 );
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (3, 'Accountant', 3);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (4, 'Director of Operations', 4 );
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (5, 'Network Admin', 5 );
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (6, 'IT Manager', 6);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (7, 'Finance Manager', 7);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (8, 'System Admin Intern', 8);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (9, 'Backend Developer', 9);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (10, 'Communications Manager', 10);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (11, 'Assistant Director Of Operations', 11);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (12, 'Backend Developer', 12);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (13, 'General Caretaker', 13);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (14, 'Front End Developer', 14);
            
            INSERT INTO DESIGNATIONS(Id, Designation, Emp_Id)
            VALUES (15, 'Graphics Designer', 15);
            

            EOF;

            $ret = $db->exec($sql);

            if(!$ret) {
                echo $db->lastErrorMsg();
            } else {
                echo "Records for Designations created successfully\n";
            }
        }
    
        function get_employees_list($db){
            $sql =<<<EOF
                SELECT EMPLOYEES.Id, EMPLOYEES.name, EMPLOYEES.DateJoined AS TimeSpent, DESIGNATIONS.designation 
                FROM EMPLOYEES, DESIGNATIONS WHERE EMPLOYEES.Id = DESIGNATIONS.emp_id;
            EOF;
                
            $data = array();

            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                $data[] = $row;
            }

            
            return $data;   
        }
    }

?>