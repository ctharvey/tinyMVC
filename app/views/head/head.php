<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <base href="http://<?=SERVER?>.com/" />
    
    <script src="googleanalytics.js"></script>
    <script src="simpletrans.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <?if(!empty($stylesheets)){
        foreach ($stylesheets as $stylesheet){?>
            <link href="stylesheets/<?=$stylesheet?>" rel="stylesheet" type="text/css" />
    <?}}?>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="stylesheets/newsstyle.css" rel="stylesheet" type="text/css" />    
    <link href="stylesheets/stats.css" rel="stylesheet" type="text/css" />
    <link href="stylesheets/vote.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />

    <title>Minederp</title>


</head>
<body>


    
    <div class="shadow" id="head">    
        <div class="headimg">
            <a href="index.php">
                <img class="headimg" src="thisone.png" width="800px" />
            </a>
        </div>
    </div>
    
    <div id="topbar" class="graygrad">
      <?if ($username != "Anonymous") include(BASE_DIR.'/views/head/menuLoggedIn.php');
        else include(BASE_DIR.'/views/head/menuLoggedOut.php');
        include(BASE_DIR.'/views/head/menu.php');?>
    </div>
    <div style="height: 15px; width: 100%;"></div>