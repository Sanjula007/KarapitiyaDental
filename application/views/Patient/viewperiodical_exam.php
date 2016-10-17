<div class="panel panel-default sidebar-menu">
<div class="container">
<div class="tg-wrap">

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-jbmi{font-size:100%;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}</style>

<script type="text/javascript">

function test(){


	var sel = document.getElementById('selectPatient');
   	var sv = sel.options[sel.selectedIndex].value;
	

	location.href = "<?php echo base_url();?>index.php/patient/viewperiodical_exam/"+sv;
 	document.getElementById("selectPatient").selectedIndex = sv;


}

</script>

<p id= 'pid' style="visibility:visible"/> </p>

<div class="tg-wrap">

<script>
//var currentLocation = window.location;
 //	document.getElementById('pid').innerHTML= currentLocation;
 	//document.getElementById('selectPatient').value=;

var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
var segment_array = segment_str.split( '/' );
var last_segment = segment_array[segment_array.length - 1];
document.getElementById('pid').innerHTML=last_segment;

document.getElementById('selectPatient').value=last_segment;	

</script>

<select id ="selectPatient" onchange="test()">
<option value="None" selected="selected"> Select a patient </option>
<?php foreach ($p as $row)  {?>
<option value="<?php echo $row->id; ?>"><?php echo $row->fname; echo" "; echo $row->lname; ?> </option>
<?php  } ?>
</select>

<center>
<h2><u> View Periodical Examination Details </u> </h2>
<table style="width:25%;">
<tr>
<?php foreach ($patient as $pa) { ?>

<td>Patient Name :</td><td><?php echo $pa->fname; echo" "; echo $pa->lname; ?></td></tr>
<tr>
<td>Registered Date :</td> <td><?php echo $pa->regdatetime; ?></td></tr>



<?php }  ?>
</table>
<table class ="tg">
<tr>
<th>Tooth</th>
<th>Jaw</th>
<th>Vitality</th>
<th>Recesson</th>
<th>Fucation</th>
<th>Mobility</th>
<th>Pocket Depth</th>
</tr>
<?php foreach ($patient as $row) { ?>

<?php if (empty($row->tooth)) echo "Patient Details Not Availeble"; ?>


<td><?php echo $row->tooth;?></td>
<td><?php echo $row->jaw;?></td>
<td><?php echo $row->vitality;?></td>
<td><?php echo $row->recesson;?></td>
<td><?php echo $row->fucation;?></td>
<td><?php echo $row->mobility;?></td>
<td><?php echo $row->pocketDepth;?></td>
<td><input type="button" class="btn btn-xs btn-danger pull-right" value="Edit"></td>
</tr>

<?php } ?>
</table>
</p>
</center>
</form>
</div>
</div>
</div>