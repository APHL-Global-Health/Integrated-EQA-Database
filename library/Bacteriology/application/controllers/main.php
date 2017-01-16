<?php


Class Main
{
    protected $username = 'eptadmin';
    protected $password = 'rGQHv]LF*H6(';
    protected $db = 'eptNew';
    protected $host = 'localhost';
    public $connect_db;

    public function __construct()
    {
        $this->connect_db = new mysqli($this->host, $this->username, $this->password, $this->db);

        if (mysqli_connect_errno()) {
            printf("Connection failed: %s", mysqli_connect_error());
            exit();
        }
        return true;

    }

    public function createInsertStatement($tableName, $dataArray)
    {
        $query['status'] = false;
        try {
            $query = "insert into " . $tableName . " ( ";
            $counter = 0;
            $values = ' VALUES (';
            foreach ($dataArray as $key => $value) {

                $query .= $key;
                $values .= "'$value'";
                $counter++;
                if ($counter < sizeof($dataArray)) {
                    $query .= ',';
                    $values .= ',';

                } else {
                    $query .= ')';
                    $values .= ')';
                }


            }

            $query .= $values . ';';


        } catch (Exception $error) {
            echo $error->getMessage();
            die();
        }
        return $query;
    }

    public function insertData($tableName, $dataArray)
    {
        $error['status'] = 0;
        try {
            if (isset($tableName)) {
                if (isset($dataArray) && is_array($dataArray)) {

                   $queryStatement = $this->createInsertStatement($tableName, $dataArray);

                    if (is_string($queryStatement)) {
                        $queryStatus = $this->connect_db->query($queryStatement);
                        if ($queryStatus) {


                            $error['status']=1;
                            $error['message'] = 'Data inserted successfully';


                        } else {
                            $error['message'] = $this->connect_db->error;
                        }
                    }



                } else {
                    $error['message'] = 'Incorrect data format';
                }
            } else {
                $error['message'] = 'incorrect table name';
            }
        } catch (Exception $error) {
            echo $error['message'] = 'Error occured while inserting ' . $error->getMessage();
        }
        return ($error);
    }

    public function returnWhereStatement($array){
        $where =' where ';
        if(is_array($array)){
            $counter=0;
            foreach ($array as $key => $value) {

                $where .= $key ."="." '$value' ";

                $counter++;
                if ($counter < sizeof($array)) {
                    $where .= ' and ';


                } else {
                    $where .= ' order by id desc';

                }


            }
            return $where;
        }else{
            return '';
        }
    }
    public function selectFromTable($tableName,$where="")
    {

        $sql = "SELECT * FROM $tableName";
        if(isset($where)) {
            if(is_array($where)) {
                $sql .= $this->returnWhereStatement($where);
            }
        }
        $result = $this->connect_db->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_object()) {
                $user_arr[] = $row;
            }

            return $user_arr;
        } else {
            return false;
        }

    }


}

?>