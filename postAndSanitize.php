<?php
    //Get the data.
    $errorArray = [];
    function postAndSanitize($formData){
        global $errorArray;
        $newData = $_POST[$formData];
        if(strlen($newData) == 0){
            array_push($errorArray,($formData . "_empty"));
        }else{
            $sanData = filter_var($newData,FILTER_SANITIZE_STRING);
            if(!$sanData){
            array_push($errorArray,($formData . "_invalid"));
            }else{
                return($sanData);
            }
        }
    };
    function errorMessage($errorArray, $page){
        $location = "$page.php?status=false";
        if(count($errorArray) > 0){
            foreach($errorArray as $index=>$value){
                $location .= "&$value=0";
            }
            header("Location: $location");
        }
    }
?>