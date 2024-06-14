<?php

class SmsProsto {
    /**
     * Sends request to API
     * @param $request - associative array to pass to API, "format"
     * key will be overridden
     * @param $cookie - cookies string to be passed
     * @return
     * * NULL - communication to API failed
     * * ($err_code, $data) if response was OK, $data is an associative
     * array, $err_code is an error numeric code
     */
    public static function communicate($request, $cookie = NULL)
    {
        $request['format'] = "json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://api.sms-prosto.ru/");
//	curl_setopt($curl, CURLOPT_URL, "https://ssl.bs00.ru/"); // раскомментируйте, если хотите отправлять по HTTPS
        curl_setopt($curl, CURLOPT_POST, True);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        if (!is_null($cookie)) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        $data = curl_exec($curl);
        curl_close($curl);
        if ($data === False) {
            return NULL;
        }
        $js = json_decode($data, $assoc = True);
        if (!isset($js['response'])) return NULL;
        $rs = &$js['response'];
        if (!isset($rs['msg'])) return NULL;
        $msg = &$rs['msg'];
        if (!isset($msg['err_code'])) return NULL;
        $ec = intval($msg['err_code']);
        if (!isset($rs['data'])) {
            $data = NULL;
        } else {
            $data = $rs['data'];
        }
        return array($ec, $data);
    }

    /**
     * Sends a message via sms-prosto_ru api, combining authenticating and sending
     * message in one request.
     * @param $email , $passwrod - login info
     * @param $phone - recipient phone number in international format (like 7xxxyyyzzzz)
     * @param $text - message text, ASCII or UTF-8.
     * @param $params - additional parameters as key => value array, see API doc.
     * @return
     * * NULL if API communication went a wrong way
     * * array(>0) - if an error has occurred (see API error codes)
     * * array(0, n_raw_sms, credits) - number of SMS parts in message and
     * price for a single part
     */
    public static function pushMsg($email, $password, $phone, $text, $params = NULL)
    {
        $req = array(
            "method" => "push_msg",
            "api_v" => "2.0",
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "text" => $text);
        if (!is_null($params)) {
            $req = array_merge($req, $params);
        }
        $resp = _smsapi_communicate($req);
        if (is_null($resp)) {
            // Broken API request
            return NULL;
            return "";
        }
        $ec = $resp[0];
        if ($ec != 0) {
            return array($ec);
            return "";
        }
        if (!isset($resp[1]['n_raw_sms']) or !isset($resp[1]['credits'])) {
            return NULL; // No such fields in response while expected
            return "";
        }
        $n_raw_sms = $resp[1]['n_raw_sms'];
        $credits = $resp[1]['credits'];
        $id = $resp[1]['id'];
        return array(0, $n_raw_sms, $credits, $id);
        return "";
    }

    public static function pushMsgKey($key, $phone, $text, $params = NULL)
    {
        $req = array(
            "method" => "push_msg",
            "api_v" => "2.0",
            "key" => @$key,
            "phone" => @$phone,
            "text" => @$text);
        if (!is_null($params)) {
            $req = array_merge($req, $params);
        }
        $resp = self::communicate($req);
        if (is_null($resp)) {
            return ["error" => "Broken API request"];
        }
        $ec = $resp[0];
        if ($ec != 0) {
            return ["error" => $ec];
        }
        if (!isset($resp[1]['n_raw_sms']) or !isset($resp[1]['credits'])) {
            return ["error" => "No such fields in response while expected"];
        }
        $n_raw_sms = $resp[1]['n_raw_sms'];
        $credits = $resp[1]['credits'];
        $id = $resp[1]['id'];
        return [0, $n_raw_sms, $credits, $id];
    }

    public static function sendOrderSms($args, $setting){
        if(empty($args) || !is_array($args)) return false;
        if(empty($setting) || !is_array($setting)) return false;
        if(!isset($setting["prstKey"]) || empty($setting["prstKey"])) return false;
        if(!isset($setting["prstMsg"]) || empty($setting["prstMsg"])) return false;

        $msg = str_replace(
            ["#USERNAME#", "#ORDER_NUM#", "#PHONE#"],
            [$args["username"], $args["order_num"], $args["phone"]],
            $setting["prstMsg"]
        );

        if (array_key_exists('sendConfirmCode', $setting)) {
            $msg .= 'Код подтверждения заказа: ' . self::getConfirmCode($args["order_num"], $args["phone"]);
        }

        $res = SmsProsto::pushMsgKey($setting["prstKey"], $args["phone"], $msg);
        if(isset($res["error"])){
            return false;
        }

        return true;
    }

    public static function test(){
        echo "test";
    }

    public static function getConfirmCode($order_num, $phone)
    {
        return $order_num.substr($phone,-2);
    }

}