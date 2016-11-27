<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type of The Medicine</th>
            <!--<th>Total</th>-->
            <!--<th>Total</th>-->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medicineType as $type) { ?>
            <tr>
                <th><?php echo $type->med_id; ?></th>
                <td><?php echo $type->med_type; ?></td>
                <!--<td></td>-->
                <!--<td><span class="label label-info">Being prepared</span>-->
                <!--</td>-->
                <td><button class="btn btn-primary btn-sm" title="Edit" onclick="edit_medicine_type(<?php echo $type->med_id; ?>)"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>
                    <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_medicine_type(<?php echo $type->med_id; ?>)"><i class="glyphicon glyphicon-trash"></i>  Delete</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
