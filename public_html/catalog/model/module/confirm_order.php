<?php

class ModelModuleProstoSms extends Model {

    private $code = "prosto_sms";

    function isInstalled(){

        $result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "extension` WHERE `code` = '".$this->code."'");
        if($result->num_rows) {
            return true;
        } else {
            return false;
        }
    }
}

?>