<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<?php require "../components/RequireLogin.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->

<div class="flex-col flex bg-cover h-[563px] desktop:h-[779px] justify-center align-middle items-center" style="background-image: url(../images/banner.jpg) ;">
<?php       $host = "localhost";  
            $dbname = "customer_db";
            $username = "root";   
            $password = "";  
            $conn = new mysqli($host, $username, $password, $dbname);
            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
            $sql = "SELECT * FROM products ORDER BY ProductName ASC";
            $result = $conn->query($sql);
            $ProductNames = [];
            $ProductPrices = [];
            $ProductTypes = [];
            $ProductImages = [];

            while($row = mysqli_fetch_array($result)){
                 $ProductNames[] = $row["ProductName"];
                 $ProductTypes[] = $row["ProductType"];
                 $ProductPrices[] = $row["ProductPrice"];
                 $ProductImages[] = $row["ProductDir"];
            }
            $Types = ["Drink","Food"];
?>
    <div class="overflow-auto [&::-webkit-scrollbar]:hidden flex flex-wrap w-[1400px] h-[520px] desktop:h-[720px] rounded-[30px] justify-center text-white">
        <?php foreach($Types as $Typing): ?>
            <div class="flex-none self-center text-[65px] font-bold w-[1300px] text-center top-1 drop-shadow-xl"><?=$Typing . "s"?></div>
            <?php for($i = 1; $i <= count($ProductNames); $i++):?>
                <?php if ($ProductTypes[($i-1)] == $Typing  ):?>
                <div class="w-[300px] h-[330px] bg-brown m-4 rounded-3xl drop-shadow-2xl">
                    <img class = "mt-5 mx-[50px] rounded-full h-[200px] w-[200px]" src = <?= $ProductImages[($i-1)] ?> >
                    <div class="w-full text-xl text-center text-white" ><?= $ProductNames[($i-1)] ?></div>
                    <div class="text-white text-center"><?= "£" . $ProductPrices[($i-1)]?></div>

                    <form action="/views/DatabaseAccess/Ordering.php" method="POST">
                        <button name="Name" value="<?= $ProductNames[($i-1)] ?>" class="text-black font-bold bg-cream rounded-3xl px-3 py-1 mt-1 ml-[80.695px]" type="submit">Add To Basket</button>
                    </form>

                </div>
                <?php endif;?>
            <?php endfor?>
        <?php endforeach?>
    </div>
</div>
<!-- Used to create a div that holds a image with the websites name over it, in which the image is darkened in that spot-->

<?php require "../components/BottomBar.php" ?>