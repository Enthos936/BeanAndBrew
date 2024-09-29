<?php

if(isset($_POST)){
    $text = $_POST["text"] ?? "";
    $text2 = $_POST["text2"] ?? "";
    //gather text from input
    if($text != ""){
        if($text2 != ""){
            $string = "mysql:host=localhost;dbname=customer_db";

            try{
                $con = new PDO($string,"root","");
                //connect to database

            }catch(PDOException $e){
                die($e->getMessage());

            }

            //read from database
            $sql = "SELECT Time FROM bookings WHERE Date = :date AND bookingType = 'Lesson' AND Location = '$text2'";
            $stm = $con->prepare($sql);
            $stm->execute([':date' => $text]);

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);  
            $Count = 0;
            $AmCount = 0;
            $PmCount = 0;

            foreach ($result as $key => $item) {
                if (isset($item['Time'])) {
                    if ($item['Time'] == 'AM') {
                        $DataProcess = True;
                        $AmCount += 1;
                        if($AmCount < 3){
                            $result[$key]['Time'] = 'AM';
                        } 
                        if($PmCount == 3){
                            $Count += 1;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "AM"){
                                    unset($result[$key]);
                                }             
                            }
                        }
                        if($AmCount == 2){
                            $DeleteCount = 0;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "AM"){
                                    if($DeleteCount == 1){
                                        unset($result[$key]);
                                    } 
                                    $DeleteCount += 1;
                                }             
                            }
                        }
                    } elseif ($item['Time'] == 'PM') {
                        $DataProcess = True;
                        $PmCount += 1;
                        if($PmCount < 3){
                            $result[$key]['Time'] = 'PM';
                        } 
                        if($PmCount == 3){
                            $Count += 1;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "PM"){
                                    unset($result[$key]);
                                }             
                            }
                        }
                        if($PmCount == 2){
                            $DeleteCount = 0;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "PM"){
                                    if($DeleteCount == 1){
                                        unset($result[$key]);
                                    } 
                                    $DeleteCount += 1;
                                }             
                            }
                        }
                    }
                }
            }



            if($result == []){
                $result = array(["Time"=>"AM"],["Time"=>"PM"]);
                $DataProcess = True;
            }
            if($Count > 1){
                echo json_encode("");
            } else{
                echo json_encode(value: $result);
            }
        }
    }
};