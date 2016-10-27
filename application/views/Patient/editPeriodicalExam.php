<div class="panel panel-default sidebar-menu">
<div class="container">
<div class="tg-wrap">

<script type ="text/javascript">

function ReloadImage(){

var tooth = document.getElementById("toothSelect");
var selectedTooth = tooth.options[tooth.selectedIndex].value;

//alert(selectedTooth);
//document.getElementById();    
//document.getElementById('toothImage').setAttribute('src',"<?php echo base_url(); ?>/selectedTooth.png">);    


 var img = document.getElementById("toothImage");
    img.src = "<?php echo base_url(); ?>tooth/"+selectedTooth+".png";
    return false;

}

function submit(){

    var x = document.getElementByName('userinput');
    x[0].submit();
}



function test(){
    var x=document.form['userinput']['form_fucation'].value;
    if(x == null || x==""){
        alert("fucation must be filled");
        return false;
    }
    else{
    alert("Successfully added!");
    }
}


public function delete(){
     ("Do You Want to delete the record?");
}

</script>




<!-- <?php// echo base_url(); ?>index.php/patient/periodicalExaminationChart"  class="btn btn-danger"   !-->

 

<center>

<h1><u> Edit Periodical Examination Chart</u> </h1>

<table width="600" height="400" >

<tr>
<td>


</tr>


<?php foreach ($pd as $row ) {  ?>
    <form name ="userinput"  action="<?php echo base_url(); ?>index.php/patient/saveNewExaminationChart/<?php echo $row->id; ?>" method="post"> 
<tr>
<td>Select Tooth</td>

<td><select id="toothSelect" name ="form_tooth" onchange="ReloadImage()" >
    <option  value="<?php echo $row->tooth; ?>" selected='selected'><?php echo $row->tooth; ?>  </option>
    <option  value="canine">Canine</option>x
    <option  value="incisor">Incisor</option>
    <option  value="premolar">Pre Molar</option>
    <option  value="molar">Molar</option>


</select></td></tr>



<tr>
<td>Select Position</td> 
<td><select name="form_jaw">
    <option value="upper">Upper</option>
    <option value="lower">Lower</option>
</select></td></tr>




<tr><td>Vitality :</td> <td><select name="form_vitality"><option value="positive">Positive</option><option value="negative">Negative </option></select></td></tr>
<tr><td>Recesson :</td> <td><input value ="<?php echo $row->recesson; ?>" type="=text" name="form_recesson" ></t></td></tr>
<tr><td>Fucation :</td> <td><input value ="<?php echo $row->fucation; ?>" type ="text" name="form_fucation"></td><td><img id="toothImage" src="" style="position:absolute; "></td></td></tr>
<tr><td>Mobility :</td> <td><input value ="<?php echo $row->mobility; ?>" type="=text" name="form_mobility"></td></tr>
<tr><td>Pocket Depth:</td><td><input value="<?php echo $row->pocketDepth;?>" type ="text" name="form_pocketDepth"></td></tr>
</table>
</p>
<?php }  ?>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Details</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-save"></i> Reset Details</button>
</center>
</form>
</div>
</div>
</div>