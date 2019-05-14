<?php
require "callapi.php";
$json = CallAPI("GET", "http:/v1.39/images/json");
$allImages = json_decode($json, true);
$repoTags = [];
foreach($allImages as $image){
	if(!empty($image['RepoTags'])){
		$repoTags = array_merge($repoTags, $image['RepoTags']);
	}
}
foreach($repoTags as $key => $row){
	if(strpos($row, "KniMA")===FALSE){
		unset($repoTags[$key]);
	}
}
?>
<h3>Images List</h3>
<?php 
if(!empty($repoTags)): ?>
<table border="1" cellspacing=0 cellpading=0>
	<tr>
		<th>Image name</th>
	</tr>
	<?php
	foreach($repoTags  as $tag): ?>
		<tr><td><?php echo $tag; ?></td></tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
<div>The list is empty; create a new image using the form.</div>
<?php endif; ?>