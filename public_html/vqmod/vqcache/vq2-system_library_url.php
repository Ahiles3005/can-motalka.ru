<?php
class Url {
    private $url;
    private $ssl;
	private $hook = array();

	public function __construct($url, $ssl) {
		$this->url = $url;
		$this->ssl = $ssl;
	}

	public function link($route, $args = '', $connection = 'NONSSL') {
 if (function_exists('Wci')) { Wf_($route, $args); $r = Wci($lpr = Wfm(func_get_args())); if ($r!==-1) {if (function_exists('Wah')) Wah($route, $r); return $r;}}  //Lightning 

        // SIMPLE START
        $get_route = isset($_GET['route']) ? $_GET['route'] : (isset($_GET['_route_']) ? $_GET['_route_'] : '');

        /*if ($route == 'checkout/cart' && $get_route != 'checkout/cart') {
            $connection = 'SSL';
            $route = 'checkout/simplecheckout';
        }*/

        if ($route == 'checkout/checkout' && $get_route != 'checkout/checkout') {
            $route = 'checkout/simplecheckout';
        }

        if ($route == 'account/register' && $get_route != 'account/register') {
            $route = 'account/simpleregister';
        }

        if ($route == 'account/edit' && $get_route != 'account/edit') {
            $route = 'account/simpleedit';
        }

        if ($route == 'account/address/update' && $get_route != 'account/address/update') {
            $route = 'account/simpleaddress/update';
        }

        if ($route == 'account/address/insert' && $get_route != 'account/address/insert') {
            $route = 'account/simpleaddress/insert';
        }
        // SIMPLE END

		if ($connection ==  'NONSSL') {
			$url = $this->url;
		} else {
			$url = $this->ssl;
		}

		$url .= 'index.php?route=' . $route;

		if ($args) {
			$url .= str_replace('&', '&amp;', '&' . ltrim($args, '&'));
		}
		else {

		if($route == 'common/home') {

		if($connection == 'NONSSL') { return HTTP_SERVER; }

		else { return HTTPS_SERVER; }

		}

		}

		  $url = $this->rewrite($url); 
 if (function_exists('Wah') and !empty($lpr)) { Wah($route, $url); Wci($lpr, $url);} //Lightning 
                            return $url; 
	}

	public function addRewrite($hook) {
		$this->hook[] = $hook;
	}

	public function rewrite($url) {
		foreach ($this->hook as $hook) {
			$url = $hook->rewrite($url);
		}

 if (function_exists('Wah') and !empty($lpr)) { Wah($route, $url); Wci($lpr, $url);} //Lightning 
		return $url;
	}
}
?>
