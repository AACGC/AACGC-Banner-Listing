<?php

/*
#######################################
#     e107 website system plguin      
#     AACGC Banners                  
#     by M@CH!N3                
#     http://www.AACGC.com       
#######################################
*/


$eplug_name = "AACGC Banner Listing";
$eplug_version = "1.3.1";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Displays Banners from codes from other sorces like You Tube, Photobucket, etc.....";
$eplug_compatible = "";
$eplug_readme = "";
$eplug_compliant = FALSE;
$eplug_module = FALSE;
$eplug_status = TRUE;
$eplug_latest = TRUE;


$eplug_folder      = "aacgc_banners";

$eplug_menu_name   = "Banners";

$eplug_conffile    = "admin_main.php";

$eplug_logo        = "logo.png";
$eplug_icon        = e_PLUGIN."aacgc_banners/images/icon_32.png";
$eplug_icon_small  = e_PLUGIN."aacgc_banners/images/icon_16.png";
$eplug_caption     = "AACGC Banner Listing";


$eplug_link      = TRUE;
$eplug_link_name = "Banners";
$eplug_link_url  = e_PLUGIN."aacgc_banners/Banners.php";  

$eplug_table_names = array("aacgc_banners", "aacgc_banners_cat");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."aacgc_banners(banner_id int(11) NOT NULL auto_increment,banner_code text NOT NULL,banner_cat text NOT NULL,PRIMARY KEY  (banner_id)) ENGINE=MyISAM;",
"CREATE TABLE ".MPREFIX."aacgc_banners_cat(cat_id int(11) NOT NULL auto_increment,cat_title text NOT NULL,cat_det text NOT NULL,PRIMARY KEY  (cat_id)) ENGINE=MyISAM;",

);

$eplug_done = "Install Complete";


$upgrade_alter_tables = array(

"ALTER TABLE ".MPREFIX."aacgc_banners ADD COLUMN banner_cat text NOT NULL AFTER banner_code;",

"CREATE TABLE ".MPREFIX."aacgc_banners_cat(cat_id int(11) NOT NULL auto_increment,cat_title text NOT NULL,cat_det text NOT NULL,PRIMARY KEY  (cat_id)) ENGINE=MyISAM;",

);

$upgrade_remove_prefs = "";
$upgrade_add_prefs = "";

$eplug_upgrade_done = "Upgrade Complete";

?>
