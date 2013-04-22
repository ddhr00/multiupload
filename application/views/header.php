<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>multiple upload</title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/default.css" />
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet"/>
<!--        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
         <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAdd').click(function() {
                var num     = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                var newNum  = new Number(num + 1);      // the numeric ID of the new input field being added
 
                // create the new element via clone(), and manipulate it's ID using newNum value
                var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
               // var newElem = $('#input' + num).clone().attr('id', 'input[]');
 
                // manipulate the name/id values of the input inside the new element
                newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'file[]');
 
                // insert the new element after the last "duplicatable" input field
                $('#input' + num).after(newElem);
 
                // enable the "remove" button
                $('#btnDel').attr('disabled','');
 
                // business rule: you can only add 5 names
                if (newNum == 8)
                    $('#btnAdd').attr('disabled','disabled');
            });
 
            $('#btnDel').click(function() {
                var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                $('#input' + num).remove();     // remove the last element
 
                // enable the "add" button
                $('#btnAdd').attr('disabled','');
 
                // if only one element remains, disable the "remove" button
                if (num-1 == 1)
                    $('#btnDel').attr('disabled','disabled');
            });
 
            $('#btnDel').attr('disabled','disabled');
        });
    </script>
        


    </head>
    <body>
        
        <?php
        
        echo anchor($uri="mooimage/index/","upload").nbs(5). anchor($uri="mooimage/pixtable/","list of images");
        ?>
