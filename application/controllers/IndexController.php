<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       if($this->_helper->Logs->setLogs(12345,'Test Message 1'))
       {
           $this->view->info = "Successfully Added to Logs \n";
       } else {
           $this->view->info = "Error Adding to Logs \n";
       }
    }


}

