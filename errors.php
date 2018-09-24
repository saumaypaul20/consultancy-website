<?php  
 

if (count($errors) > 0) : 
         foreach ($errors as $error) : ?>
<p style="background-color:#c0392b; color: #fff; padding: 10px; border-radius: 5px;"><strong>Error: </strong><?php echo $error ?></p>
  	<?php endforeach ?>
  
<?php  endif ?>