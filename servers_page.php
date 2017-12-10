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
  
if (isset($_SESSION['loggedin']) && ($_SESSION['usertype'] == 1)) {
  require_once('./database/db.php');

  $db = new Database('./database/helpo.db');
  $servers_list = $db->get_servers();
  $servers_section = "servers";
   
  require_once('./templates/html_header.php');?>
  <div id="servers">
    <h1>Servers</h1>
    <div id="serverscontent">
    <script type="text/javascript" src="./js/admin.js"></script>
    <a href="#"><div class="button" id="search"><img src="./images/search-icon.png"/>search</div></a>
    <a href="#"><div class="button" id="delete"><img src="./images/delete-icon.png"/>delete</div></a>
    <a href="#"><div class="button" id="add"><img src="./images/add-icon.png"/>add</div></a>
    <form class="compactform" id="serverssearch" style="display:none">
      <div class="line">
        Search
        <input name="tags" type="textbox" placeholder="Tags"/>
      </div>
      <div class="line">
        Start Date
        <input class="day" name="sday" type="textbox" placeholder="DD"/>
        <input class="month" name="smonth" type="textbox" placeholder="MM"/>
        <input class="year" name="syear" type="textbox" placeholder="YYYY"/>
        End Date
        <input class="day" name="eday" type="textbox" placeholder="DD"/>
        <input class="month" name="emonth" type="textbox" placeholder="MM"/>
        <input class="year" name="eyear" type="textbox" placeholder="YYYY"/>
        <input id="runsearch" type="button" value="Run Search"/>
        <input id="clearsearch" class="clearform" type="button" value="Clear"/>
      </div>
      <div class="line" id="searchresult" style="display:none">
        <form>
          <h3>Search Results</h3>
          <div id="emptysearch">No results so far.</div>
          <table class="list newslist">
            <tr>
              <td id="newsimportselection"><input class="checkboxcontrol" type="checkbox"/></td>
              <td id="servername">Server</td>
              <td>News</td>
            </tr>
          </table>
          <input id="importnews" type="button" value="Import"/>
        </form>
      </div>
    </form>
    <form class="compactform" id="serversadd" style="display:none">
      <div class="line">
        Server Name
        <input name="name" type="textbox" placeholder="Name"/>
        <input class="clearform" type="button" value="Clear"/><br/>
      </div>
      <div class="line">
        Server URL
        <input name="url" type="textbox" placeholder="URL"/>
        <input id="addserver" type="button" value="Add"/>
      </div>
    </form>
  <?require_once('./templates/html_list_servers.php');
  echo '</div>';
  echo '</div>';
  require_once('./templates/html_footer.php');
} else {
  header('Location: ./home.php');
}

