<?
/* 
* Copyright (C) LTW @ FEUP project authors. All rights reserved.
*
* Authors:
* - Bruno Miguel <@fe.up.pt>
* - Francisco <@fe.up.pt>
* - Pedro Azevedo   <up201306026@fe.up.pt>
*/

include_once('./database/db.php');
$db = new Database('./database/helpo.db');

$projectsList = $db->get_projects_by_user_id($_GET['id']);

?>
<div id="projects">
<h1>My Projects</h1>
<div id="projectscontent">
    <script type="text/javascript" src="./js/project.js"></script>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>
    <a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>add</div></a>
	<form class="compactform" id="projectsadd" style="display:none">
      <div class="line">
        Project Name
        <input name="name" type="textbox" placeholder="Name"/>
        <input id="addproject" type="button" value="Add"/>
        <input class="clearform" type="button" value="Clear"/><br/>
	    </div>
    </form> 
<form>
  <table class="list projectslist" id="<? echo $project_section; ?>table">
    <tr>
      <td><input class="checkboxcontrol" type="checkbox"/></td>
      <td>Name</td>
    </tr><?
    foreach ($projectsList as $projectList) {
      echo '<tr>';
      echo '<td><input id="' . $projectList['project_id'] . '" type="checkbox"/></td>';
      echo '<td><a id="' . $projectList['project_name'] . '"href="edit_project.php?id=' . $projectList['project_id'] . '" >' . $projectList['project_name'] .'</a></td>';
      echo '</tr>';
    }
?></table>
</form>
</div>
</div>