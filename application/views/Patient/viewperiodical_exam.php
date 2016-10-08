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


<div class="tg-wrap">



<center>
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
<td><?php echo $row->tooth;?></td>
<td><?php echo $row->jaw;?></td>
<td><?php echo $row->vitality;?></td>
<td><?php echo $row->recesson;?></td>
<td><?php echo $row->fucation;?></td>
<td><?php echo $row->mobility;?></td>
<td><?php echo $row->pocketDepth;?></td>
</tr>

<?php } ?>
</table>
</p>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Details</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-save"></i> Reset Details</button>
</center>
</form>
</div>
</div>
</div>