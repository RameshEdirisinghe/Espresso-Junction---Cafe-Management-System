<?php require_once ("../include/initialize.php"); ?>

<?php
$sql ="SELECT `ORDERNO`, `TOTALPAYMENT`, `DISCOUNTSENIOR`, `OVERALLTOTAL` FROM `tblpayments` ";
  $mydb->setQuery($sql); 
  $result = $mydb->executeQuery();
// $sql = "SELECT id, label, DISCOUNTSENIOR, parent FROM menus ORDER BY parent, sort, label";
 // $result = mysql_query($sql) or die("database error:". mysql_error($conn));
// Create an array to conatin a list of items and parents
$menus = array(
  'items' => array(),
  'parents' => array()
);
// Builds the array lists with data from the SQL result
while ($items = mysql_fetch_assoc($result)) {
  // Create current menus item id into array
  $menus['items'][$items['TOTALPAYMENT']] = $items;
  // Creates list of all items with children
  $menus['parents'][$items['ORDERNO']][] = $items['TOTALPAYMENT'];
}
// Print all tree view menus 
echo createTreeView(0, $menus);
?>
<?php


// function to create dynamic treeview menus
function createTreeView($parent, $menu) {
   $html = "";
   if (isset($menu['parents'][$parent])) {
      $html .= "
      &amp;amp;lt;ol class='tree'&amp;amp;gt;";
       foreach ($menu['parents'][$parent] as $itemId) {
          if(!isset($menu['parents'][$itemId])) {
             $html .= "&amp;amp;lt;li&amp;amp;gt;&amp;amp;lt;label for='subfolder2'
&amp;amp;gt;&amp;amp;lt;a href='".$menu['items'][$itemId]['DISCOUNTSENIOR']."'&amp;amp;gt;"
.$menu['items'][$itemId]['OVERALLTOTAL']."&amp;amp;lt;/a&amp;amp;gt;&amp;amp;lt;/label&amp;amp;gt;
 &amp;amp;lt;input type='checkbox' name='subfolder2'/&amp;amp;gt;&amp;amp;lt;/li&amp;amp;gt;";
          }
          if(isset($menu['parents'][$itemId])) {
             $html .= "
             &amp;amp;lt;li&amp;amp;gt;&amp;amp;lt;label for='subfolder2'&amp;amp;gt;&amp;amp;
lt;a href='".$menu['items'][$itemId]['DISCOUNTSENIOR']."'&amp;amp;gt;".$menu['items'][$itemId]['OVERALLTOTAL']
."&amp;amp;lt;/a&amp;amp;gt;&amp;amp;lt;/label&amp;amp;gt; &amp;amp;lt;input type='checkbox' name='subfolder2'/
&amp;amp;
gt;";
             $html .= createTreeView($itemId, $menu);
             $html .= "&amp;amp;lt;/li&amp;amp;gt;";
          }
       }
       $html .= "&amp;amp;lt;/ol&amp;amp;gt;";
   }
   return $html;
}
?>
<style type="text/css">
  /* CSS to style Treeview menu  */
ol.tree {
  padding: 0 0 0 30px;
  width: 300px;
}
li { 
  position: relative; 
  margin-left: -15px;
  list-style: none;
}      
li input {
  position: absolute;
  left: 0;
  margin-left: 0;
  opacity: 0;
  z-index: 2;
  cursor: pointer;
  height: 1em;
  width: 1em;
  top: 0;
}
li input + ol {
  background: url(toggle-small-expand.png) 40px 0 no-repeat;
  margin: -1.600em 0px 8px -44px; 
  height: 1em;
}
li input + ol > li { 
  display: none; 
  margin-left: -14px !important; 
  padding-left: 1px; 
}
li label {
  background: url(folder.png) 15px 1px no-repeat;
  cursor: pointer;
  display: block;
  padding-left: 37px;
}
li input:checked + ol {
  background: url(toggle-small.png) 40px 5px no-repeat;
  margin: -1.96em 0 0 -44px; 
  padding: 1.563em 0 0 80px;
  height: auto;
}
li input:checked + ol > li { 
  display: block; 
  margin: 8px 0px 0px 0.125em;
}
li input:checked + ol > li:last-child { 
  margin: 8px 0 0.063em;
}
</style>