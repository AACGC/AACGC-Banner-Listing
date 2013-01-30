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
if ($_POST['add_banner'] == '1') {
$newbanner = $_POST['banner_code'];
$newcat = $_POST['banner_cat'];
$reason = "";
$newok = "";
if (($newbanner == ""))
{$newok = "0";
$reason = "No Banner code detected";}
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
$sql->db_Insert("aacgc_banners", "NULL, '".$newbanner."', '".$newcat."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Banner Added</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";



$text .= "<tr>
          <td style='width:20%; text-align:right' class='forumheader3'>Banner Code:</td>
          <td style='width:80%' class='forumheader3'>
          <textarea class='tbox' rows='5' cols='100' name='banner_code'></textarea>
          </td>
          </tr>";

        $text .= "</div>
                  </td>
		  </tr>


	  <tr>
          <td style='width:; text-align:right' class='forumheader3'>Category:</td>
          <td style='width:' class='forumheader3'>
	  <select name='banner_cat' size='1' class='tbox' style='width:100%'>";

	$sql4 = new db;
	$sql4->db_Select("aacgc_banners_cat", "*", "ORDER BY cat_title ASC","");
        while($row4 = $sql4->db_Fetch()){

$text .= "<option name='banner_cat' value='".$row4['cat_id']."'>".$row4['cat_title']."</option>";}

$text .= "</td></tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_banner' value='1'>
		<input class='button' type='submit' value='Add Banner'>
		</td>
        </tr>
</table>
</div>
<br>
</form>";
	      $ns -> tablerender("AACGC Banners", $text);
	      require_once(e_ADMIN."footer.php");
?>

