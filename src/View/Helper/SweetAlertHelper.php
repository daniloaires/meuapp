<?php

namespace App\View\Helper;

use Cake\View\Helper;

class SweetAlertHelper extends Helper
{
    public function flashMessages()
    {
        $messages = $this->_View->getRequest()->getSession()->read('Flash.flash');

        if (!$messages) {
            return '';
        }

        $output = '<script>';
        foreach ($messages as $message) {
            $output .= "swal(\"{$message['element']}\", \"{$message['message']}\", \"{$message['params']['class']}\");";
        }
        $output .= '</script>';

        return $output;
    }
}
