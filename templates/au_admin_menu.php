<h1> This is the admin menu (so far) !</h1>
<?php 
// set in plain english
if ($current_value = 0)
{
	$switch = "OFF";
}
elseif ($current_value = 1)
{
	$switch = "ON";
}
?>

<?php echo "current: " . $switch;?>

 <div class='wrap'>
<form method='post' action='options.php'>
<?php 
	settings_fields('anti-user-settings');
	do_settings_sections('anti-user-settings');
	submit_button();
?>
</form>
</div>