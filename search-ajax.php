<?php 
// yeh isset ki ak addition kri ha yeh darasal kya krti h kainaa check krti ha ka post arhi ha S ki agr nhh
//too phrr tum s ki value simple empty krdoo jissy yeh ak sath sary ka sary record fetch krly yeh jb textbox
//empty krdain ga tb chlegaa or jb page load hta h
if(!isset($_POST['s'])){
$_POST['s']='';
}
	$db = new Mysqli('localhost','root','','laravel_crud');
	$output = '';
	$output .= '
		<table class="table table-bordered">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Designation</th>
			</thead>
			<tbody>
	';
	$q = $db->query("SELECT id,name,email,password FROM `users` WHERE name LIKE '".$_POST["s"]."%' ");
	while ($r = $q->fetch_assoc()):

		$output.= '
			<tr>
				 	<td>'.$r['id'].'</td>
				 	<td>'.$r['name'].'</td>
				 	<td>'.$r['email'].'</td>
				 	<td>'.$r['password'].'</td>
				 </tr>
		';

	endwhile;
	$output.= '</tbody>
		</table>';

	echo $output;

 ?>