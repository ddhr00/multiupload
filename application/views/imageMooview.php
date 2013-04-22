
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->load->view('header');


if ($results->num_rows() > 0) {
    ?>
    
    <table class="bordered">
        
        <thead>
            
            <tr>
                
                <th>S/N</th><th>picture one</th><th>picture two</th><th>picture three</th><th>option(s)</th>
                
            </tr>
            
        </thead>
        <tbody>



        <?php
        $out = '';
        $no = 0;

        foreach ($results->result_array() as $value) {
            $no++;
            $del_button = anchor($uri = 'mooimage/removepix/' . $value['id'], img(array('src' => './images/cancel_1.png', 'title' => '', 'class' => 'del')), $attributes = array('id' => '', 'class' => 'del'));
            $out.='<tr><td>' . $no . '</td><td>' . img(array('src' => './uploads/thumbs/mid-size/' . $value['Url'], 'width' => '', 'height' => '', 'class' => 'image-frame', 'alt' => '')) . '</td><td>' . img(array('src' => './uploads/thumbs/small/' . $value['Url'], 'width' => '', 'height' => '', 'class' => 'image-frame', 'alt' => '')) . '</td><td>' . img(array('src' => './uploads/' . $value['Url'], 'width' => '250', 'height' => '180', 'class' => 'image-frame', 'alt' => '')) . '</td><td>' . $del_button . '</td></tr>';
        } echo $out;
        ?> 
        </tbody>

    </table>

    <?php
} else {
    
}
?>
<?php
$this->load->view('header');