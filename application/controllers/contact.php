<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

        function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
            if ($this->input->server('REQUEST_METHOD') !== 'POST')
            {
                $this->_set_meta($this->lang->line('contact_page'),
                            $this->lang->line('contact_desc'),
                            $this->lang->line('contact_keywords')
                            );

                $this->load->helper('form');

                $this->template->build('content/contact');
            }
            else // Process the form
            {
                $this->load->library('form_validation');

                $config = array(
                   array(
                         'field'   => 'name',
                         'label'   => 'lang:name',
                         'rules'   => 'required|max_length[100]'
                      ),
                   array(
                         'field'   => 'email',
                         'label'   => 'lang:email',
                         'rules'   => 'required|valid_email'
                      ),
                   array(
                         'field'   => 'message',
                         'label'   => 'lang:message',
                         'rules'   => 'required|max_length[5000]'
                      )
                );

                $this->form_validation->set_rules($config);

                $this->form_validation->set_error_delimiters('', '<br />');

                if ($this->form_validation->run() == FALSE)
                {
                    $data['message'] = '<span class="error">'.validation_errors().'</span>';

                    ( $this->input->is_ajax_request() )
                        ? $this->output->set_output($data['message'])
                        : $this->template->build('content/contact', $data);
                        ;
                }
                else
                {
                    // Send the email

                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.matildaeriksson.com', // change to 'localhost' when going live
                        'smtp_user' => 'matilda@matildaeriksson.com',
                        'smtp_pass' => 'sunshine77',
                        'smtp_timeout' => 20,
                        'newline'   => "\r\n"
                    );

                    $this->load->library('email', $config);

                    $this->email->from($this->input->post('email'), $this->input->post('name'));
                    $this->email->to('matilda@matildaeriksson.com');
                    $this->email->subject('Wesite enquirey');
                    $this->email->message($this->input->post('message'));

                    if ( $this->email->send() )
                    {
                        $data['message'] = '<span class="success">'.$this->lang->line('email_send_success').'</span>';

                        ( $this->input->is_ajax_request() )
                            ? $this->output->set_output($data['message'])
                            : $this->template->build('content/contact', $data)
                            ;
                    }
                    else
                    {
                        $data['message'] = '<span class="error">'.$this->lang->line('email_send_error').'</span>';

                        ( $this->input->is_ajax_request() )
                            ? $this->output->set_output($data['message'])
                            : $this->template->build('content/contact', $data)
                            ;
                    }
                }
            }
        }
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */
