<?php

class  Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $name = DB_NAME;
    public $link;
    public $error;


public function __construct()
{
    $this->connectDB();
}

    private function connectDB(){
       $this->link = new mysqli($this->host,$this->user,$this->pass,$this->name);
        if(!$this->link){
            $this->error = "Connection Error".$this->link->connect_error.__LINE__;
            return false;
        }
    }



    public function selectDT($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function Insert($query){
        $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($insert_row){
            return $insert_row;
        }else{
           return false;
        }
    }


    public function update($query){
        $update = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($update){
            return $update;
        }else{
           return false;
        }

    }

    public function delete($query){
        $delete = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete){
            return $delete;
        }else{
           return false;
        }

    }


    public function view($query){
        $view = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($view){
            return $view;
        }else{
           return false;
        }

    }

}

