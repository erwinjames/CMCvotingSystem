<?php include "includes/conn.php"; ?>

<div class="box-body">

      <?php
        $sql = "SELECT *, candidates.id AS canid FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id ORDER BY positions.priority ASC";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
          $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/profile.jpg';
          echo "<img src='$image' width='30px' height='30px'";
          // echo "
          //   // <tr>
          //   //   <td class='hidden'></td>
          //   //   <td>".$row['description']."</td>
          //   //   <td>
          //   //     <img src='".$image."' width='30px' height='30px'>
          //   //     <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['canid']."'><span class='fa fa-edit'></span></a>
          //   //   </td>
          //   //   <td>".$row['firstname']."</td>
          //   //   <td>".$row['lastname']."</td>
          //   //
          //   // </tr>
          // ";

        }
      ?>


</div>
