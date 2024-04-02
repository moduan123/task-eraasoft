<?php include('layout/header.php'); ?>


<table class="table table-striped-columns">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">massage</th>
      <th scope="col">acation</th>
    </tr>
  </thead>
  <?php

$file = fopen("users.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        $data = explode(",", $line);
        $username = $data[0];
        $email = $data[1];
        $phone = $data[2];
        $massag = $data[3];
        $id +=1;
        
     ?>
     <tbody>
    <tr>
      <th scope="row"><?php $id?></th>
      <td scope="col"><?php echo $username ?></td>
      <td scope="col"><?php echo $email ?></td>
      <td scope="col"><?php echo $phone ?></td>
      <td scope="col"><?php echo $massag ?></td>
    </tr>
   
  </tbody>
     
     <?php   
      
    }

    fclose($file);
} else {
    echo "Unable to open file.";
}
?>
  
</table>