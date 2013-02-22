<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Imagesmodel extends CI_Model {
    /*     * *
     * 
     * 
     * @method:function to send url to db
     * @param :url
     * @return boolean
     * 
     * 
     */

    public function insertImages($url) {


        $sql = "insert into images (Url) values('$url')";
        $results = $this->db->query($sql);


        if ($results) {

            $this->imagesFetcher();
        } else {

            return false;
        }
    }

    /**
     * 
     * @method:function to fetch the images details
     * @param none
     * @return results * 
     */
    public function imagesFetcher() {

        $sql = "select* from images order by id desc";
        $results = $this->db->query($sql);
        return $results;
    }

    /**
     * 
     * @method :remove the images record on the database
     * @param :id
     * @return boolean
     *  
     */
    public function removePixFromDb() {

        $id = $this->session->userdata('id');
        $sql = "delete from images where images.id='$id'";
        $results = $this->db->query($sql);

        if ($results) {


            $thumbsImagearray = array('small', 'mid-size', 'large');
           // chmod(opendir(base_url().'uploads/'), $mode='0777');
            
              $Url=$this->getPixUrl($id)   ;
              echo $Url;
           
           // unlink('/uploads/' . $this->getPixUrl($id));

            if ($Url) 
                
                unlink('uploads/'.$Url);
                {

                for ($x = 0; $x < 3; $x++) {

                    unlink('uploads/thumbs/'.$thumbsImagearray[$x].'/'.$Url);
                }
            }
        }

        return $results;
    }

    /**
     * 
     * @method :Select Url for the specified pix
     * @param id
     * @return Url
     */
    public function getPixUrl($id) {

        $sql = "select Url from images where images.id='$id'";
        $results = $this->db->query($sql);
        return $results;
    }

}

?>
