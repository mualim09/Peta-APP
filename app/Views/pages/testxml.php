<?php // var_dump($xml);

/*foreach ($xml->getResultArray() as $row) {
	var_dump($row);
}*/
?>
<?php //header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>
<?xml version="1.0"?>
<?php foreach($xml->getResultArray() as $row) { ?>
  <markers>
     <id><?php echo $row['id'];?></id>
     <name><?php echo $row['name'];?></name>
     <address><?php echo $row['address'];?></address>
  </markers>
  <?php } ?>