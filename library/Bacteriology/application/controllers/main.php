<?php

require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . 'Library' . DIRECTORY_SEPARATOR . 'tcpdf' . DIRECTORY_SEPARATOR . 'tcpdf.php';

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

    public function returnFileImagePath($imageName)
    {
        return substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
            . 'Library' . DIRECTORY_SEPARATOR . 'tcpdf' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $imageName;
    }

    public function testpdf()
    {

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        // ob_start();
        $pdf->AddPage();

        $pdf->SetTitle('Microbiology Form');
        $pdf->SetHeaderMargin(10);
        $pdf->SetTopMargin(10);
        $pdf->setFooterMargin(0);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE .
            ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        //        $pdf->AddPage();
        $pdf->setTextShadow(array('enabled' => true
        , 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196),
            'opacity' => 1, 'blend_mode' => 'Normal'));
        $img_file = $this->returnFileImagePath('header.jpg');
        $pdf->Image($img_file, 90, 0, 30, 30, '', '', '', false, 300, '', false, false, 0);
        $pdf->setPageMark();
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 0);
        $pdf->setPrintFooter(false);
        // set text shadow effect


        // Set some content to print
        $html = <<<EOD
                        <div style="text-align:center;"><br><br>
                        <h6>NATIONAL PUBLIC HEALTH LABORATORY SERVICES <br>
                        NATIONAL  MICROBIOLOGY REFERENCE LABORATORY, NAIROBI, KENYA
                        </h6>
                        <h5><b>NPHLS/NMRL<br>
                        PROFICIENCY TESTING PROGRAMME - BACTERIOLOGY
                        </b></h5>
                        </div>
                        
                        <div style="text-align:left;font-size:14px;border:1px black solid;">
                  
                        LABORATORY :<br>
                        ADDRESS :<br>
                        LABORATORY CODE :<br>
                        E-MAIL ADDRESS : <br>
                        DATE RECEIVED IN THE LABOLATORY : <br>                   
                        DATE RETURNED :<br>
                        CONDITION OF SAMPLE: SATISFACTORY/UNSATISFACTORY (Tick whichever is applicable)<br>
                        IF UNSATISFACTORY OBSERVATION:_______________________________________________________<br>

                        <div style="border:1px black solid;">
                              <br>
                        RETURN RESULTS TO :<br>
                        Caroline Mbogori <br>
                        Quality Manager :<br>
                        National Microbiology Reference laboratory <br>
                        P. O. Box 20750-00202 <br>
                        
                        Nairobi, Kenya <br>
                        Email address: carombogori@yahoo.com :<br>
                        Tel: +254 723324038  <br>
                        <b>OR  </b><br>
                        Peter Kinyanjui <br>
                        Scheme coordinator<br>
                        National Microbiology Reference laboratory<br>
                        P. O. Box 20750-00202<br>
                        
                        Nairobi, Kenya<br>
                        Email address: ptrkinyanjui@gmail.com<br>
                        Tel: +254 725762055 <br>

                        </div>
                        
                        
                        
                        <br>
                        <div style="text-align:left;border:1px black solid;padding:10px;">
                              <br>
                      <b>  If your laboratory is unable to complete the challenges contained in this survey, please <br>
                        return just this page of the form indicating which reason(s) most adequately explain the problem.<br>
                        o	Laboratory reagents not available.<br>
                        o	Laboratory equipment not functioning<br>
                        o	Laboratory staff on leave.<br>
                        o	Survey content not received in acceptable condition.<br>
                        o	Others (please state)_______________________________________________
                        </b><br>
                        </div>
                        
                        <div>
                        <b>
                            NOTE.<br>
                            	IF THE KIT CONTAINS BROKEN SPECIMEN, AUTOCLAVE THE CONTENT AND DISCARD WITH MINIMAL EXPOSURE TO THE ATMOSPHERE. <br>
                            	PLEASE TREAT THE SPECIMEN AS YOU WOULD NORMAL CLINICAL SAMPLES.<br>
                         </b>
                         <br>
                        <u><b> Completion of Antimicrobial Susceptibility Testing Response Form.</b></u><br>
                        <br>
                        With regards to the Antimicrobial Susceptibility Testing reporting, grading area, it’s essential<br>
                        the laboratories complete the response form correctly and do not omit any information.<br>
                        Figure 1 below clarifies how the susceptibility testing report form should be completed.<br>
                        Figure 1. Completion of Susceptibility Report Form.<br>

                         
                        </div>
                        
                        
                       
EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 60, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('EQA Form.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
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

    public function returnWhereStatement($array)
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
            //$where .= ' order by id desc';
            return $where;

        } else {
            return '';
        }
    }

    public function selectFromTable($tableName, $where = "")
    {

        $sql = "SELECT * FROM $tableName";
        if (isset($where)) {

            if (is_array($where)) {
                $sql .= $this->returnWhereStatement($where);
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

    public function selectCount($tableName, $where = "")
    {


        $sql = "SELECT count(*) FROM $tableName";
        if (isset($where)) {

            if (is_array($where)) {
                $sql .= $this->returnWhereStatement($where);
            }
        }
//        echo $sql;
//        exit;
        $result = $this->connect_db->query($sql);

        return $result->num_rows;
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

}

?>