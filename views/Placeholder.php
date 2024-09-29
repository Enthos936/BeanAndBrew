<?php

function GatherCount($AMPM,$text,$text2,$con){
    $sql2 = "SELECT NoOfPeople FROM bookings WHERE Date = :date AND bookingType = 'Lesson' AND Location = '$text2' AND Time = '$AMPM'";
    $stm2 = $con->prepare($sql2);
    $stm2->execute([":date" => $text]);
    $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
    $TotalAm = 0;
    foreach($result2 as $key2 => $item2){
        $TotalAm += $result2[$key2]["NoOfPeople"];
    }
    return $TotalAm;
}

if(isset($_POST)){
    $text = $_POST["text"] ?? "";
    $text2 = $_POST["text2"] ?? "";
    $text = "10/10/2024";
    $text2 = "Harrogate";
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

            $TotalAm = GatherCount("AM",$text,$text2,$con);
            $TotalPm = GatherCount("PM",$text,$text2,$con);
            

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);  
            $Count = 0;
            $PmCount = 0;
            $AmCount = 0;

            foreach ($result as $key => $item) {
                if (isset($item['Time'])) {
                    if ($item['Time'] == 'AM') {
                        $AmCount = 1;
                        $DataProcess = True;
                        if($TotalAm < 6){
                            $result[$key]['Time'] = 'AM';
                        } 
                        if($TotalAm == 6){
                            $Count += 1;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "AM"){
                                    unset($result[$key]);
                                }             
                            }
                        }
                        if($TotalAm > 1 and $TotalAm < 6){
                            $DeleteCount = 0;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "AM"){
                                    if($TotalAm > 1){
                                        if($DeleteCount == 0){
                                            $DeleteCount += 1;
                                        } else {
                                            unset($result[$key]);
                                        }
                                    } 
                                }             
                            }
                        }
                    } elseif ($item['Time'] == 'PM') {
                        $PmCount = 1;
                        $DataProcess = True;
                        if($TotalPm < 6){
                            $result[$key]['Time'] = 'PM';
                        } 
                        if($TotalPm == 6){
                            $Count += 1;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "PM"){
                                    unset($result[$key]);
                                }             
                            }
                        }
                        if($TotalPm > 1 and $TotalPm < 6){
                            $DeleteCount = 0;
                            foreach($result as $key=>$item){
                                if($item["Time"] == "PM"){
                                    if($TotalPm > 1){
                                        if($DeleteCount == 0){
                                            $DeleteCount += 1;
                                        } else {
                                            unset($result[$key]);
                                        }
                                    } 
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
            if ($AmCount == 0){
                $result[]['Time'] = 'AM';
            }
            if ($PmCount == 0){
                $result[]['Time'] = 'PM';
            }
            if($Count > 1){
                echo json_encode("");
            } else{
                echo json_encode(value: $result);
            }
            
        }
    }
};