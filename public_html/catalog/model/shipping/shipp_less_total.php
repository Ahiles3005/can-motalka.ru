<?php

class ModelShippingShippLessTotal extends Model {

    function getQuote($address) {
        $this->load->language('shipping/shipp_less_total');

        if ($this->config->get('shipp_less_total_status')) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int) $this->config->get('shipp_less_total_geo_zone_id') . "' AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')");

            if (!$this->config->get('shipp_less_total_geo_zone_id')) {
                $status = TRUE;
            } elseif ($query->num_rows) {
                $status = TRUE;
            } else {
                $status = FALSE;
            }
        } else {
            $status = FALSE;
        }

        $method_data = array();

        if ($status) {
            $quote_data = array();

            $cost = 0.00;
            if ($this->config->get('shipp_less_total_min_total_for_free_delivery') > $this->cart->getSubTotal()) {
			$cost = $this->config->get('shipp_less_total_delivery_price');
            }

            $quote_data['shipp_less_total'] = array(
                'code' => 'shipp_less_total.shipp_less_total',
                'title' => $this->language->get('text_description'),
                'cost' => $cost,
                'tax_class_id' => 0,
                'text' => $this->currency->format($cost)
            );

            $method_data = array(
                'code' => 'shipp_less_total',
                'title' => $this->language->get('text_title'),
                'quote' => $quote_data,
                'sort_order' => $this->config->get('shipp_less_total_sort_order'),
                'error' => FALSE
            );
        }

        return $method_data;
    }

}

?>