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
            <th>Medicine's Proposed Usage</th>
            <!--<th>Total</th>-->
            <!--<th>Status</th>-->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medicineFor as $forUse) { ?>
            <tr>
                <th><?php echo $forUse->med_id; ?></th>
                <td><?php echo $forUse->med_for; ?></td>
                <!--<td>$ 150.00</td>-->
                <!--<td><span class="label label-info">Being prepared</span>-->
                <!--</td>-->
                <td><button class="btn btn-primary btn-sm" title="Edit" onclick="edit_medicine_for(<?php echo $forUse->med_id; ?>)"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>
                    <button class="btn btn-sm btn-danger" title="Delete" onclick="delete_medicine_for(<?php echo $forUse->med_id; ?>)"><i class="glyphicon glyphicon-trash"></i>  Delete</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
