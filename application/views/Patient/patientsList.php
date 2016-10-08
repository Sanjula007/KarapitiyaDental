<div class="panel panel-default sidebar-menu">

<h2> Patients List : </h2>
<p>
</p>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-jbmi{font-size:100%;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}</style>


<div class="tg-wrap"><table class="tg">

<tr>
    <th class="th">Name</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Occupation</th>
 </tr>   

<?php foreach($result as $row){?>
<tr data-href="window.location='/just/a/link.html'">
<td><?php echo $row->fname;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->gender;?></td>
<td><?php echo $row->occupation?></td>
<?php  $id = $row->id; ?>

<td><input type="button" class ="btn btn-primary navbar-btn" value="View Details" onclick="location.href='<?php echo base_url();?>index.php/patient/viewDetails/<?php echo $id;?>'"></td>
</tr></a>

<?php } ?>



</table>
</div>


</div>