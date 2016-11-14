			

<div class="container">
	<div class="col-md-12">
 
					<div class="col-md-12">

						<ul class="breadcrumb">
							<li><a href="#">Patient</a>
							</li>
							<li>Registration</li>
						</ul>

					</div>
					<?php $this->load->view('SideBar'); ?>
                <div class="col-md-9">
                    <div class="box">
                        <h1>Patient</h1>
                        <hr>
                         <div class="alert alert-success fade in">
                                   
                                    <strong>Success!</strong> The Patient has been successfully added.<br>
                                    Patient ID id <strong><?= $pid ?></strong> 
                         </div>


                   
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
                    
                        
                    <div class="col-md-offset-4 col-md-4">
                        <div class="box">       
                            <button class="btn btn-success btn-block">Form 1</button>
                            <button class="btn btn-success btn-block">Form 2</button>
                            <button class="btn btn-success btn-block">Form 3</button>
                            <button class="btn btn-success btn-block">Form 4</button>

                        </div>
                    </div>
                </div>		
				
	</div>
</div>