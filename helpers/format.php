<?php

class Format 
{
    public function formatDate($date){
        return date('F j,Y,g:i a',strtotime($date));
    }

    public function readmoreData($text, $limit = 200){
        $text = $text . "";
        $text = substr($text, 0 , $limit);
        $text = $text. ".....";
        return $text;
    }
}
