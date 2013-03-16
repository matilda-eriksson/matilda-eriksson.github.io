<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends MY_Controller {

        function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
            $this->_set_meta($this->lang->line('clients_page'),
                            $this->lang->line('clients_desc'),
                            $this->lang->line('clients_keywords')
                            );

            $this->template->build('content/work');
	}
}

/* End of file work.php */
/* Location: ./application/controllers/work.php */