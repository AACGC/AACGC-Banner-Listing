<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Banners                   #
#     by M@CH!N3                      #
#     http://www.aacgc.com            #
#######################################
*/

require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");

$rs = new form;
$fl = new e_file;

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_cat'] == '1') {
$newtitle = $_POST['cat_title'];
$newdet = $_POST['cat_det'];
$reason = "";
$newok = "";
if (($newtitle == ""))
{$newok = "0";
$reason = "No Title Entered";}
else
{$newok = "1";}

If ($newok == "0"){
 	$newtext = "
 	<center>
	<b><br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("", $newtext);
}
If ($newok == "1"){
$sql->db_Insert("aacgc_banners_cat", "NULL, '".$newtitle."', '".$newdet."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Banner Category Created</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new_cat.php'>
<br>
<center>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";



$text .= "<tr>
          <td style='width:20%; text-align:right' class='forumheader3'>Category Title:</td>
          <td style='width:80%' class='forumheader3'>
          <input class='tbox' type='text' name='cat_title' size='100'>
          </td>
          </tr>";

$text .= "<tr>
          <td style='width:; text-align:right' class='forumheader3'>Category Details:</td>
          <td style='width:' class='forumheader3'>
          <textarea class='tbox' rows='5' cols='100' name='cat_det'></textarea>
          </td>
          </tr>";

        
$text .= "
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_cat' value='1'>
		<input class='button' type='submit' value='Add Category'>
		</td>
        </tr>
</table>
</form>";
	      $ns -> tablerender("AACGC Banners", $text);
	      require_once(e_ADMIN."footer.php");
?>

