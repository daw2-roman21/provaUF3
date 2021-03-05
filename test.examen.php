<?php
        require("class.pdofactory.php");
        require("abstract.databoundobject.php");
        require("class.employee.php");
        require("class.logs.php");
        require_once('class.Config.php');
        require_once('class.Logger.php');

        //CONEXION BD
        $strDSN = "pgsql:dbname=examen;";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //
        Config::addConfig('LOGGER_FILE', 'logEmployee.log');
        Config::addConfig('LOGGER_LEVEL', Logger::DEBUG);


        // $objEmployee = new Employee($objPDO);
        // //RELLENAMOS USUARIO
        // $objEmployee->setfirst_name("Alex");
        // $objEmployee->setlast_name("Roman");
        // $objEmployee->setage(21);
        // $objEmployee->setaddress("Direccion Alex");
        // $objEmployee->setcity("Ciudad Alex");
        // $objEmployee->setid(1);

        // $objEmployee2 = new Employee($objPDO);
        // //RELLENAMOS USUARIO
        // $objEmployee2->setfirst_name("Nombre2");
        // $objEmployee2->setlast_name("Apellido2");
        // $objEmployee2->setage(50);
        // $objEmployee2->setaddress("Direccion 2");
        // $objEmployee2->setcity("Ciudad 2"); 
        // $objEmployee2->setid(2);
        // //GUARDAMOS USUARIO
        // $objEmployee->Save();
        // $objEmployee2->Save();
        
        $objEmployee3 = new Employee($objPDO,100);
        $objEmployee3->setid(100);
        $objEmployee3->setfirst_name("Nombre3");
        $objEmployee3->setlast_name("Apellido3");
        $objEmployee3->setage(9999);
        $objEmployee3->setaddress("Direccion 3");
        $objEmployee3->setcity("Ciudad 3"); 
        
        $objEmployee3->Save();
        logear($objEmployee3, "Guardar", $objPDO);
        
        print "Borrando EMployee 100...";

        $objEmployee3->MarkForDeletion();
        logear($objEmployee3, "Eliminar", $objPDO);
        print "BORRADO";
        


        function logear($objEmployee3, $modo, $objPDO){
            $objLogs = new Logs($objPDO);
            $log = Logger::getInstance();
            
            //MIRO SI EL ID NO ES NULO
        
            if(null !== $objEmployee3->getid()) {
                //DEBUGAMOS
                $log->logLevel = 100;   //100=DEBUG
                $objLogs->setloglevel(100);
                $objLogs->setoperacio($modo);
                //$objLogs->seteffecttime();
                $objLogs->setfirst_name($objEmployee3->getfirst_name());
                $objLogs->setlast_name($objEmployee3->getlast_name());
                $objLogs->setage($objEmployee3->getage());
                $objLogs->setaddress($objEmployee3->getaddress());
                $objLogs->setcity($objEmployee3->getcity());
                $objLogs->setidemployee($objEmployee3->getid());
                print "<h1>" . $objEmployee3->getid(). "</h1>";
                //$log->logMessage('Tenemos id ', Logger::DEBUG);
                //LOG_INFO is the default so this would get printed
                
                $log->logMessage(
                        "IDENTIFICADOR: " . $objEmployee3->getid() . "   "
                        . $objEmployee3->getfirst_name()
                        . "?" . $objEmployee3->getlast_name()
                        . "?" . $objEmployee3->getage()
                        . "?" . $objEmployee3->getaddress()
                        . "?" . $objEmployee3->getcity() . "\t$modo", Logger::DEBUG);
                $objLogs->Save();
            } else {
                //This will also be written, and includes a module name
                $log->logLevel = 5;
                $log->logMessage('NO EXISTE LA ID', Logger::CRITICAL, "NO HAY ID\t$modo");
                
                throw new Exception('NO ID');
            }
        }
        // print "<br>Usuarios creados y guardados<br>";
        // print "Nombres: " . $objEmployee->getfirst_name() . " " . $objEmployee2->getfirst_name();
        // $id = $objEmployee->getID();
        // print "ID in database is " . $id . "<br />";

        // print "Destroying object...<br />";
        // unset($objEmployee);

        // print "Recreating object from ID $id<br />";
        // $objEmployee = new User($objPDO, $id);

        // print "First name is " . $objEmployee->getFirstName() . "<br />";
        // print "Last name is " . $objEmployee->getLastName() . "<br />";

        // print "Committing a change.... Steve will become Steven, 
        //        Nowicki will become Nowickcow<br/>";
        // $objEmployee->setFirstName("Steven");
        // $objEmployee->setLastName("Nowickcow");
        // print "Saving...<br />";
        // $objEmployee->Save();


        // //CREO EMPLEADO
        // $objEmployee2 = new Employee($objPDO);
        // //RELLENAMOS EMPLEADO
        // $objEmployee2->setemp_name("Steve");
        // $objEmployee2->setdesignation_id(1);
        // $objEmployee2->setdepartment_id(1);
        // $objEmployee2->setstaff_type(1);
        
        // print "<br>NOMBRE EMPLEADO: " . $objEmployee2->getemp_name();


        // //GUARDAMOS EMPLEADO
        // $objEmployee2->Save();
        // $id = $objEmployee2->getID();
        // print "<br>ID in database is " . $id . "<br />";

        // //CREO DEPARTAMENTO
        // $objEmployee3 = new Department($objPDO);
        // //RELLENAMOS DEPARTAMENTO
        // $objEmployee3->setdept_name("Departamento 1");
        // $objEmployee3->setdept_description("DESCRIPCION DEL DEP 1");

        // print "<br>NOMBRE DEPARTAMENTO: " . $objEmployee3->getdept_name();
        // //GUARDAMOS EL DEPARTAMENTO
        // $objEmployee3->Save();
        // $id = $objEmployee3->getID();
        // print "<br>ID in database is " . $id . "<br />";
?>
