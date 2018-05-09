<?php

class Reports_CorrectiveActionsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->addActionContext('corrective-actions-export', 'html')
            ->addActionContext('corrective-actions-export-pdf', 'html')
            ->initContext();
        $this->_helper->layout()->pageName = 'report';
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $reportService = new Application_Service_Reports();
            $response = $reportService->getCorrectiveActionReport($params);
            $this->view->response = $response;
        }
        $scheme = new Application_Service_Schemes();
        $this->view->schemes = $scheme->getAllSchemes();
    }

    public function correctiveActionsExportAction()
    {
        $reportService = new Application_Service_Reports();
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $this->view->exported = $reportService->exportCorrectiveActionsReport($params);
        }
    }

    public function correctiveActionsExportPdfAction()
    {
        $reportService = new Application_Service_Reports();
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $this->view->header = $reportService->getReportConfigValue('report-header');
            $this->view->logo = $reportService->getReportConfigValue('logo');
            $this->view->logoRight = $reportService->getReportConfigValue('logo-right');
            $this->view->dateRange = $params['dateRange'];
            $this->view->shipmentName = $params['shipmentName'];
            $this->view->result = $reportService->exportCorrectiveActionsReportInPdf($params);
        }
    }

    public function capaAction()
    {
        $rService = new Application_Model_DbTable_Distribution();
        $capa = new Application_Model_DbTable_Capa();

        $this->view->surveys = $rService->getFinalizedDistributions();
        $this->view->labs = $capa->enrolledLaboratories();

    }

    public function createFilters($filter)
    {

    }

    public function getAction()
    {

        try {
            $filters = null;
            if ($this->getRequest()->isPost()) {
                $filters = $this->_getAllParams()['filter'];

                $filters['dateSubmittedFrom'] = $filters['startDate'];
                $filters['dateSubmittedTo'] = $filters['endDate'];
            }

            $capa = new Application_Model_DbTable_Capa();

            $capaResults = $capa->getCapaFeedback($filters);

            echo json_encode($capaResults);
        } catch (Exception $e) {

        }
        ///
        exit;
    }
}



