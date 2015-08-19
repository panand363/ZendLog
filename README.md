# ZendLog
Zend 1.12 custom logs saved in Database

ReadMe for Zend Logs

A logging helper library to track a process and log the messages in the Database. This is using a helper class and which can be accessed across the project.

This logging process is based on a Transaction Id. It has been aimed to track a complete process, like , checkout. 
By logging all the satges in the checkout process, Tracking of errors, time spent on each page / process, time taken by 
implementation code and other process can be tracked and identified.

Database Connections are required and can be set in Bootstrap.
<b><p> Please note to add the helper path in the Bootstrap or applicaton.ini <p></b>


<b><p> Database Code </p></b>
<code>
CREATE TABLE `logs`.`_logs` 
( `logs_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id for this table' , 
    `transaction_id` INT NOT NULL COMMENT 'Id for transactions or orders' ,
    `message` TEXT NOT NULL COMMENT 'Message logged' , 
    `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time of last update of this record' ,
     PRIMARY KEY (`logs_id`) , INDEX (`transaction_id`) ) ENGINE = InnoDB;
</code>
