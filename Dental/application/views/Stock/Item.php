<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Stock</title>
    <!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    
    <style type="text/css" class="init">
    
    </style>
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js">
    </script>
    <script type="text/javascript" language="javascript" src=".<?= base_url(); ?>media/js/dataTables.bootstrap.js">
    </script>
    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>resources/syntax/shCore.js">
    </script>

   

</head>         

<div class="container">
    <div class="col-md-12">
                    <div class="col-md-12">

                        <ul class="breadcrumb">
                            <li><a href="#">Stock</a>
                            </li>
                            <li>Equipment</li>
                        </ul>

                    </div>
                    
                <div class="col-md-12">
                    <div class="box">
                        <h1>Equipment</h1>


                        <hr>

                        <h3>Equipment details</h3>
                        <form id ='stock' method=POST action="<?php echo base_url('index.php/Stock/Equipment/update')?>">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="title">Category</label>
                                        <select class="form-control" name='category' id ='category'>
                                            <option value='' >Select</option>
                                            <?php foreach($cat as $key){
                                                echo '<option value="'.$key->id.'" >'.$key->category.'</option>';

                                                } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="firstname">Model</label>
                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo set_value('firstname'); ?>">
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="lastname">Item Name</label>
                                        <input type="text" class="form-control" id="name" name="name" >
                                        <input type="hidden" class="form-control" id="itemid" name="itemid" ">
                                    </div>
                                </div>
                                </div><div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="lastname">Quentity</label>
                                        <input type="text" class="form-control" id="quentity" readonly name="quentity" value="<?php echo set_value('lastname'); ?>">
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="address">Description</label>
                                        <textarea class="form-control" rows="5" id="description" name='description' required></textarea>
                                        
                                    </div>
                                </div>
                                </div> <div class="row">
                                <div class="col-sm-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Update </button>

                                </div>
                            
                        </form>
                        
                            <div class="col-sm-3 text-center">
                                    <button  class="btn btn-success btn-block"  data-toggle="modal" data-target="#qntmodel" onclick="qntshow('add'); return false;"><i class="fa fa-save"></i> Add Item </button>

                            </div>
                            <div class="col-sm-3 text-center">
                                    <button  class="btn btn-danger btn-block" data-toggle="modal" data-target="#qntmodel" onclick="qntshow('remove'); return false; "><i class="fa fa-save"></i> Remove Item </button>

                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                 <div class="box">
                                <section>
                                    <h4><span>Item Stock History</span></h4>
                                    
                                    <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Quentity</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                    </table>
                                 </section>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>              
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        submitform();
        getitemdetails();
        setInterval(loadtable(),3000);
    });

function submitform(){

    $('form').submit(function(e){
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
                    $('#modelmsg').modal('show')  ;  
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();//loadAssignmenttable();
                    getitemdetails();

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
<script type="text/javascript">
    function qntshow(str){
         document.getElementById('status').value=str; 
         document.getElementById('btnqut').innerHTML=str; 

    }
</script>
<script type="text/javascript">
    function getitemdetails(){
        var ele='<?= $itemid ; ?>';
        $.ajax({
        url: '<?php echo base_url("index.php/Stock/Equipment/getitemdetails");?>'+'/'+ele,
        type: 'POST',
        //data: myData,
        //dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success: function(result) {
            obj = JSON.parse(result);
            document.getElementById('category').value=obj.eq[0].category_id ;
            document.getElementById('name').value=obj.eq[0].name ;
            document.getElementById('description').innerHTML=obj.eq[0].description ;
            document.getElementById('model').value=obj.eq[0].model ;
            document.getElementById('quentity').value=obj.eq[0].qut ;
            document.getElementById('itemid').value=obj.eq[0].id ;
            document.getElementById('upid').value=obj.eq[0].id ;

        }
    });

    }

</script>
<script>
    function loadtable(){
        "use strict";
    $("#mytable").dataTable().fnDestroy()
    var table=$('#mytable').DataTable( {
        
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo base_url('index.php/Stock/LoadTable/getitemlog/'.$itemid); ?>",
            "type": "POST"
        },
        'responsive': true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
                buttons: [
            {
                extend: 'print',
                text: 'Print', 
                title:'Stock History '+document.getElementById('name').value,
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            'pageLength'
        ],lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ]
        
    } ); 
    
    }
    
</script>

<!-- Modal -->
<div id="modelmsg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stock </h4>
      </div>
      <div class="modal-body">
            Information updated Successfully...!

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="qntmodel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stock </h4>
      </div>
      <div class="modal-body">
            <form id ='stock' method=POST action="<?php echo base_url('index.php/Stock/Equipment/updatequentity')?>">
                <div >
                    <div class="form-group">
                        <label for="number">Quentity</label>
                        <input  type="number" min='0' class="form-control" id="upqnt" name='upqnt' required>
                        <input  type="hidden" class="form-control" id="status" name='status' required>
                        <input  type="hidden" class="form-control" id="upid" name='upid' required>
                                        
                    </div>
                </div>
                <div >
                    <div class="form-group">
                        <label for="address">Note</label>
                        <textarea class="form-control" rows="5" id="updescription" name='updescription' required></textarea>
                                        
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block" id='btnqut'><i class="fa fa-save"id='btnqut'></i> Update </button>


            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

