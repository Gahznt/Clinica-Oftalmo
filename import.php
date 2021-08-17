<?php
if(!empty($_FILES['file']['name']))
{
 $connect = new PDO("mysql:host=localhost;dbname=digital;", "root", "", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    ));

 $total_row = count(file($_FILES['file']['tmp_name']));
 $total_row2 = $total_row - 1;
 $file_location = str_replace("\\", "/", $_FILES['file']['tmp_name']);
 
 $query_1 = '
 LOAD DATA LOCAL INFILE "'.$file_location.'" IGNORE 
 INTO TABLE report_store
 FIELDS TERMINATED BY ";" 
 LINES TERMINATED BY "\r\n" 
 IGNORE 1 LINES 
 (@column1,@column2) 
 SET pedido = @column1, loja = @column2
 ';

 $statement = $connect->prepare($query_1);

 $statement->execute();
 $output = array(
  'success' => 'Total de <b>'.$total_row2.'</b>  pedidos importados.'
 );
 echo json_encode($output);
}