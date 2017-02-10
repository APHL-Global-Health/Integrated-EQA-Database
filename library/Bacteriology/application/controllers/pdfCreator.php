<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 2/10/2017
 * Time: 09:18
 */
class pdfCreator
{
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
    public function generatePdfFile(){

    }
}