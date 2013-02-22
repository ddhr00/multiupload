<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->load->view('header');
?>
<div id="form-panel">
    
    <?php

$data = array('class' => 'myform');
echo form_open_multipart('mooimage/pix/', $data);
echo form_fieldset();
?>
<ul>

    <li>
<?php
echo form_label($label_text = 'select pictures');
?>

<!--        <input id="input"type="file" name="file[]" multiple>-->

    </li>
    <div id="input1" style="margin-bottom:4px;" class="clonedInput">
        Picture <input type="file" name="file[]" id="name1" multiple />
    </div>
    <div>
        <input type="button" id="btnAdd" value="add another picture" />
        <input type="button" id="btnDel" value="remove picture" />
    </div>



    <li>
<?php
$data = array('name' => 'submit', 'value' => 'upload');
echo form_submit($data);
?>

    </li>

</ul>  

<?php
echo form_fieldset_close();
echo form_close();
?>
    
    
</div>  
    
 <?php
 $this->load->view('footer');
 
