<div id="contact-pane">

    <div id="contact-form-wrap" class="left-col">

        <h1><?php echo $this->lang->line('contact_getintouch'); ?></h1>

        <form id="contact-form" name="contact-form" action="<?php echo base_url().$this->config->item('language_abbr');?>/contact" method="post">
              <h2><?php echo $this->lang->line('contact_name'); ?>:</h2>
              <input id="name-field" class="form-field" type="text" name="name" value="<?php echo set_value('name'); ?>" />
              <h2><?php echo $this->lang->line('contact_email'); ?>:</h2>
              <input class="form-field" type="email" name="email" value="<?php echo set_value('email'); ?>" />
              <h2><?php echo $this->lang->line('contact_message'); ?>:</h2>
              <textarea class="form-field" name="message" rows="50" cols="20" ><?php echo set_value('message'); ?></textarea>

              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" /> 

              <input class="submit-button" type="submit" name="submit" value="<?php echo $this->lang->line('contact_submit'); ?>" />

        </form>

        <span id="server-response"><?php if( isset($message) ) echo $message; // for noscript ?></span>

    </div>

    <div id="contact-intro" class="right-col">

        <h1><?php echo $this->lang->line('contact_contactingme'); ?></h1>

        <?php echo $this->lang->line('contact_intro'); ?>

    </div>

</div>
