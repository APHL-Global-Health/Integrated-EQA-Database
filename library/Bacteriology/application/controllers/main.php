<?php

require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . 'Library' . DIRECTORY_SEPARATOR . 'tcpdf' . DIRECTORY_SEPARATOR . 'tcpdf.php';
require_once 'pdfCreator.php';

Class Main extends pdfCreator
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

    public function returnFileImagePath($imageName)
    {
        return substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
            . 'Library' . DIRECTORY_SEPARATOR . 'tcpdf' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $imageName;
    }


    public function createInsertStatement($tableName, $dataArray)
    {
        $query['status'] = false;
        $dataArray['createdBy'] = $this->getUserSession();
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


                            $error['status'] = 1;
                            $error['message'] = $this->connect_db->insert_id;


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

    public function deleteWhereCols($where, $table)
    {

    }

    public function returnWhereStatement($array, $group = "", $tableName = "")
    {

        $where = ' where ';
        if (is_array($array)) {
            $st = isset($array['status']) ? '=' . $array['status'] : '<' . '7 ';


            $counter = 0;
            foreach ($array as $key => $value) {

                $where .= $key . "=" . " '$value' ";

                $counter++;
                if ($counter < sizeof($array)) {
                    $where .= ' and ';

                }


            }
            if (!isset($array['status'])) {
                $where .= " and status " . $st . ' ';
            }

            if ($group) {
                if ($tableName == 'tbl_bac_panels_shipments' && $group == true) {
                    $where .= ' group by shipmentId';
                } else {
                    $where .= "group by shipmentId,panelId";
                }
            }
            //$where .= ' order by id desc';
            return $where;

        } else {
            return '';
        }
    }

    public function selectFromTable($tableName, $where = "", $group = "")
    {

        $sql = "SELECT * FROM $tableName";
        if (isset($where)) {

            if (is_array($where)) {
                $sql .= $this->returnWhereStatement($where, $group, $tableName);

            }
        }
//        echo $sql;
//        exit;
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

    public function selectCount($tableName, $where, $col)
    {


        $sql = "SELECT count($col) FROM $tableName";

        if (is_array($where)) {

            $sql .= $this->returnWhereStatement($where);

        } else {
            $sql .= " where " . $col . " = " . $where;
        }
//       echo $sql;
//        exit;
        $result = $this->connect_db->query($sql)->fetch_array(MYSQLI_NUM)[0];

        return ($result);//->num_rows;

        // output data of each row


    }

    public function selectFromDStatusTable($tableName, $where = "")
    {
        $col = $where['column'];
        $status = $where['status'];
        $sql = "SELECT * FROM $tableName where $col in ($status)";

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


    public function deleteFromWhere($tableName, $where)
    {
        $error['status'] = 0;
        try {
            if (isset($tableName)) {
                $sql = "delete from $tableName";
                if (isset($where)) {
                    if (is_array($where)) {
                        $sql .= $this->returnWhereStatement($where);
                    } else {
                        $error['status'] = 0;
                        $error['message'] = 'No where clause found';
                        return $error;
                    }
                }
                if (is_string($sql)) {
                    $result = $this->connect_db->query($sql);

                    if ($result) {
                        $error['status'] = 1;
                        $error['message'] = 'deleted successfully';

                    } else {
                        $error['message'] = $this->connect_db->error;
                    }
                }
            }
            return $error;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function generataPile()
    {


    }


    public function updateTable($tableName, $where, $updateData)
    {
        try {
            $error['status'] = 0;
            if (isset($tableName)) {

                $sql = "update $tableName";
                if (isset($updateData)) {

                    $sql .= $this->returnUpdateStatement($updateData);
                }
                if (isset($where)) {
                    $sql .= $this->returnWhereStatement($where);
                }
                if (is_string($sql)) {
//                    echo $sql;
//                    exit;
                    $result = $this->connect_db->query($sql);

                    if ($result) {
                        $error['status'] = 1;
                        $error['message'] = 'Row Update Successfully';

                    } else {
                        $error['message'] = $this->connect_db->error;
                    }
                }

            }
            return $error;
        } catch (Exception $e) {
            echo $e->getMessage();

        }

    }

    public function returnUpdateStatement($updateInfo)
    {
        try {
            $updateInfo['lastUpdatePerson'] = $this->getUserSession();
//            $updateInfo['updateDate'] = $this->getUserSession();
            $updateStatement = ' ';
            if (sizeof($updateInfo) > 0) {
                $updateStatement .= ' set ';
                $counter = 0;
                foreach ($updateInfo as $key => $value) {

                    $updateStatement .= $key . "=" . " '$value' ";

                    $counter++;
                    if ($counter < sizeof($updateInfo)) {
                        $updateStatement .= ' , ';


                    }


                }
            }

            return $updateStatement;
        } catch (Exception $e) {

        }

    }

    public function getUserSession()
    {
        if (isset($_SESSION)) {
            return $_SESSION['administrators']['admin_id'];
        } else {
            return null;
        }
    }

    public function generatePanelLabels()
    {

    }
}

?>