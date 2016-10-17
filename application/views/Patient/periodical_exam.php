<div class="panel panel-default sidebar-menu">
<div class="container">
<div class="tg-wrap">

<script type="text/javascript">

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
</script>


<!-- <?php// echo base_url(); ?>index.php/patient/periodicalExaminationChart" !-->

 <form name ="userinput" onsubmit="return test()" action="<?php echo base_url(); ?>index.php/patient/saveExaminationChart" method="post"> 

<center>

<h1><u>Periodical Examination Chart</u> </h1>

<table width="600" height="400" >

<tr>
<td>
Select Patient</td>

<td><select id="form_patients" name="form_patients">
<?php foreach ($p as $row){ ?>
<option value="<?php echo $row->id;?>"><?php echo $row->fname; echo " "; echo $row->lname; ?></option>
<?php } ?>
</select></td>

</tr>

<tr>
<td>Select Tooth</td>

<td><select id="toothSelect" name ="form_tooth" onchange="ReloadImage()">
    <option  value="canine">Canine</option>
    <option  value="incisor">Incisor</option>
    <option  value="premolar">Pre Molar</option>
    <option  value="molar">Molar</option>

</select></td></tr>
<tr>
<td>Select Position</td> 
<td><select name="form_jaw">
    <option value="upper">Upper</option>
    <option value="lower">Lower</option>
</select></td>




<tr><td>Vitality :</td> <td><select name="form_vitality"><option value="positive">Positive</option><option value="negative">Negative </option></select></td></tr>
<tr><td>Recesson :</td> <td><input type="=text" name="form_recesson" ></t></td></tr>
<tr><td>Fucation :</td> <td><input type ="text" name="form_fucation"></td><td><img id="toothImage" src="" style="position:absolute; "></td></tr>
<tr><td>Mobility :</td> <td><input type="=text" name="form_mobility"></td></tr>
<tr><td>Pocket Depth:</td> <td><input type ="text" name="form_pocketDepth"></td></tr>
</table>
</p>
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Details</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-save"></i> Reset Details</button>
</center>
</form>
</div>
</div>
</div>