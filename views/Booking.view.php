<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<?php require "../components/RequireLogin.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->

<div class="flex-row flex flex-wrap bg-cover h-[563px] desktop:h-[779px] justify-center" style="background-image: url(../images/banner.jpg) ;">
    <div class="bg-brown h-[500px] desktop:h-[700px] w-[750px] desktop:w-[950px] mt-[30px] rounded-3xl">
        <div class="flex justify-evenly h-[70px] rounded-t-3xl pt-[20px]">
            <a href="#" class="hover:scale-105 hover:bg-blue-300 text-center text-[30px] rounded-3xl bg-cream h-[45px] w-[350px]">Table Booking</a>
            <a href="Lessons.view.php" class="hover:scale-105 hover:bg-blue-300 text-center text-[30px] rounded-3xl bg-cream h-[45px] w-[350px]">Lesson Booking</a>
        </div>
        <div class="w-full h-[60px] text-center text-white text-[40px]">Table Booking</div>
        <form action="/views/DatabaseAccess/Booking.php" method="POST">
            <div class="flex flex-row">
                <div class="h-[300px] w-full text-white px-[20px] text-[20px]">
                    <label for="Date">Date:</label><br>
                    <input placeholder="  Enter Date As dd/mm/yyyy" class="rounded-lg mb-5 text-black text-base w-full" type="text" id="Date" name="Date" onchange="AmPm()" required><br>
                    <!-- Used to create text input for the date -->
                    <label for="Location">Location:</label><br>
                    <input class=" w-full h-[24px] rounded-lg text-black text-base mb-5" placeholder=" Select a Location" list="Location" name="Location" onkeydown="event.preventDefault(); return false;">
                    <datalist id="Location">
                        <option value="Harrogate">
                        <option value="Knaresborough Castle">
                        <option value="Leeds">
                    </datalist> <br>
                    <!-- above and below are used to create dropdowns to give users pre-made choices -->
                    <label for="Time">Time:</label><br>
                    <input class=" w-full h-[24px] rounded-lg text-black text-base" placeholder=" Select a Time" list="Time" name="Time" onkeydown="event.preventDefault(); return false;">
                    <datalist id="Time">
                        <option value="7:00">
                        <option value="8:00">
                        <option value="9:00">
                        <option value="10:00">
                        <option value="11:00">
                        <option value="12:00">
                        <option value="13:00">
                        <option value="14:00">
                        <option value="15:00">
                    </datalist><br>
                </div>
            </div>
            <div class="h-[50px] flex justify-center">
                <button class="hover:bg-blue-300 bg-white text-black rounded-lg h-[50px] w-[150px] text-2xl" type="submit">Submit</button>
            </div>
            <!-- Used to create the submit button that allows a user to submit the data and allows for interactivity -->
        </form>
    </div>
</div>
<!-- Used to create a div that holds a image with the websites name over it, in which the image is darkened in that spot-->

<?php require "../components/ErrorCheck.php" ?>

<?php require "../components/BottomBar.php" ?>

