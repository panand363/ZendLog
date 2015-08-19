<?php

class Application_Model_Logs
{
    /**
     *
     * @var type Database connection
     */
    private $_db;

    /**
     * Constructor: Init Database connections
     */
    public function __construct()
    {
        $this->_db =  Zend_Registry::get('db');
    }
    
    /**
     * Method to to add Logs to the Byod Logs Table
     * If the order_Id exists in the table, then the record is updated, else added.
     * 
     * @param int $orderId
     * @param string $module
     * @param string  $message
     * @return boolean 
     */
    public function setLogs($transactionId, $message)
    {
        // Fetch the transaction Id. 
        $this->_db->beginTransaction();
        try {
             $sql = $this->_db->select()
               ->forUpdate()
               ->from(array('lo'=>'_logs'), array('transaction_id','message'))
               ->where('transaction_id = ?',$transactionId);
       $stmt = $this->_db->query($sql);
       $obj = $stmt->fetchObject();
       
       $transactionIdExists  = isset($obj->transaction_id) ? $obj->transaction_id : FALSE;
       $messageExists = isset($obj->message) ?  $obj->message :  FALSE;
       $logDate = new DateTime('Europe/London');
       if(empty($transactionIdExists)) 
        {
           // Transaction Id does not exists, Add the  Record
           $data =array (
            'transaction_id'  =>  $transactionId,
            'message'   =>  "\n" . $message . "\n" .$logDate->format('d-m-Y H:i:s') . "\n",
            );
            return $this->_db->insert('_logs',$data); 
        } 
        else {
            // Transaction Id exists , Update the Record
            $messageExists .= "\n" . $message .  "\n" . $logDate->format('d-m-Y H:i:s') . "\n";
            $where = $this->_db->quoteInto('transaction_id=?',$transactionId);
            return $this->_db->update('_logs',
                    array('message'=>$messageExists,'last_update'=> $logDate->format('Y-m-d H:i:s')),
                    $where);
        }
        
        $this->_db->commit();
        return true;
        } catch (Exception $ex) {
            $this->_db->rollback();
            echo $ex->getMessage();
            return false;
        }
        
      
    }
           
}

