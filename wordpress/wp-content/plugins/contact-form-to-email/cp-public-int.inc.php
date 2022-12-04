<?php if ( !defined('CP_AUTH_INCLUDE') ) { echo 'Direct access not allowed.'; exit; } ?>
<form class="cpp_form" name="<?php echo $this->prefix; ?>_pform<?php echo '_'.$this->print_counter; ?>" id="<?php echo $this->prefix; ?>_pform<?php echo '_'.$this->print_counter; ?>" action="<?php $this->get_site_url(); ?>" method="post" enctype="multipart/form-data" onsubmit="return <?php echo $this->prefix; ?>_pform_doValidate<?php echo '_'.$this->print_counter; ?>(this);"><input type="hidden" name="cp_pform_psequence" value="<?php echo '_'.$this->print_counter; ?>" /><input type="hidden" name="<?php echo $this->prefix; ?>_pform_process" value="1" /><input type="hidden" name="<?php echo $this->prefix; ?>_id" value="<?php echo $this->item; ?>" /><input type="hidden" name="cp_ref_page" value="<?php esc_attr($this->get_site_url()); ?>" /><input type="hidden" name="form_structure<?php echo '_'.$this->print_counter; ?>" id="form_structure<?php echo '_'.$this->print_counter; ?>" size="180" value="<?php echo $raw_form_str; ?>" /><input type="hidden" name="refpage<?php echo '_'.$this->print_counter; ?>" id="refpage<?php echo '_'.$this->print_counter; ?>" value=""><input type="hidden" name="<?php echo $this->prefix; ?>_pform_status" value="0" /><?php if (count($preload_params)) { ?><input type="hidden" name="edititem" value="<?php echo $preload_params["itemnumber"]; ?>" /><?php } ?><input name="anonce" type="hidden" value="<?php echo wp_create_nonce( 'cfte_actions_emailform' ); ?>"/><input name="cftehp" id="cftehp<?php echo '_'.$this->print_counter; ?>" type="hidden" value="1"/>
<?php if (is_admin() && !defined('APHOURBK_ELEMENTOR_EDIT_MODE') && @$_GET["action"] != 'edit') {?>
  <fieldset style="border: 1px solid black; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; padding:15px;">
   <legend>Administrator options</legend>
    <input type="checkbox" name="sendemails_admin" value="1" vt="1" /> Send notification emails for this booking<br /><br />
  </fieldset> 
<?php } ?>
<div id="fbuilder">    
    <div id="fbuilder<?php echo '_'.$this->print_counter; ?>">
        <div id="formheader<?php echo '_'.$this->print_counter; ?>"></div>
        <div id="fieldlist<?php echo '_'.$this->print_counter; ?>"></div>
    </div>
</div>    
<div style="display:none">
<input name="cftecontrolmessage" type="text" value=""/> 
<div id="cpcaptchalayer<?php echo '_'.$this->print_counter; ?>" class="cpcaptchalayer">
<?php if (!is_admin() && $this->get_option('cv_enable_captcha', CP_CFEMAIL_DEFAULT_cv_enable_captcha) != 'false') { ?>
  <?php _e("Security Code",'contact-form-to-email'); ?>:<br />
  <img src="<?php echo $this->get_site_url_slash().$this->prefix.'_captcha=captcha&ps=_'.$this->print_counter.'&inAdmin=1&width='.$this->get_option('cv_width', CP_CFEMAIL_DEFAULT_cv_width).'&height='.$this->get_option('cv_height', CP_CFEMAIL_DEFAULT_cv_height).'&letter_count='.$this->get_option('cv_chars', CP_CFEMAIL_DEFAULT_cv_chars).'&min_size='.$this->get_option('cv_min_font_size', CP_CFEMAIL_DEFAULT_cv_min_font_size).'&max_size='.$this->get_option('cv_max_font_size', CP_CFEMAIL_DEFAULT_cv_max_font_size).'&noise='.$this->get_option('cv_noise', CP_CFEMAIL_DEFAULT_cv_noise).'&noiselength='.$this->get_option('cv_noise_length', CP_CFEMAIL_DEFAULT_cv_noise_length).'&bcolor='.$this->get_option('cv_background', CP_CFEMAIL_DEFAULT_cv_background).'&border='.$this->get_option('cv_border', CP_CFEMAIL_DEFAULT_cv_border).'&font='.$this->get_option('cv_font', CP_CFEMAIL_DEFAULT_cv_font); ?>"  id="captchaimg<?php echo '_'.$this->print_counter; ?>" alt="security code" border="0" class="skip-lazy"  />
  <br /><?php _e("Please enter the security code",'contact-form-to-email'); ?>:<br />
  <div class="dfield"><input type="text" size="20" name="hdcaptcha_<?php echo $this->prefix; ?>_post" id="hdcaptcha_<?php echo $this->prefix; ?>_post<?php echo '_'.$this->print_counter; ?>" value="" />
  <div class="cpefb_error message" id="hdcaptcha_error<?php echo '_'.$this->print_counter; ?>" generated="true" style="display:none;position: absolute; left: 0px; top: 25px;"><?php echo esc_attr(__($this->get_option('cv_text_enter_valid_captcha', CP_CFEMAIL_DEFAULT_cv_text_enter_valid_captcha),'contact-form-to-email')); ?></div>
  </div><br />  
<?php } ?>
</div>
</div>
<div id="cp_subbtn<?php echo '_'.$this->print_counter; ?>" class="cp_subbtn"><?php _e($button_label); ?></div>
</form>
<script>
try{document.getElementById("cftehp<?php echo '_'.$this->print_counter; ?>").value="25";}catch(e){}
</script>
<?php if (defined('APBCT_NAME')) { ?>
<script>
setInterval('cfte<?php echo '_'.$this->print_counter; ?>()',2000);
function cfte<?php echo '_'.$this->print_counter; ?>() {
document.<?php echo $this->prefix; ?>_pform<?php echo '_'.$this->print_counter; ?>.onsubmit = function(){ return <?php echo $this->prefix; ?>_pform_doValidate<?php echo '_'.$this->print_counter; ?>(this);};
}
</script>
<?php } ?>