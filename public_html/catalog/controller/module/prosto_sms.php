<?php

class ControllerModuleProstoSms extends Controller
{

    static $types = array(
        'order' => 1,
        'customer' => 2,
        'address' => 3
    );

    public function sendEmail($message, $subject)
    {
        $this->load->model('setting/setting');
        $setting = $this->model_setting_setting->getSetting('prosto_sms');
        $email = $setting['sendConfirmCodeEmail'];
        if (!empty($email)) {
            $headers = "From: {$this->config->get('config_email')} \r\n" .
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n";
            mail($email, $subject, $message, $headers);
        }
    }

    public function validate_code()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $status = false;
            $code = $this->request->post['code'];
            $orderNum = (int)substr($code, 0, -2);
            $partPhone = (int)substr($code, -2);

            $sql = "SELECT lastname, firstname, payment_address_1, telephone FROM " . DB_PREFIX . "order WHERE order_id = " . $orderNum . " ORDER BY order_id DESC LIMIT 1";

            $rows = $this->db->query($sql)->rows;
            if (!empty($rows)) {
                $partTelephone = (int)substr($rows[0]['telephone'], -2);
                if ($partTelephone == $partPhone) {
                    $status = true;
                }
            }

            if ($status) {
                $customData = self::getCustomData('order', $orderNum, 'order');

                $rowData = $rows[0];
                $subject = "Заказ №{$orderNum}  подтвержден по смс";
                $message = "ФИО: {$rowData['lastname']} {$rowData['firstname']} {$customData['custom_second_name']['value']} <br>";
                $message .= "Адрес: {$rowData['payment_address_1']} <br>";
                $message .= "Телефон: {$rowData['telephone']} <br>";

                $productsMsg = '';
                $products = self::getOrderProducts($orderNum);
                foreach ($products as $product) {
                    $productsMsg.="Название: {$product['name']}. ";
                    $productsMsg.="Колличество: {$product['quantity']} <br>";
                }
                $message .= "Год выпуска авто: {$customData['custom_year_auto']['value']} <br>";
                $message .= "Товары: <br> {$productsMsg}";
                $this->sendEmail($message, $subject);
                $result = [
                    'status' => true,
                    'message' => 'Код правильный'
                ];
            } else {
                $result = [
                    'status' => false,
                    'message' => 'Неверный правильный'
                ];
            }
            echo json_encode($result);
            exit();
        }
    }

    public function getCustomData($type, $id, $set)
    {
        $type = !empty(self::$types[$type]) ? self::$types[$type] : 0;

        if (!$type || !$id) {
            return array();
        }

        $query = $this->db->query("SELECT DISTINCT
                                        data
                                    FROM
                                        simple_custom_data
                                    WHERE
                                        object_type = '" . (int)$type . "'
                                    AND
                                        object_id = '" . (int)$id . "'");

        $result = array();

        if ($query->num_rows) {
            $data = unserialize($query->row['data']);

            foreach ($data as $key => $item) {
                if (empty($item['set']) || (!empty($item['set']) && $item['set'] == $set)) {
                    $result[$key] = $item;
                }
            }
        }

        return $result;
    }


    public function getOrderProducts($orderId)
    {
        $sql = "SELECT name, quantity FROM " . DB_PREFIX . "order_product WHERE order_id = {$orderId}" ;
        $result = $this->db->query($sql);
        return  $result->rows;

    }

}

?>