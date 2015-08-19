<?php

/**
 * Class to logs process and messages in the 
 *
 * 
 */#

class Zend_Controller_Action_Helper_Logs extends Zend_Controller_Action_Helper_Abstract
{
    /**
     *
     * @var type Zend Database Connection
     */
    private $_logsModel;
    /**
     *
     * @var type Zend_Plugin_Loader
     */
    public $pluginLoader;

    
    /**
     * Constructor: initialize plugin loader
     * @return void
     */
    public function __construct()
    {
        $this->pluginLoader = new Zend_Loader_PluginLoader();
        $this->_logsModel  = new Application_Model_Logs();
    }

    public function init()
    {
    }
    
    /**
     * 
     * @param int $orderId
     * @param string $module
     * @param string  $message
     * @return boolen
     */
    public function setLogs($transactionId,$message)
    {
            return $this->_logsModel->setLogs($transactionId,$message);
    }


}
