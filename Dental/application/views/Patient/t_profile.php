<script type="text/javascript">
    var teeth=new Array();
    $( document ).ready(function() {
    
    var str='<?php echo $trauma_examination[0]->teeth; ?>';
    var tooth=str.split(',');
    for(i=0; i<tooth.length; i++){
        document.getElementById('btn'+tooth[i]).className = "btn btn-danger  col-sm-1";
        teeth.push(tooth[i]);
        document.getElementById('divteeth').style.display='block';
    }

    <?php
        for($i=1;$i<5;$i++){
            for($j=1;$j<6;$j++){
                $str='t'.$i.$j;
                if($trauma_teeth_details[0]->$str!=0){
                echo  "document.getElementById('btn".$str."').className = 'btn btn-danger  col-sm-1';";
                echo  "document.getElementById('btn".$str."').innerHTML = '".$i.$j."(".$trauma_teeth_details[0]->$str.")"."';";
            }
                   // $trauma_teeth_details[0]->$str;
            }
        }

    ?>


});





</script>

</script>			

<div class="container">
	<div class="col-md-12">
					<div class="col-md-12">

						<ul class="breadcrumb">
							<li><a href="#">Patient</a>
							</li>
							<li>Profile</li>
						</ul>

					</div>
					
                <div class="col-md-12">
                    <div class="box">
                        <h1>Patient </h1>
                        <hr>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box" style="min-height: 280px ">
                        <h4>Presonal Details</h4>
                        <table>
                            <?php foreach($patient as $row){?>
                            <tr>
                                <td><label >Name :</label></td>
                                <td><label ><?php echo $row->title.'. '.$row->fname.' '.$row->lname;?></label></td>
                            </tr>
                            <tr>
                                <td><label>Age :</label></td>
                                <td><label ><?php    $datetime1 = date_create(date('Y-m-d'));  $datetime2 = date_create($row->dob); $interval = date_diff($datetime1, $datetime2);echo $interval->format('%y Year %m Month' );?></label></td>
                            </tr>
                            <tr>
                                <td><label>Gender :</label></td>
                                <td><label ><?php echo $row->gender;?></label></td>
                            </tr>
                            <tr>    
                                <td><label>Registration Date :</label></td>
                                <td><label ><?php echo $row->regdatetime?></label></td>
                            </tr>
                            <tr>
                                <td><label>Telephone :</label></td>
                                <td><label ><?php echo $row->phone;?></label></td>
                            </tr>
                            <tr>    
                                <td><label>Address :</label></td>
                                <td><label ><?php echo $row->address?></label></td>
                            </tr>
                            <tr>        
                                <td><label>Email :</label></td>
                                <td><label ><?php echo $row->email?></label></td>
                            </tr>
                            <tr>    
                                <td><label>Occupation :</label></td>
                                <td><label ><?php echo $row->occupation?></label></td>
                            </tr>
                            <?php } ?>
                        </table>    


                    </div>
                </div>	

                <div class="col-md-6">
                    <div class="box"  style="min-height: 280px ">
                        <h4>Medical Details</h4>
                        <table>
                            <?php foreach($trauma_medical_details as $row){?>
                            <tr>
                                <td><label >Is  healthy :</label></td>
                                <td><label ><?php echo $row->healthy.'. '.$row->healthy_details;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Have allergies :</label></td>
                                <td><label ><?php echo $row->allergies.'. '.$row->allergies_details;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Is smoking :</label></td>
                                <td><label ><?php echo $row->smoking.'. '.$row->smoking_number;?></label></td>
                            </tr>
                            <?php } ?>
                        </table>  

                        <button class='btn btn-primary pull-right' id='btnupdatemd' data-target="#updatemd" onclick="showupmd()">Update</button>
                                  


                    </div>
                </div>  	

                <div class="col-md-12">
                    <div class="box"  style="min-height: 500px ">
                    
                    <div class="col-md-4">
                        <h4>Trauma Details</h4>
                        <table>
                            <?php foreach($trauma_details as $row){?>
                            <tr>
                                <td><label >Trauma Date time :</label></td>
                                <td><label ><?php echo $row->tdate.': '.$row->ttime;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Course :</label></td>
                                <td><label ><?php echo $row->cause.'. '.$row->cause_details;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Frist come :</label></td>
                                <td><label ><?php echo $row->date;?></label></td>
                            </tr>
                            <tr>
                                <td><label >Bite disturbance :</label></td>
                                <td><label ><?php echo $row->bd; ?></label></td>
                            </tr>




                            <?php } ?>
                        </table>    

                   </div> 

                    <div class="col-md-5">
                    <h4>Avulsed teeth Details</h4>
                    <?php foreach($trauma_examination as $row){?>
                    <div class="row" id='divteeth' style='display: block;'>
                             Avulsed Teeth<br/>
                                <div>
                                <button  class="btn btn-success" id='btn13' onclick='getteeth(this.id); return false;'>13</button>
                                <button  class="btn btn-success" id='btn12' onclick='getteeth(this.id); return false;'>12</button>
                                <button  class="btn btn-success" id='btn11' onclick='getteeth(this.id); return false;'>11</button>
                                <button  class="btn btn-success" id='btn21' onclick='getteeth(this.id); return false;' >21</button>
                                <button  class="btn btn-success" id='btn22' onclick='getteeth(this.id); return false;'>22</button>
                                <button  class="btn btn-success" id='btn23' onclick='getteeth(this.id); return false;' >23</button>
                                <br/>
                                <button  class="btn btn-success" id='btn43' onclick='getteeth(this.id); return false;'>43</button>
                                <button  class="btn btn-success" id='btn42' onclick='getteeth(this.id); return false;'>42</button>
                                <button  class="btn btn-success" id='btn41' onclick='getteeth(this.id); return false;'>41</button>
                                <button  class="btn btn-success" id='btn31' onclick='getteeth(this.id); return false;'>31</button>
                                <button  class="btn btn-success" id='btn32' onclick='getteeth(this.id); return false;'>32</button>
                                <button  class="btn btn-success" id='btn33' onclick='getteeth(this.id); return false;'>33</button>
                                <input type="hidden" name="teeth"  value='<?php echo set_value('teeth'); ?>' id='teeth'>
                                </div>
                            </div>
                        <table>
                            
                            <tr>
                                <td><label >Is  Found :</label></td>
                                <td><label ><?php echo $row->found;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Is teeth dirty:</label></td>
                                <td><label ><?php echo $row->dirty;?></label></td>
                            </tr>

                            <tr>
                                <td><label >dry time :</label></td>
                                <td><label ><?php echo $row->drytime;?></label></td>
                            </tr>
                            <tr>
                                <td><label >Repanted :</label></td>
                                <td><label ><?php echo $row->repanted;?></label></td>
                            </tr>
                            <tr>
                                <td><label >Store medium :</label></td>
                                <td><label ><?php echo $row->smedium;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Oral Hygiene :</label></td>
                                <td><label ><?php echo $row->oralhygiene;?></label></td>
                            </tr>

                            <tr>
                                <td><label >Active periodontal disease :</label></td>
                                <td><label ><?php echo $row->apdisease;?></label></td>
                            </tr>
                            <tr>
                                <td><label >Madication :</label></td>
                                <td><label ><?php echo $row->madication;?></label></td>
                            </tr>
                    </table> 
                    </div>
                    <div class="col-md-3">
                    <img src="<?php echo base_url('uploads/patientimages/'. $row->pic);?>"  style="height:228px;">
                    <p><?php echo $row->imgdescription;?></p>
                            
                         <?php } ?>

                         
                    </div>
                    <!--<button class='btn btn-primary pull-right'>Update</button>-->
                    </div>
                </div>  
			
                <div class="col-md-12">
                    <div class="box"  style="min-height: 300px ">
                        <h4>X-ray Details</h4>
                        
                            <?php foreach($trauma_teeth_details as $row){?>
                        <div class="col-md-4">
                            <table>
                            <tr>
                                <td><label >Xray:</label></td>
                                <td><label ><?php  ?></label></td>
                            </tr>

                            <tr>
                                <td><label >findings:</label></td>
                                <td><label ><?php echo $row->finding;?></label></td>
                            </tr>

                            <tr>
                                <td><label >diagnosis :</label></td>
                                <td><label ><?php echo $row->diagnosis;?></label></td>
                            </tr>
                            <tr>
                                <td><label >xrayissues :</label></td>
                                <td><label ><?php echo$row->xrayissues;?></label></td>
                            </tr>
                            </table>  
                        </div>
                        <div class="col-md-4">  
                            <img src="<?php echo base_url('uploads/patientimages/'. $row->xrayiamge);?>"  style="height:228px;">
                        </div>

                            <?php } ?>
                        

                            <button class='btn btn-primary pull-right' onclick='showupxray()'>Update</button>
                    </div>
                </div> 

                <div class ='col-md-12'>
                    <div class='box'>
                        <div class="row" id='divteeths' >
                                Teeth<br>
                                <button  class="btn btn-default col-sm-1" id='btnt15' value='1'  >15</button>
                                <button  class="btn btn-default col-sm-1" id='btnt14' value='2'  >14</button>
                                <button  class="btn btn-default col-sm-1" id='btnt13' value='3'  >13</button>
                                <button  class="btn btn-default col-sm-1" id='btnt12' value='4'  >12</button>
                                <button  class="btn btn-default col-sm-1" id='btnt11' value='5'  >11</button>
                                <button  class="btn btn-default col-sm-1" id='btnt21' value='6'   >21</button>
                                <button  class="btn btn-default col-sm-1" id='btnt22' value='7'  >22</button>
                                <button  class="btn btn-default col-sm-1" id='btnt23' value='8'   >23</button>
                                <button  class="btn btn-default col-sm-1" id='btnt24' value='9'   >24</button>
                                <button  class="btn btn-default col-sm-1" id='btnt25' value='10'   >25</button>
                                <br><br>
                                <button  class="btn btn-default col-sm-1" id='btnt45' value='11'  >45</button>
                                <button  class="btn btn-default col-sm-1" id='btnt44' value='12'  >44</button>
                                <button  class="btn btn-default col-sm-1" id='btnt43' value='13'  >43</button>
                                <button  class="btn btn-default col-sm-1" id='btnt42' value='14'  >42</button>
                                <button  class="btn btn-default col-sm-1" id='btnt41' value='15'  >41</button>
                                <button  class="btn btn-default col-sm-1" id='btnt31' value='16'  >31</button>
                                <button  class="btn btn-default col-sm-1" id='btnt32' value='17'  >32</button>
                                <button  class="btn btn-default col-sm-1" id='btnt33' value='18'  >33</button>
                                <button  class="btn btn-default col-sm-1" id='btnt34' value='19'  >34</button>
                                <button  class="btn btn-default col-sm-1" id='btnt35' value='20'  >35</button>
                                <br>
                                
                                        <label class="  col-sm-4"   > 1.Infaction</label>
                                        <label class="col-sm-4"    > 2.Enamel</label>
                                        <label class=" col-sm-4"    > 3.Enamel Dentin</label>
                                        <label class="col-sm-4"     > 4.Enamel Dentin Pulp</label>
                                        <label class="col-sm-4"     > 5.Enamel Dentin Pulp</label>
                                        <label class=" col-sm-4"     > 6.Crown-root (uncomplicated)</label>
                                        <label class="col-sm-4"     > 7.Crown-root (complicated)</label>
                                        <label class="col-sm-4"     > 8.Root apical/mid coronal</label>
                                        <label class="col-sm-4"     > 9.Dento alveolar</label>
                                        <label class="col-sm-4"     > 10.Concussion</label>
                                        <label class="col-sm-4"     > 11.Sub-luxation</label>
                                        <label class="col-sm-4"     > 12.Extrusion</label>
                                        <label class="col-sm-4"     > 13.Lateral Luxation</label>
                                        <label class="col-sm-4"     > 14.Intrusion</label>
                                        <label class="col-sm-4"     > 15.Avulsion</label>
                                        <label class="col-sm-4"     > 16.Other</label>
                                        <label class="col-sm-4"  > 0.none</label>
                                
                                <button class='btn btn-primary pull-right' onclick="showupteeth()">Update</button>    
                            </div>
                        

                    </div>

                </div> 


	</div>
</div>