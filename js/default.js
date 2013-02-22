/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    $(".del").click(function(){
        
        var answ=confirm("Are you sure you want to remove this image "+jQuery(this).attr('title'));
       
        return answ;
    });

});


// jjquery for the table

$('.bordered tr').mouseover(function(){
    $(this).addClass('highlight');
}).mouseout(function(){
    $(this).removeClass('highlight');
});


