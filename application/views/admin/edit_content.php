<?php foreach($content as $row):?>


<?php  $id = $row->content_id;?>


<?=form_open("admin/edit_content/$page")?> 
Title: <?=form_input('title', $row->title)?>
<br/>
<textarea cols=65 rows=20 name="content" id="content" class='wymeditor'><?=$row->content?></textarea>
<br/>
<?=form_hidden('menu', $row->menu)?>

Extra: <?=form_input('extra', $row->extra)?><br/>
<input type="submit" class="wymupdate" />
<?=form_close()?> 
<?php endforeach;?>