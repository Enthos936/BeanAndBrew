<?php require "../components/Head.php" ?>
<?php require "../components/NavBar.php" ?>
<?php require "../components/RequireLogin.php" ?>
<!--Imports neccessary code from exterior files such as the header information and navbar -->

<div class="flex-row flex flex-wrap bg-cover h-[563px] desktop:h-[779px] justify-center" style="background-image: url(../images/banner.jpg) ;">
    <div class="bg-brown h-[500px] desktop:h-[700px] w-[750px] desktop:w-[950px] mt-[30px] rounded-3xl">
        <div class="flex justify-evenly h-[70px] rounded-t-3xl pt-[20px]">
            <a href="Booking.view.php" class="hover:scale-105 hover:bg-blue-300 text-center text-[30px] rounded-3xl bg-cream h-[45px] w-[350px]">Table Booking</a>
            <a href="#" class="hover:scale-105 hover:bg-blue-300 text-center text-[30px] rounded-3xl bg-cream h-[45px] w-[350px]">Lesson Booking</a>
        </div>
        <!-- Used to create the interactive buttons at the top to swithc between booking types -->
        <div class="w-full text-center text-white text-[40px]">Lesson Booking</div>

        <!-- starts form to gather data from user such as lesson date and time and location -->
        <form action="/views/DatabaseAccess/LessonBooking.php" method="POST">
            <div class="h-[300px] text-white px-[20px] text-[20px]">
                <label for="Date">Date:</label><br>
                <input placeholder="  Enter Date As dd/mm/yyyy" class="js-search rounded-lg text-black text-base w-[260px]" type="text" id="Date" name="Date" oninput="get_data()" required><br>
                <p class="text-[13px] mb-5">Lessons can not be booked on weekends</p>

                <!-- Used to create text input for the date -->
                <label for="Location">Location:</label><br>
                <input class="js-search2 w-[260px] h-[24px] rounded-lg text-black text-base mb-5" placeholder=" Select a Location" list="Location" name="Location" onkeydown="event.preventDefault(); return false;" oninput="get_data()">
                <datalist id="Location">
                    <option value="Harrogate">
                    <option value="Knaresborough Castle">
                    <option value="Leeds">
                </datalist> <br>


                <!-- above and below are used to create dropdowns to give users pre-made choices -->


                <label for="Time">Time:</label><br>
                <input class="w-[260px] h-[24px] rounded-lg text-black text-base" placeholder=" Select a Time" list="Time" name="Time" onkeydown="event.preventDefault(); return false;">
                <datalist id="Time" class="js-results  ">
                </datalist>
                <div class=".js-results">

                </div>
            </div>
            <div class="h-[50px] flex justify-center">
                <button class="hover:bg-blue-300 bg-white text-black rounded-lg h-[50px] w-[150px] text-2xl" type="submit">Submit</button>
            </div>
            <!-- Used to create the submit button that allows a user to submit the data and allows for interactivity -->
            <p class="text-[13px] text-center text-white">Payments Processed in person</p>
        </form>
    </div>
</div>
<!-- Used to create a div that holds a image with the websites name over it, in which the image is darkened in that spot-->

<?php require "../components/BottomBar.php" ?>

<?php require "../components/ErrorCheck.php" ?>

<script>
    function get_data()
    {   
        let text = document.querySelector(".js-search").value;
        let text2 = document.querySelector(".js-search2").value;
        const formData = new FormData();
        formData.append("text",text);
        formData.append("text2",text2);
        fetch("Placeholder.php",{
            "method": "POST",
            "body":formData
        }).then(function(response){
            return response.json();
        }).then(function(data){
            handle_result(data);
        });
    }
    function handle_result(result){
        let result_div=document.querySelector(".js-results")
        
        while(result_div.firstChild){
            result_div.removeChild(result_div.firstChild)
        };

        let obj = result;
        for(let i = obj.length - 1; i >= 0; i--){
            console.log(obj[i].Time)
            let option = document.createElement("option")
            option.textContent = obj[i].Time;
            option.value = obj[i].Time;

            result_div.appendChild(option);
        }

        
    }
</script>