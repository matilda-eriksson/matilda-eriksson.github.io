<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MY_Controller {

        function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
            $this->_set_meta($this->lang->line('services_page'),
                            $this->lang->line('services_desc'),
                            $this->lang->line('services_keywords')
                            );

            $this->load->helper('form');

            $this->template->build('content/services');
	}
}

/* End of file services.php */
/* Location: ./application/controllers/services.php */