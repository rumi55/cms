<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    function views($template_name, $vars = array(), $return = FALSE, $headerDir = '')
    {
        $content  = $this->view($headerDir.'header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view($headerDir.'footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
}