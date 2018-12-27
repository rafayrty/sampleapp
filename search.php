<?php 
	$db = new Mysqli('localhost','root','','laravel_crud');
	//Iss Project Ki Saari Explantation Yeh Kesay Chl Raha h
	//Purana Code Mainy Comment kra hua h reasons b mentioned hain qqq?
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Serach With AJAX</h1>
		<input type="text" id="search" class="form-control" placeholder="Search Here">
		<table class="table table-bordered">
		<div id="result"></div>
<!--Ak Not Krny Waly bt ajax se data result id main arhaa ha or wo b poori table main too agr hum neechy waly code ko 
too doo tables bnajiengi ak jismain search hua data h or ak jis main nhh
-->
			<!-- <thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
			</thead>
			<tbody>

				<?php 
					$q = $db->query('SELECT * FROM users');
					while ($r = $q->fetch_assoc()) :
				 ?> -->
				 <!-- <tr>
				 	<td><?= $r['id'] ?></td>
				 	<td><?= $r['name'] ?></td>
				 	<td><?= $r['email'] ?></td>
				 	<td><?= $r['password'] ?></td>
				 </tr> -->
				<!-- <?php endwhile; ?> </tbody>-->
			 
		</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		//Shuru main ajax dalny ki kyaa tuk bnti h?
		//Iski wajah yeh h ka humny opar too code koo cmnt kradya ab page load hny pr humy data fetch too krana haina
		//jisky lyay hum starting main ak ajax request daldety hain i hope you understand
$.ajax({
	type: "post",
	url: "search-ajax.php",
	success: function (response) {
		$('#result').html(response);	

	}
});
//Purany code main akk error tha ka var s= $(this).val(); bahar thaa $(#search).on ka isko andar hna thaa q ka this mtlb jo element selected ha??
		$('#search').on('keyup',function(){
			var s = $(this).val();
		if (s == '') 
		{
			$.ajax({
				url: 'search-ajax.php',
				type: 'POST',
				data: {s:s},
				success:function(data){
					//iss line main ak msla tha $('#result').html('') yeh aisi thii empty iski kya tuk bnti ha agr yrr
					// apko data chayay h nhh empty hny pr na too ap ajax request h nhh bhejoo pehli bt yeh issue empty wala php main fix kra ha
					 
					$('#result').html(data);	
				}
			});
			 
	}else{
		$.ajax({
				url: 'search-ajax.php',
				type: 'POST',
				data: {s:s},
				success:function(data){
					$('#result').html(data);	
				}
			});
	}
});
	});
	</script>
</body>
</html>