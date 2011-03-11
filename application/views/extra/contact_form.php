<div id="contact_form">
	<?=form_open('email/send');?>
	<br/>
	<p class="form_email">
	<?=form_input('email')?><?=form_label('Email')?>
	</p>
	<p class="form_subject">
	<?=form_input('subject')?><?=form_label('Subject')?>
	</p>
	
	<p class="form_message">
	<?=form_textarea('message')?>
	</p>
	
Enter the word you see below<br/>



<input type="text" name="captcha" value="" /><?=form_label($captcha['image'])?>
</div>
	<?=form_hidden('ip_address', $this->input->ip_address())?>
	<?=form_hidden('time', $captcha['time'])?>
<div id="contact_submit"><?=form_submit('submit', 'Submit')?></div><br/>
	<?=form_close()?>