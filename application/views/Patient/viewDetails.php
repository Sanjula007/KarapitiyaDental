<div class="col-md-9">


    <div class="box" id="text-page">
                       
                        <h2>Patient Details</h2>

                        <?php  foreach($patient  as $pat)  ?>
                        <?php $photo = $pat->photo; ?>
                     <img class="img-thumbnail img-responsive" width="100" height="100" alt="" src="<?php echo base_url(); ?>images/<?php echo $photo;?>.jpg"/><p>

                            
                     <table class="table table-hover">
                                <tbody>
                                    <tr><td width="200"><p>Name :</td><td><?php echo $pat->fname; echo " "; echo $pat->lname; ?> </td></tr>                                     
                                   <div stye ="position: absolute;right: 10px;top: 5px;">
                                    <input type="button" class ="btn btn-primary navbar-btn" value="View Diagnostic Details" onclick="location.href='<?php echo base_url();?>index.php/patient/viewDetails/'"></p></div> 
                                    <tr><td><p>Gender :</td><td><?php echo $pat->gender; ?></p></td></tr>
                                    <tr><td><p>Occupation :</td><td><?php echo $pat->occupation; ?></p></td></tr>
                                     <tr><td><p>Address :</td><td><?php echo $pat->address; ?></p></td></tr>
                                     <tr><td><p>Phone :</td><td><?php echo $pat->phone; ?></p></td></tr>
                                     <tr><td><p>Date of Birth :</td><td><?php echo $pat->dob; ?></p></td></tr>
                                    <tr><td><p>Registered Date :</td><td><?php echo $pat->regdatetime; ?></p></td></tr>
                                    <tr><td><p>Registered Date :</td><td><?php echo $pat->regdatetime; ?></p></td></tr>
                                    <tr><td><p>Registered Date :</td><td><?php echo $pat->photo; ?></p></td></tr>
                                </tbody>
                                    </table>


           

                    
                     
                     
                    </div>

</div>
  