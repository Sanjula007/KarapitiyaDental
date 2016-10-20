			


<div class="box">
<table>
	<?php foreach($patient as $row){?>
	
	<tr>
		<td>
			<label >Name :</label>
		</td>
		<td>
			<label ><?php echo $row->title.'. '.$row->fname.' '.$row->lname;?></label>
		</td>
	</tr>
	<tr>
		<td>
			<label>Age :</label>
		</td>
		<td>
			<label ><?php 
			$datetime1 = date_create(date('Y-m-d'));
			$datetime2 = date_create($row->dob);
    
			$interval = date_diff($datetime1, $datetime2);
    
			echo $interval->format('%y Year %m Month' );?></label>
		</td>
	</tr>
	<tr>
		<td>
			<label>Gender :</label>
		</td>
		<td>
			<label ><?php echo $row->gender;?></label>
		</td>
	</tr>
	<tr>	
		<td>	
			<label>Registration Date :</label>
		</td>
		<td>
			<label ><?php echo $row->regdatetime?></label>
		</td>
	</tr>
	<tr>
		<td>
			<label>Telephone :</label>
		</td>
		<td>
			<label ><?php echo $row->phone;?></label>
		</td>
	</tr>
	<tr>	
		<td>
			<label>Address :</label>
		</td>
		<td>
			<label ><?php echo $row->address?></label>
		</td>
	</tr>
	<tr>		
		<td>
			<label>Email :</label>
		</td>
		<td>
			<label ><?php echo $row->email?></label>
		</td>
	</tr>
	<tr>	
		<td>	
			<label>Occupation :</label>
		</td>
		<td>
			<label ><?php echo $row->occupation?></label>
		</td>
	</tr>
	<?php } ?>
</table>	
</div>