<?php

/*
#######################################
#     e107 website system plguin      
#     AACGC Banners
#     by M@CH!N3               
#     http://www.AACGC.com
#######################################
*/


require_once("../../class2.php");
require_once(HEADERF);

//----------------------------------------------------------------------------------------------------

$title = "Banners";

//----------------------------------------------------------------------------------------------------

$text .= "
<script type='text/javascript'>
function go(){
location=
document.mycombo.example.
options[document.mycombo.example.selectedIndex].value
}
</script>";


$text .= "<form name='mycombo'><p><select name='example' size='1'>";

	$sql4 = new db;
	$sql4->db_Select("aacgc_banners_cat", "*", "ORDER BY cat_title ASC","");
        while($row4 = $sql4->db_Fetch()){

$text .= "<option value='#".$row4['cat_title']."'>".$row4['cat_title']."</option>";}


$text .= "<input type='button' name='test' value='Go' onClick='go()'></form>";

//----------------------------------------------------------------------------------------------------

$text .= "<table style='width:100%' class=''>";

        $sql->db_Select("aacgc_banners_cat", "*", "ORDER BY cat_id ASC","");
        while($row = $sql->db_Fetch()){

$text .= "<tr><td style='width:75%' class='fcaption'><center><b><a name='".$row['cat_title']."'></a></p>".$row['cat_title']."</b></center></td></tr>
	  <tr><td style='width:75%' class=''><center>".$row['cat_det']."</center></td></tr>
	  <tr><td style='width:75%' class='forumheader3'><center>";

		$sql2->db_Select("aacgc_banners", "*", "banner_cat = '".$row['cat_id']."'");    
		while($row2 = $sql2->db_Fetch()){

$text .= "".$row2['banner_code']."<br>";}}

$text .= "</center></td></tr>";

$text .= "</table>";

$ns -> tablerender($title, $text);

//----------------------------------------------------------------------------------------------------


require_once(FOOTERF);





