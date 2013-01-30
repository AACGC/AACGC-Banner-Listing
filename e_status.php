<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Banners                   #                 
#     by M@CH!N3                      #
#     http://www.aacgc.com            #
#######################################
*/

$banners = $sql -> db_Count("aacgc_banners");
$text .= "
<div style='padding-bottom: 2px;'>
<img src='".e_PLUGIN."aacgc_banners/images/icon_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt=''>Total Banners: ".$banners."
</div>";
?>