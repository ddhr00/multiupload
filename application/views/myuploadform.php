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
        <li>
             Image (1)<input type="file" name="file[]" id="name1" multiple />
        </li>
        
         <li>
             Image (2)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (3)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (4)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (5)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (6)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (7)<input type="file" name="file[]" id="name1" multiple />
        </li>
           <li>
             Image (8)<input type="file" name="file[]" id="name1" multiple />
        </li>
       

    </div>
    
<!--    <div>
        <input type="button" id="btnAdd" value="add another picture" />
        <input type="button" id="btnDel" value="remove picture" />
    </div>-->



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
 
