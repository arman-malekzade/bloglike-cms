<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BL ADMIN</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet/less" href="less/styles.less" type="text/css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/chart.css">
        <script src="js/less.min.js"></script>
        <?php include_once("framework.php");?>
            <?php BL_CKEDITOR_HEAD();?>
    </head>
    <body>
        <?php
            session_start();
            //$_SESSION['logged_user']="admin";
            ?>
        <div class="topmenu">
            <div class="col-sm-10">
                  <input type="text" class="form-control search" id="usr">
            </div>
            <div class="col-sm-2">
                <img class="img-responsive icon-menu" src="img/icon/menu.png">
                <h4>پنل مدیریت</h4>
            </div>
        </div>
        <div class="main">
            <div class="col-sm-10 boxes">
                <?php
                function BL_TEMPLATE_CONVERT($index,$cats,$pages,$posts,$users)
                    {
                        $page = file_get_contents($index);
                        //echo '<textarea cols="100" rows="30">'.htmlspecialchars($page).'</textarea>';
                        $page=str_replace("</-BL-HEAD->",'<?php include(\'framework.php\');?><?php BL_STATS();?><?php include(\'seosettings.php\');?><?php BL_CKEDITOR_HEAD();?>',$page);
                        $page=str_replace("</-BL-MENUS-S->",'<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("<-BL-MENU-DES->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-S->",'\';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-HREF->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-E->",'\';}echo\'',$page);
                        $page=str_replace("</-BL-MENUS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-POSTS-S->",'<?php $hmpp=2;$hmp=(BL_POST_COUNT("return")%$hmpp==0)?BL_POST_COUNT("return")/$hmpp:BL_POST_COUNT("return")/$hmpp+1;$hmpts=7;
                        if(!isset($_GET[\'page\'])) $_GET[\'page\']=1;for($i=($_GET[\'page\']-1)*$hmpp+1;($i<=$_GET[\'page\']*$hmpp)&&($i<=BL_POST_COUNT("return"));$i++){
                        echo\'',$page);
                        $page=str_replace("<-BL-POST-TITLE->",'\'.BL_POST_TITLE($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-DES->",'\'.BL_POST_DESCRIPTION($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-DATE->",'\'.BL_POST_DATE($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-AUTHOR->",'\'.BL_POST_AUT($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-IMG->",'\'.BL_POST_IMG($i,"return").\'',$page);
                        $page=str_replace("</-BL-POSTS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-PAGINATION-S->",'<?php $allpages=array();$pages=array();for($i=1;$i<=$hmp;$i++) array_push($allpages,$i);for($x=0;$x<3;$x++) if($x<count($allpages)) array_push($pages,$allpages[$x]);for($x=count($allpages)-1,$y=1;$y<=3;$x--,$y++) if(($x>=0)&&!in_array($allpages[$x],$pages)) array_push($pages,$allpages[$x]);asort($pages);if(!isset($_GET[\'page\'])) $_GET[\'page\']=1;foreach($pages as $i) echo\'',$page);
                        $page=str_replace("</-BL-PAGINATION-E->",'\';?>',$page);
                        $page=str_replace("</-BL-PAGINATION-NUM->",'\'.$i.\'',$page);
                        $myfile = fopen("../index.php", "w") or die("Unable to open file!");
                        fwrite($myfile, $page);
                        fclose($myfile);
                        $page = file_get_contents($cats);
                        $page=str_replace("</-BL-HEAD->",'<?php include(\'framework.php\');?><?php BL_STATS();?><?php include(\'seosettings.php\');?><?php BL_CKEDITOR_HEAD();?>',$page);
                        $page=str_replace("</-BL-MENUS-S->",'<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("<-BL-MENU-DES->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-S->",'\';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-HREF->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-E->",'\';}echo\'',$page);
                        $page=str_replace("</-BL-MENUS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-POSTS-S->",'<?php if(isset($_GET[\'title\'])){$cid=BL_CAT_ID($_GET[\'title\']);$hmpp=2;$hmp=(BL_POST_COUNT_BY_CAT($cid)%$hmpp==0)?BL_POST_COUNT_BY_CAT($cid)/$hmpp:BL_POST_COUNT_BY_CAT($cid)/$hmpp+1;$hmpts=7;if(!isset($_GET[\'page\'])) $_GET[\'page\']=1;for($i=($_GET[\'page\']-1)*$hmpp+1;($i<=$_GET[\'page\']*$hmpp)&&($i<=BL_POST_COUNT_BY_CAT($cid));$i++){echo\'',$page);
                        $page=str_replace("<-BL-POST-TITLE->",'\'.BL_POST_TITLE_BY_CAT($i,$cid).\'',$page);
                        $page=str_replace("<-BL-POST-DES->",'\'.BL_POST_DES_BY_CAT($i,$cid).\'',$page);
                        $page=str_replace("<-BL-POST-IMG->",'\'.BL_POST_IMG_BY_CAT($i,$cid).\'',$page);
                        $page=str_replace("</-BL-POSTS-E->",'\';}}?>',$page);
                        $page=str_replace("</-BL-PAGINATION-S->",'<?php $allpages=array();$pages=array();for($i=1;$i<=$hmp;$i++) array_push($allpages,$i);for($x=0;$x<3;$x++) if($x<count($allpages)) array_push($pages,$allpages[$x]);for($x=count($allpages)-1,$y=1;$y<=3;$x--,$y++) if(($x>=0)&&!in_array($allpages[$x],$pages)) array_push($pages,$allpages[$x]);asort($pages);if(!isset($_GET[\'page\'])) $_GET[\'page\']=1;foreach($pages as $i) echo\'',$page);
                        $page=str_replace("</-BL-PAGINATION-E->",'\';?>',$page);
                        $page=str_replace("</-BL-PAGINATION-NUM->",'\'.$i.\'',$page);
                        $myfile = fopen("../cats.php", "w") or die("Unable to open file!");
                        fwrite($myfile, $page);
                        fclose($myfile);
                        $page = file_get_contents($pages);
                        $page=str_replace("</-BL-HEAD->",'<?php include(\'framework.php\');?><?php BL_STATS();?><?php include(\'seosettings.php\');?><?php BL_CKEDITOR_HEAD();?>',$page);
                        $page=str_replace("</-BL-MENUS-S->",'<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("<-BL-MENU-DES->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-S->",'\';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-HREF->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-E->",'\';}echo\'',$page);
                        $page=str_replace("</-BL-MENUS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-PAGE-S->",'<?php if(isset($_GET[\'title\'])){$i=BL_PAGE_REALID_BY_TITLE($_GET[\'title\']);echo\'',$page);
                        $page=str_replace("<-BL-PAGE-TITLE->",'\'.BL_PAGE_TITLE_BY_REAL_ID($i).\'',$page);
                        $page=str_replace("<-BL-PAGE-DES->",'\'.BL_PAGE_DES_BY_REAL_ID($i).\'',$page);
                        $page=str_replace("<-BL-PAGE-AUTHOR->",'\'.BL_PAGE_AUTHOR_BY_REAL_ID($i,"return").\'',$page);
                        $page=str_replace("</-BL-PAGE-E->",'\';}?>',$page);
                        $myfile = fopen("../pages.php", "w") or die("Unable to open file!");
                        fwrite($myfile, $page);
                        fclose($myfile);
                        $page = file_get_contents($users);
                        $page=str_replace("</-BL-HEAD->",'<?php include(\'framework.php\');?><?php BL_STATS();?><?php include(\'seosettings.php\');?><?php BL_CKEDITOR_HEAD();?>',$page);
                        $page=str_replace("</-BL-MENUS-S->",'<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("<-BL-MENU-DES->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-S->",'\';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-HREF->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-E->",'\';}echo\'',$page);
                        $page=str_replace("</-BL-MENUS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-USERS-S->",'<?php session_start();',$page);
                        $page=str_replace("</-BL-USERS-NEW-S->",'if($_GET[\'do\']=="new"&&!BL_USER_IS_LOGGED()){if(isset($_POST[\'newuser\'])){',$page);
                        $page=str_replace("</-BL-USERNAME-ERROR-S->",'if(!isset($_POST[\'username\']) || trim($_POST[\'username\'])===\'\') echo\'',$page);
                        $page=str_replace("</-BL-USERNAME-ERROR-E->",'\';',$page);
                        $page=str_replace("</-BL-PASSWORD-ERROR-S->",'elseif(!BL_USER_IS_LOGGED()){if($_POST[\'password\']===$_POST[\'confrim\']){BL_USER_NEW(htmlspecialchars($_POST[\'username\']),md5($_POST[\'password\']),"1",$_POST[\'avatar\'],"0",$_POST[\'email\'],BL_DATE("","return"),$_POST[\'birthdate\'],htmlspecialchars($_POST[\'name\']));header(\'location: users.php?do=login\');}else{echo\'',$page);
                        $page=str_replace("</-BL-PASSWORD-ERROR-E->",'\';}}}',$page);
                        $page=str_replace("</-BL-USER-NEW-FORM-S->",'echo\'',$page);
                        $page=str_replace("</-BL-USER-NEW-FORM-E->",'\';',$page);
                        $page=str_replace("</-BL-USERS-NEW-E->",'}',$page);
                        $page=str_replace("</-BL-USERS-EDIT-S->",'elseif($_GET[\'do\']=="edit"&&BL_USER_IS_LOGGED()){if(isset($_POST[\'edituser\'])){if(!isset($_POST[\'password\']) || trim($_POST[\'password\'])===\'\'){BL_USER_EDIT($_POST[\'username\'],BL_USER_GET_PASS(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",$_POST[\'avatar\'],"0",$_POST[\'email\'],BL_DATE("","return"),$_POST[\'birthdate\'],$_POST[\'name\'],BL_USER_GET_PERM(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",BL_USER_SEARCH_GET_ID(BL_USER_NAME()));}elseif(isset($_POST[\'password\'])&&($_POST[\'password\']==$_POST[\'confrim\'])){BL_USER_EDIT($_POST[\'username\'],md5($_POST[\'password\']),"1",$_POST[\'avatar\'],"0",$_POST[\'email\'],BL_DATE("","return"),$_POST[\'birthdate\'],$_POST[\'name\'],BL_USER_GET_PERM(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",BL_USER_SEARCH_GET_ID(BL_USER_NAME()));}}',$page);
                        $page=str_replace("</-BL-USER-EDIT-FORM-S->",'echo\'',$page);
                        $page=str_replace("<-BL-USER-NAME->",'\'.BL_USER_GET_NAME(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").\'',$page);
                        $page=str_replace("<-BL-USER-USERNAME->",'\'.BL_USER_NAME().\'',$page);
                        $page=str_replace("<-BL-USER-AVATAR->",'\'.BL_USER_GET_AVATAR(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").\'',$page);
                        $page=str_replace("<-BL-USER-EMAIL->",'\'.BL_USER_GET_EMAIL(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").\'',$page);
                        $page=str_replace("<-BL-USER-BIRTHDATE->",'\'.BL_USER_GET_BIRTHDATE(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").\'',$page);
                        $page=str_replace("</-BL-USER-EDIT-FORM-E->",'\';',$page);
                        $page=str_replace("</-BL-USERS-EDIT-E->",'}',$page);
                        $page=str_replace("</-BL-USERS-MESSAGE-S->",'elseif($_GET[\'do\']=="messages"){if(!(!isset($_POST[\'username\']) || trim($_POST[\'username\'])===\'\')&&isset($_POST[\'sndmsg\'])){BL_MSG_SEND(BL_USER_NAME(),$_POST[\'username\'],$_POST[\'msg\']);',$page);
                        $page=str_replace("</-BL-USERS-SENT-S->",'echo\'',$page);
                        $page=str_replace("</-BL-USERS-SENT-E->",'\';}',$page);
                        $page=str_replace("</-BL-MSG-SHOW-S->",'if(isset($_GET[\'id\'])){$i=$_GET[\'id\'];echo\'',$page);
                        $page=str_replace("<-BL-MSG-TXT->",'\'.BL_MSG_RSV("des",BL_USER_NAME(),$i).\'',$page);
                        $page=str_replace("<-BL-MSG-FROM->",'\'.BL_MSG_RSV("frm",BL_USER_NAME(),$i).\'',$page);
                        $page=str_replace("<-BL-MSG-TIME->",'\'.BL_MSG_RSV("tm",BL_USER_NAME(),$i).\'',$page);
                        $page=str_replace("<-BL-MSG-DATE->",'\'.BL_MSG_RSV("dt",BL_USER_NAME(),$i).\'',$page);
                        $page=str_replace("</-BL-MSG-SHOW-E->",'\';}else{',$page);
                        $page=str_replace("</-BL-MSG-SEND-FORM-S->",'echo\'',$page);
                        $page=str_replace("</-BL-MSG-SEND-FORM-E->",'\';BL_CKEDITOR_ENABLE("msg");',$page);
                        $page=str_replace("</-BL-MSG-CONTAINER-S->",'echo\'',$page);
                        $page=str_replace("</-BL-MSG-LIST-S->",'\';for($i=1;$i<=BL_MSG_COUNT();$i++){echo \'',$page);
                        $page=str_replace("<-BL-MSG-INDEX->",'\'.$i.\'',$page);
                        $page=str_replace("</-BL-MSG-LIST-E->",'\';}',$page);
                        $page=str_replace("</-BL-MSG-CONTAINER-ES->",'echo\'',$page);
                        $page=str_replace("</-BL-MSG-CONTAINER-EE->",'\';}}',$page);
                        $page=str_replace("</-BL-USERS-LOGIN-S->",'elseif($_GET[\'do\']=="login"){if(!BL_USER_IS_LOGGED()&&!isset($_POST[\'loginuser\'])){',$page);
                        $page=str_replace("</-BL-USER-LOGIN-FORM-S->",'echo\'',$page);
                        $page=str_replace("</-BL-USER-LOGIN-FORM-E->",'\';',$page);
                        $page=str_replace("</-BL-USERS-LOGIN-E->",'}else{if(!BL_USER_IS_LOGGED()){if(BL_USER_EXIST($_POST[\'username\'],md5($_POST[\'password\']))){$_SESSION[\'logged_user\']=$_POST[\'username\'];header(\'location:users.php?do=messages\');}}}}elseif($_GET[\'do\']=="logout"){session_destroy();header(\'location:users.php?do=login\');}',$page);
                        $page=str_replace("</-BL-USERS-E->",'?>',$page);
                        $myfile = fopen("../users.php", "w") or die("Unable to open file!");
                        fwrite($myfile, $page);
                        fclose($myfile);
                        $page = file_get_contents($posts);
                        $page=str_replace("</-BL-HEAD->",'<?php include(\'framework.php\');?><?php BL_STATS();?><?php include(\'seosettings.php\');?><?php BL_CKEDITOR_HEAD();?>',$page);
                        $page=str_replace("</-BL-MENUS-S->",'<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("<-BL-MENU-DES->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-S->",'\';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-HREF->",'\'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("<-BL-MENU-LINK-TITLE->",'\'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).\'',$page);
                        $page=str_replace("</-BL-MENU-LINKS-E->",'\';}echo\'',$page);
                        $page=str_replace("</-BL-MENUS-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-POST-S->",'<?php session_start();if(isset($_GET[\'title\'])){$j=BL_POST_REALID_BY_TITLE($_GET[\'title\']);$i=BL_POST_MYID_BY_REALID($j);echo\'',$page);
                        $page=str_replace("<-BL-POST-TITLE->",'\'.BL_POST_TITLE($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-DES->",'\'.BL_POST_DESCRIPTION($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-DATE->",'\'.BL_POST_DATE($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-AUTHOR->",'\'.BL_POST_AUT($i,"return").\'',$page);
                        $page=str_replace("<-BL-POST-IMG->",'\'.BL_POST_IMG($i,"return").\'',$page);
                        $page=str_replace("</-BL-POST-E->",'\';}?>',$page);
                        $page=str_replace("</-BL-COMMENT-SEND-S->",'<?php if(isset($_POST[\'sendcomment\'])){BL_COMMENT_SEND(BL_USER_NAME(),BL_POST_ID($i,"return"),htmlspecialchars($_POST[\'comment\']));}echo\'',$page);
                        $page=str_replace("</-BL-COMMENT-SEND-E->",'\';BL_CKEDITOR_ENABLE("comment");?>',$page);
                        $page=str_replace("</-BL-COMMENTS-S->",'<?php for($j=1;$j<=intval(BL_COMMENT_COUNT(BL_POST_ID($i,"return")));$j++){echo\'',$page);
                        $page=str_replace("<-BL-COMMENT-FROM->",'\'.BL_COMMENT_RSV("frm",BL_POST_ID($i,"return"),$j).\'',$page);
                        $page=str_replace("<-BL-COMMENT-TXT->",'\'.BL_COMMENT_RSV("des",BL_POST_ID($i,"return"),$j).\'',$page);
                        $page=str_replace("</-BL-COMMENTS-E->",'\';} ?>',$page);
                        $myfile = fopen("../posts.php", "w") or die("Unable to open file!");
                        fwrite($myfile, $page);
                        fclose($myfile);
                    }
                if(BL_USER_IS_LOGGED()&&BL_USER_IS_ADMIN(BL_USER_NAME()))
                                   {
                                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">قالب</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['convert']))
                    {
                        BL_TEMPLATE_CONVERT($_POST['index'],$_POST['cats'],$_POST['pages'],$_POST['posts'],$_POST['users']);
                        echo'<div class="alert alert-success">
  قالب با موفقیت تغییر یافت
</div>
';
                    }
                    echo'
                    <form method="post">
                        <label class="label-st-1" style="direction:rtl">فایل index.html</label><input type="text" class="form-control input-st-1" name="index"><br><br>
                        <label class="label-st-1" style="direction:rtl">فایل cats.html</label><input type="text" class="form-control input-st-1" name="cats"><br><br>
                        <label class="label-st-1" style="direction:rtl">فایل pages.html</label><input type="text" class="form-control input-st-1" name="pages"><br><br>
                        <label class="label-st-1" style="direction:rtl">فایل posts.html</label><input type="text" class="form-control input-st-1" name="posts"><br><br>
                        <label class="label-st-1" style="direction:rtl">فایل users.html</label><input type="text" class="form-control input-st-1" name="users"><br><br>
                        <input type="submit" class="btn btn-primary" style="margin-right:20px;margin-bottom:10px" value="ویرایش قالب" name="convert">
                    </form>
                    ';
                                            ///BL_TEMPLATE_CONVERT('../index.html','../cats.html','../pages.html','../posts.html','../users.html');                    
                                              echo'</div></div>
                    </div>';
                                   }
                
                ?>
            </div>
            <div class="col-sm-2 items">
                <div class="row">
                    <?php include("sidebar.php");?>
                </div>
                
            </div>
        </div>
    </body>
</html>