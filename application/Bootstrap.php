<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initDatabase()
    {
        $params = array(
            'host'      =>  'localhost',
            'username'  =>  'root',
            'password'  =>  'root',
            'dbname'    =>  'logs'
        );
        $db = Zend_db::factory('Pdo_Mysql',$params);
        Zend_Db_Table::setDefaultAdapter($db);
        Zend_Registry::set('db_params',$params);
        Zend_Registry::set('db',$db);
    }
    
    public function _initLoader()
    {
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');	 
    }
}

