
<script type="text/javascript">
$( document ).ready(function() {
    submitformteeth();




});


    function showupteeth(){

        $('#updateteeth').modal('show');
            <?php
        $a=0;    
        for($i=1;$i<5;$i++){
          
            for($j=1;$j<6;$j++){
                $str='t'.$i.$j;
                if($trauma_teeth_details[0]->$str!=0){
                echo  "document.getElementById('upbtn".$str."').className = 'btn btn-danger  col-sm-1';";
                echo  "document.getElementById('upbtn".$str."').innerHTML = '".$i.$j."(".$trauma_teeth_details[0]->$str.")"."';";
                
            } 
            echo  "document.getElementById('upteeth').value += '".$trauma_teeth_details[0]->$str.",';";                  // $trauma_teeth_details[0]->$str;
            echo  "upteeth[".$a++."]= '".$trauma_teeth_details[0]->$str."';";                  // $trauma_teeth_details[0]->$str;
            }
        }

    ?>
        
       
        alert(upteeth);

    }

    var upteeth = new Array(0,0,0,0,0,
          0,0,0,0,0,
          0,0,0,0,0,
          0,0,0,0,0);
var current='-1';
var currentid=0;
function getteeth(id){
  currentid=id;
  var tee=document.getElementById(id).value
  current= --tee;
  //alert(current);
  $('#setteethmodel').modal('show');
  


}


    function setteeth(ele){
    var digo=ele.innerHTML;
    var di=digo.split('.');
    
    upteeth[current]=di[0];
    alert(upteeth);
    if(di[0]=='0'||di[0]==0){
        document.getElementById(currentid).className = "btn btn-default  col-sm-1";
        document.getElementById(currentid).innerHTML = currentid.substring(6);
        //document.getElementById(currentid).innerHTML = currentid.split('btn')[1] + di[0];
    }else{
        document.getElementById(currentid).className = "btn btn-danger  col-sm-1";
        document.getElementById(currentid).innerHTML = currentid.substring(6)+'('+di[0]+')';
    }
    document.getElementById('upteeth').value=upteeth;
    //  document.getElementById('teeth').value=teeth;
    //alert(document.getElementById('teeth').value);


}

function showteeth(id){
    var val=document.getElementById(id).value;
    //alert(val);
    if(val=='yes'){
        document.getElementById('divteeth').style.display='block';
    }
    else{
        document.getElementById('divteeth').style.display='none';
        
    }

}


</script>
<script type="text/javascript">
 
function submitformteeth(){

  $('#upteethform').submit(function(e){
    e.preventDefault();
    

    var me =$(this);
    $.ajax({
      url:me.attr('action'),
      type:'post',
      data:new FormData(this),
      dataType:'json',
      async: false,
      cache: false,
          contentType: false,
          processData: false,
      success: function(response){
        if(response.success==true){
          //$('#modelmsg').modal('show')  ; 
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('.text-danger').remove();
          me[0].reset();//loadAssignmenttable();
         // window.location.replace("<?php echo base_url('index.php/TraumaTreatment/trauma_profile/')?>"+1);

        }
        else{
          
          $.each(response.messages, function(key,value){
            var element = $ ('#'+ key);
            element.closest('div.form-group')
            .removeClass('has-error')
            .addClass(value.length >0 ? 'has-error':'has-success')
            .find('.text-danger').remove();
            element.after(value);
          });
        }


      }
    })

    }

  );
}
</script> 

 
<!-- Modal -->
<div id="updateteeth" class="modal fade "  role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Traumatized Teeth</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12" >
                   <form id ='upteethform' method=POST action="<?php echo base_url('index.php/TraumaTreatment/updateteeth')?>">        
                                Teeth<br>
                                <button  class="btn btn-default col-sm-1" id='upbtnt15' value='5' onclick='getteeth(this.id); return false;'>15</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt14' value='4' onclick='getteeth(this.id); return false;'>14</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt13' value='3' onclick='getteeth(this.id); return false;'>13</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt12' value='2' onclick='getteeth(this.id); return false;'>12</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt11' value='1' onclick='getteeth(this.id); return false;'>11</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt21' value='6' onclick='getteeth(this.id); return false;' >21</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt22' value='7' onclick='getteeth(this.id); return false;'>22</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt23' value='8' onclick='getteeth(this.id); return false;' >23</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt24' value='9' onclick='getteeth(this.id); return false;' >24</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt25' value='10' onclick='getteeth(this.id); return false;' >25</button>
                                <br><br>
                                <button  class="btn btn-default col-sm-1" id='upbtnt45' value='20' onclick='getteeth(this.id); return false;'>45</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt44' value='19' onclick='getteeth(this.id); return false;'>44</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt43' value='18' onclick='getteeth(this.id); return false;'>43</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt42' value='17' onclick='getteeth(this.id); return false;'>42</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt41' value='16' onclick='getteeth(this.id); return false;'>41</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt31' value='11' onclick='getteeth(this.id); return false;'>31</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt32' value='12' onclick='getteeth(this.id); return false;'>32</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt33' value='13' onclick='getteeth(this.id); return false;'>33</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt34' value='14' onclick='getteeth(this.id); return false;'>34</button>
                                <button  class="btn btn-default col-sm-1" id='upbtnt35' value='15' onclick='getteeth(this.id); return false;'>35</button>
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
                                <input type="hidden" name="upteeth"  id='upteeth' value='<?php echo set_value('teeth'); ?>' id='teeth'>
                                <input type="hidden" name="tpid"  id='tpid' value='<?php echo $patient[0]->id;?>' id='teeth'>
                          </div>  
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update </button>
                  <button type="reset" class="btn btn-primary"> Reset</button>

                </div>       
                            
                  </form>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<!-- Modal -->
<div id="setteethmodel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select </h4>
      </div>
      <div class="modal-body">
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>1.Infaction</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>2.Enamel</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>3.Enamel Dentin</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>4.Enamel Dentin Pulp</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>5.Enamel Dentin Pulp</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>6.Crown-root (uncomplicated)</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>7.Crown-root (complicated)</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>8.Root apical/mid coronal</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>9.Dento alveolar</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>10.Concussion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>11.Sub-luxation</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>12.Extrusion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>13.Lateral Luxation</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>14.Intrusion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>15.Avulsion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>16.Other</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>0.none</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
