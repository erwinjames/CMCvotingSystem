	<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
	<body onload="window.print()" class="hold-transition skin-blue layout-top-nav">
			<?php include 'includes/navbar.php';?>

			<div class="content-wrapper">


				 <div class="container">
					 <div class="row">
					 <div class="col-md-12 col-sm-12">

			 <section  style="width:100%;padding:4%;">


			 	 	<?php
	      		$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
    			$title = $parse['election_title'];
	      			?>

                               <div class="content">

															  <div class="print_container">

																	<div class="print_heads">
																		<center>
																		<img style="width:150px;position:center;" src="images/cordovalogo.jpg" alt="" >
																	</center>
																		<div class="wordings print">
																		<h3 style="color:#055e97;">CORDOVA MULTIPURPOSE COOPERATIVE</h3>
																		<h5>Poblacion, Cordova, Cebu, 6017</h5>
																		<h5>Telephone:(032)-496-8146; Telefax:(032)-268-8070</h5>
																		 <h6>Main Office 496-8406 | Lapu-lapu Br.341-3135 | Basak Br. 493-6197 | Olango Br. 512-3278 <br>
																		 Business Enter.496-7004</h6>
																	 <h6>Email:cordova_mpc@yahoo.com | website:<a><u>www.cordovampc.com</u></a></h5>
																	</div>
																</div>
																	<div class="image_area">
																 	Voters Name : <span ><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span> &nbsp &nbsp &nbsp   <h6 style="float:right;">Branch :&nbsp<?php echo $voter['Branch']; ?> </h6>
									              <?php
									                $id = $voter['id'];
									                $sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE voters_id = '$id'  ORDER BY positions.priority ASC";
									                $query = $conn->query($sql);
									                while($row = $query->fetch_assoc()){
									                  echo "
																			<table class='table table-striped'>
																		   <tbody>
																			 <tr>
																			  <td><p>".$row['description']."</p></td>
																				<td style='float:right;'><p>".$row['canfirst']." ".$row['canlast']."</p></td>
																			 </tr>


																			 </tbody>
																			</table>
									                  ";
									                }

									              ?>
															</div>
                                                                    
															</div>
															</div>
			           							</section>
			           							
														</div>
     											</div>
													</div>



 </div>


  <?php include 'includes/footer.php'; ?>
					    	</body>
								<!-- <div class='row votelist'>
									<span class='col-sm-4'><span class='pull-left'><b>".$row['description']." :</b></span></span>
									<span class='col-sm-8'>".$row['canfirst']." ".$row['canlast']."</span>
								</div> -->
