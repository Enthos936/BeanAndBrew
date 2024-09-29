<?php $Error_Count = 0 ?>
<?php foreach(($_SESSION["Error_Array"] ?? []) as $error ): ?>
    <?php $Error_Count = 1 ?>
<?php endforeach;?>
<!-- These previous lines of code are used to gather the ammount of errors returned by the page-->
<?php if($Error_Count === 1): ?>
    <div class=" absolute top-1 flex flex-row w-full  justify-center mt-[80px]">
        <div class="w-[400px] h-[50px] bg-white bg-opacity-80 drop-shadow-2xl rounded-2xl text-center ">
            <?php foreach(($_SESSION["Error_Array"] ?? []) as $error ): ?>
                <?= $error . "</br>" ?>
            <?php endforeach;?>
            <!-- This piece of code is used to loop through each error in the error array and output it into a box at the top of the screen -->
        </div>
    </div>
<?php endif; ?>
<!-- ends the loop and if statement -->
<?php $_SESSION["Error_Array"] =[] ?>
<!-- empities the error array for usage elsewhere -->

