<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Mooimage extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('myuploadform');
    }

    /** @method: set upload controller function driver */
    public function set_upload_options() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png|jpeg';
        $config['is_image'] = '1';
        $config['overwrite'] = FALSE;
        $config['file_name'] = 'zoom' . '_' . rand($min = 1, $max = 9999);
        $config['max_size'] = '0';
        $config['max_height'] = '0';
        $config['max_width'] = '0';

        return $config;
    }

    /** @method:set the configurations for image resizing   */
    public function setResizeUploadsConfig($filename) {

        $config['image_libray'] = 'gd2';
        $config['source_image'] = './uploads/' . $filename;
        $config['new_image'] = './uploads/thumbs/' . $filename;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 75;
        $config['height'] = 50;

        $this->image_lib->initialize($config);
        return true;
    }

    /** @method:controller function for driving image configurations
     * @param none
     */
    public function pix() {

        if ($this->input->post('submit')) {

            /////////////////////multiple uploading algorithm//////////////////////////////
            // $this->load->library('upload');


            $files = $_FILES;

            $cpt = count($_FILES['file']['name']);

            $data;

            $this->benchmark->mark('code_start');

            for ($i = 0; $i < $cpt; $i++) {

                $_FILES['file']['name'] = $files['file']['name'][$i];
                $_FILES['file']['type'] = $files['file']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['file']['error'][$i];
                $_FILES['file']['size'] = $files['file']['size'][$i];

                $cfg = ($this->set_upload_options());
                $this->upload->initialize($cfg);

                if (!$this->upload->do_upload('file')) {

                    //displaying error message

                    echo $this->upload->display_errors();
                } else {

                    $data = $this->upload->data();
                    $filename = $data['orig_name'];

                    /** @method set url to db */
                    $this->imagesmodel->insertImages($filename);
                    
                    if($i<5){
                        
                        $this->resizeThumbs($filename);
                    }

                    
                }
            }

            $this->benchmark->mark('code_end');
            echo $this->benchmark->elapsed_time('code_start', 'code_end');
        } else {

            $this->load->view('myuploadform');
        }
    }

    /*     * * @method :controller for resizing images  */

    public function resizeThumbs($filename) {
        ///////////////// start upload one file after the other/////////////////////
        /*         * @begin resizing by image moo  */
        if ($filename) {

            $this->image_moo->load('uploads/' . $filename)->resize(180, 180)->save('uploads/thumbs/mid-size/' . $filename);
            $this->image_moo->load('uploads/' . $filename)->resize(120, 120)->save('uploads/thumbs/small/' . $filename);
           // $this->image_moo->load('uploads/' . $filename)->resize(240, 200)->save('uploads/thumbs/large/' . $filename);
        }
    }

    public function pixtable() {

        $data['results'] = $this->imagesmodel->imagesFetcher();
        $this->load->view('imageMooview', $data);
    }

    /* @method controller function to drive image remove
     * @param :none  
     */

    public function removepix() {

        $id = $this->uri->segment('3');
        $this->session->set_userdata('id', $id);
        $results = $this->imagesmodel->removePixFromDb();

        if ($results) {
            //////////////success message goes here

            $data['classchanger'] = 'success';
            $data['msg'] = 'succefully removed!';

            $this->load->view('dialogMsgDisplay', $data);
        } else {
            /////an err alert goes here

            $data['classchanger'] = 'err';
            $data['msg'] = 'failed to delete!';
            $this->load->view('dialogMsgDisplay', $data);
        }
    }

}

?>
