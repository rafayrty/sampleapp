<?php 
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