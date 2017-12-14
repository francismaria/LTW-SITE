<?php
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

session_start();
$todolist_section = "lists";
include_once('templates/html_header.php');
?>
<div id="lists">
<h1>Lists</h1>
<div id="listscontent">
    <script type="text/javascript" src="./js/project.js"></script>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>
    <a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>add</div></a>
	<form class="compactform" id="listsadd" style="display:none">
      <div class="line">
        List Name
        <input name="name" type="textbox" placeholder="Name"/>
		<input id="addlist" type="button" value="Add"/>
        <input class="clearform" type="button" value="Clear"/><br/>
      </div>
    </form>
<?
include_once('templates/html_lists.php');
?>
</div>
</div>
<?
include_once('templates/html_footer.php');
?>
