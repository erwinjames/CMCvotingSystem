<?php
include "includes/conn.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id
	WHERE firstname LIKE '%".$search."%'
	OR lastname LIKE '%".$search."%'
	OR platform LIKE '%".$search."%'
  OR positions.description LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT *, candidates.id AS canid FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id ORDER BY positions.priority ASC";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '';


//
// please put your query here
//
// <div class="card-area">
//   <div class="card">
//     <img class="avatar" src="https://i.ibb.co/Qr8jyBn/person1.jpg" alt="person1">
//     <div class="skewed bg-react"></div>
//
//     <div class="content">
//       <h1>John Doe</h1>
//       <h6>Front-end developer</h6>
//       <p class="esp text-react">React JS</p>
//     </div>
//   </div>
//   <div class="media bg-react">
//     <ul class="list">
//       <li class="item">
//         <a href="#" class="link"><i class="fab fa-facebook-f"></i></a>
//       </li>
//       <li class="item">
//         <a href="#" class="link"><i class="fab fa-linkedin-in"></i></a>
//       </li>
//       <li class="item">
//         <a href="#" class="link"><i class="fab fa-git"></i></a>
//       </li>
//       <li class="item">
//         <a href="#" class="link"><i class="fab fa-twitter"></i></a>
//       </li>
//     </ul>
//   </div>
// </div>


	while($row = mysqli_fetch_array($result))
	{
		  $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/profile.jpg';
		$output .= '
    <div><h1>'.$row["description"].'</h1></div>
		<div class="card-area">
		  <div class="card">
		    <img class="avatar" src="'.$image.'" alt="person1">
		    <div class="skewed bg-react"></div>

		    <div style="margin-left:130px;" class="content">
		      <h1>'.$row["firstname"].'&nbsp &nbsp'.$row["lastname"].'</h1>
		      <h6>'.$row["description"].'</h6>
		      <p class="esp text-react">'.$row["platform"].'</p>
		    </div>
		  </div>
		  <div class="media bg-react">
		  <center>Vote as:&nbsp <b>'.$row["description"].'</b></center>
		  </div>
		</div>
		<br>
		<br>
		<br>
		<br>



		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
