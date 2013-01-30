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
if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $id = $tmp[1];
        unset($tmp);
}
//-----------------------------------------------------------------------------------------------------------+
if (isset($_POST['update_banner'])) {
        $message = ($sql->db_Update("aacgc_banners", "banner_code='".$_POST['banner_code']."',banner_cat='".$_POST['banner_cat']."' WHERE banner_id='".$_POST['id']."' ")) ? "Successful updated" : "Update failed";
}

if (isset($_POST['main_delete'])) {
        $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
    $sql2->db_Delete("aacgc_banners", "banner_id='".$delete_id[0]."'");
	
}

if (isset($message)) {
        $ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}
//-----------------------------------------------------------------------------------------------------------+
if ($action == "") {
        $text .= $rs->form_open("post", e_SELF, "myform_".$row['banner_id']."", "", "");
        $text .= "
        <div style='text-align:center'>
        <table style='width:95%' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:10%' class='forumheader3'>Banner ID</td>
        <td style='width:80%' class='forumheader3'>Banner</td>
        <td style='width:10%' class='forumheader3'>Options</td>
        </tr>";
        $sql->db_Select("aacgc_banners", "*", "ORDER BY banner_id ASC","");
        while($row = $sql->db_Fetch()){
        $text .= "
        <tr>
        <td style='width:10%' class='forumheader3'>".$row['banner_id']."</td>
        <td style='width:80%' class='forumheader3'>".$row['banner_code']."</td>
        <td style='width:10%' class='forumheader3'>
        
		<a href='".e_SELF."?edit.{$row['banner_id']}'>".ADMIN_EDIT_ICON."</a>
		<input type='image' title='".LAN_DELETE."' name='main_delete[".$row['banner_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['banner_id']} ]')\"/>
		</td>

        </tr>";}

        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();
	      $ns -> tablerender("", $text);
	      require_once(e_ADMIN."footer.php");
}
//-----------------------------------------------------------------------------------------------------------+

//-----------------------------------------------------------------------------------------------------------+

if ($action == "edit")
{
                $sql->db_Select("aacgc_banners", "*", "banner_id = $id");
                $row = $sql->db_Fetch();
                $sql2->db_Select("aacgc_banners_cat", "*", "cat_id = ".$row['banner_cat']."");
                $row2 = $sql2->db_Fetch();


        $width = "width:100%";
        $text = "
        <div style='text-align:center'>
        ".$rs -> form_open("post", e_SELF, "MyForm", "", "enctype='multipart/form-data'", "")."
        <table style='".$width."' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:30%; text-align:right' class='forumheader3'>Banner Code:</td>
        <td style='width:70%' class='forumheader3'>
            ".$rs -> form_textarea("banner_code", '100', '5', $row['banner_code'], "", "", "", "", "")."
        </td>
        </tr>

	  <tr>
          <td style='width:; text-align:right' class='forumheader3'>Category:</td>
          <td style='width:' class='forumheader3'>
	  <select name='banner_cat' size='1' class='tbox' style='width:50%'>
	  <option name='banner_cat' value='".$row['banner_cat']."'>".$row2['cat_title']."</option>";

	$sql4 = new db;
	$sql4->db_Select("aacgc_banners_cat", "*", "ORDER BY cat_title ASC","");
        while($row4 = $sql4->db_Fetch()){

$text .= "<option name='banner_cat' value='".$row4['cat_id']."'>".$row4['cat_title']."</option>";}

$text .= "</td></tr>";

        $text .= "</div>
        </td></tr>
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
        ".$rs->form_hidden("id", "".$row['banner_id']."")."
        ".$rs -> form_button("submit", "update_banner", "Update Banner")."
        </td>
        </tr>
        </table>
        ".$rs -> form_close()."
        </div>";
	      $ns -> tablerender("", $text);
	      require_once(e_ADMIN."footer.php");
}
?>

