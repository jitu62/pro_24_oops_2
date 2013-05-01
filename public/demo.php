<?php
			$data=array(
	'product_title'		 => 'hello',
    'product_batchno'	 => 'hello1',
	'product_cost'		 => 'hello2',
	'product_domanu' 	 => 'hello3',
	'product_expiry'	 => 'hello4',
	'product_category'	 => 'hello5',
	'product_img'		 => 'hello6',
	'product_desc'		 => 'hello7'
	);
$id = 21;
foreach($data as $key => $value)
{
$value = "'$value'";
$updates[] = "$key = $value";
}
$implodeArray = implode(', ', $updates);
$sql = "UPDATE product SET ($implodeArray) where product_id=$id";
echo $sql;

	?>