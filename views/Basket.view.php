<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<?php require "../components/RequireLogin.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->
<?php
                    $host = "localhost";  
                    $dbname = "customer_db";
                    $username = "root";   
                    $password = "";  
                    $conn = new mysqli($host, $username, $password, $dbname);
                    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
                    $UserId = $_SESSION["UserID"];
                    $sql = "SELECT * FROM orders WHERE id='$UserId' AND Payed='False'";
                    $result = $conn->query($sql);
                    $ProductNames = [];
                    $ProductUrls = [];
                    $ProductPrices = [];
                    $OrderIds = [];
                    $HamperCount = 0;
                    $Total = 0;
                    while($row = mysqli_fetch_array($result)){
                        $OrderIds[] = $row["OrderID"];
                        $ProductID = $row["ProductID"];
                        $sql2 = "SELECT * FROM products WHERE ProductID='$ProductID'";
                        $result2 = $conn->query($sql2);
                        while($row2 = mysqli_fetch_array($result2)){
                            $ProductNames[] = $row2["ProductName"];
                            $ProductUrls[] = $row2["ProductDir"];
                            $ProductPrices[] = $row2["ProductPrice"];
                            $Total += $row2["ProductPrice"];
                            if ($row2["ProductType"] === "Food" ){
                                $HamperCount += 1;
                            }
                        }    
                    }
                    $_SESSION["HamperCount"] = $HamperCount;
                ?>

<div class="flex-row flex flex-wrap bg-cover h-[563px] desktop:h-[779px] justify-center" style="background-image: url(../images/banner.jpg) ;">
    <div class="bg-brown h-[500px] desktop:h-[700px] w-[750px] desktop:w-[950px] mt-[30px] rounded-3xl">
        <h1 class=" text-center text-[65px] text-white sticky top-0">My Basket</h1>
        <div class="overflow-auto [&::-webkit-scrollbar]:hidden w-[750px] h-[250px] desktop:h-[450px] desktop:w-[930px]">
            <?php for($i = 1; $i <= count($ProductNames); $i++): ?>
                <div class="flex text-[20px]">
                    <div class="my-[10px] mx-[50px] w-[650px] desktop:w-[850px] flex justify-start">
                        <img class = "mt-5 mr-[10px] rounded-full h-[65px] desktop:h-[85px] w-[65px] desktop:w-[85px] " src = <?= $ProductUrls[($i-1)] ?> >
                        <div class="text-white self-center w-[400px] justify-self-start"><?= $ProductNames[($i-1)]?> </div>
                    </div>
                    <div class="my-[20px] mx-[50px] w-[650px] desktop:w-[850px] flex justify-end ">
                        <div class="text-white self-center "><?= "£" . $ProductPrices[($i-1)]?> </div>
                        <form action="/views/DatabaseAccess/ItemDelete.php" method="POST" class=" ml-[10px] h-[20px] w-[20px] self-center">
                            <button name="Name" value="<?= $OrderIds[($i-1)] ?>" type="submit"><img src="../images/bin.png"></button>
                        </form>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class=" mt-[20px]">
            <form class="flex flex-col text-white " action="/views/DatabaseAccess/BasketCheckout.php" method="POST">
                <div class="flex flex-row justify-evenly" >
                    <div class="flex">
                        <label for="date" class=" mr-[5px]">Date: </label><br>
                        <input placeholder="  Enter Date As dd/mm/yyyy" class=" rounded-lg text-black text-base mb-4 w-[260px]" type="text" id="date" name="date" required><br>
                    </div>
                    <div class="flex">
                        <label for="time" class=" mr-[5px]">Time: </label><br>
                        <input placeholder="  Enter Time As hh/mm" class=" rounded-lg text-black text-base mb-4 w-[260px]" type="text" id="time" name="time" required><br>
                    </div>
                </div>
                <div class="flex flex-row justify-center">
                    <?php if ($HamperCount >= 3): ?>
                        <label for="IsHamper" class=" mr-[5px]">Put food items into a hamper?  </label>
                        <input type="checkbox" id="IsHamper" name="IsHamper" value="IsHamper" >
                    <?php endif ?>
                </div>
                <div class="flex flex-row justify-center">
                    <?php if(!$ProductNames == false): ?>
                        <button class=" text-black rounded-lg h-[40px] w-[300px] text-[30px] bg-blue-300" type="submit">Submit Pre-Order</button>
                    <?php else:?>
                        <div class=" text-black text-center rounded-lg h-[40px] w-[300px] text-[30px] bg-blue-300" type="submit">No items in basket</div>
                    <?php endif;?>
                </div>
                <div class="flex flex-row justify-center text-[13px]">
                    <p>payments processed on collection, in person</p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Used to create a div that holds a image with the websites name over it, in which the image is darkened in that spot-->



<?php require "../components/BottomBar.php" ?>
<?php require "../components/ErrorCheck.php" ?>
