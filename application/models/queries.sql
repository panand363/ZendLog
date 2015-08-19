/*Database Queries */

/* Create a New Table for adding / updating log entries */
CREATE TABLE `logs`.`_logs` 
( `logs_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id for this table' , 
    `transaction_id` INT NOT NULL COMMENT 'Id for transactions or orders' ,
    `message` TEXT NOT NULL COMMENT 'Message logged' , 
    `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time of last update of this record' ,
     PRIMARY KEY (`logs_id`) , INDEX (`transaction_id`) ) ENGINE = InnoDB;
