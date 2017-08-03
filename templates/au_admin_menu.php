<h1> This is the admin menu (so far) !</h1>
<?php $option = get_option('au_register_switch')?>
<?php 
// set in plain english
if ($option === '0')
{
	$switch = "OFF";
}
elseif ($option === '1')
{
	$switch = "ON";
}
?>

<?php echo "current: " . $switch;?>

 <div class='wrap'>
<form method='post'>
<label>Turn User Registration Blocking on or off</label>
<select name='au_register_switch'>
<option value='0' <?php if ($option === '0') { echo "selected='true'";}?>>OFF</option>
<option value='1' <?php if ($option === '1') { echo "selected='true'";}?>>ON</option>
</select>
<?php submit_button();?>
</form>
</div>