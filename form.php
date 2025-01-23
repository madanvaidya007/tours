<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquire Now</title><!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
</head>



<body>
    <?php
      include 'header.php'
    ?>

    <div class="container-fluid container">
        <div class="row ">


            <div class="col-md-6 i-btn">
                <i class="fa-sharp fa-2x fa-solid fa-headset " style="color: red;"></i>
                <p id="Enquire" style="font-family: sans-serif;">Enquire Now</p>
                <!-- Your text content goes here -->
                <p style="text-align:justify; line-height: 30px;">At TravelKaro, we invite you on a journey of discovery, a celebration of colors, cultures, and captivating landscapes. India, a land of diverse traditions, historical wonders, and breathtaking natural beauty, beckons you to explore its every nook and cranny. Our platform is dedicated to promoting Indian tourism, providing a seamless experience for travelers seeking the magic that India has to offer.

                For nature enthusiasts, India offers a captivating panorama of landscapes - from the snow-capped peaks of the Himalayas to the sun-kissed beaches of the Andaman Islands. Explore lush jungles, serene lakes, and experience the thrill of wildlife safaris in the country's many national parks and reserves.

                <p style="line-height: 30px;text-align:justify;"><span>Chinar Holidays Tour & Travels</span> is a member
                    of prestigious trade bodies like Kashmir tour and travel association
                    and Just Dial and approved by Department of Tourism, Government of Jammu and Kashmir.</p>
                </p>
                <hr>
            </div>


            <!-- Right Div -->

            <div class="col-md-6 right" style="margin-top: 0;">
                <p style="color: red; font-weight: bolder;"><i class="fa-solid fa-2x fa-bookmark"
                        style="padding: 10px; "></i>Book Here</p>



                <!-- Your form goes here -->
                <form action="./insert.php" method="POST" class="row g-3" id="form" onsubmit="return validateForm()">
                    <div class="col-md-6">
                        <label for="Full-Name" class="form-label">Full Name <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <span id="nameError" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="InputAddress" class="form-label">Address <span>*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="InputEmail" class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Abc@gmail.com"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone Number <span>*</span></label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="9108000091"
                            required pattern="[0-9]{9,}" inputmode="numeric">
                        <span id="phoneError" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputphone2" class="form-label">Phone Number 2<span>*</span> </label>
                        <input type="number" class="form-control" id="phone2" name="phone2" placeholder="123-456-7890" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputarrival" class="form-label">Arrival Date <span>*</span></label>
                        <input type="date" class="form-control" id="Arrival" name="arrival" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputdepature" class="form-label">Departure Date <span>*</span></label>
                        <input type="date" class="form-control" id="Depature" name="depature" required>
                        <span id="depatureError" class="error"></span>
                    </div>

                    <div class="col-md-12">
                        <label for="inputpackage" class="form-label">Select Package <span>*</span> </label>
                        <select id="package" name="options" class="form-select" required>
                            <option selected>JAIPUR (SHORT BREAK TO JAIPUR)</option>
                            <option> KERALA (HOUSEBOATS, PRISTINE BEACHES)</option>
                            <option> KARNATAKA (RUINS OF HAMPI, WESTERN GHATS)</option>
                            <option> MANALI (SCENIC LANDSCAPES, ADVENTURES)</option>
                            <option> GOA (GOLDEN SHORES, LIVELY NIGHT LIFE)</option>
                            <option> GULMARG, SRINAGAR (EXPLORE KASHMIR)</option>

                        </select>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                Check me out <span>*</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <footer>
        <?php
            include "footer.php"
            ?>
        <!-- Add your footer content, such as links to privacy policy, terms of service, etc. -->
    </footer>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://kit.fontawesome.com/0d4a744efd.js" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        function validateForm() {
            // Reset error messages
            document.getElementById('phoneError').innerHTML = "";

            var isValid = true;

            // Validate Phone Number
            var phoneValue = document.getElementById('phone').value;
            if (!/^\d{9,}$/.test(phoneValue)) {
                document.getElementById('phoneError').innerHTML = "Invalid phone number. It should be an integer with more than 8 digits.";
                isValid = false;
            }
            document.getElementById('nameError').innerHTML = "";



            // Validate Full Name
            var nameValue = document.getElementById('name').value;
            if (nameValue.length < 5) {
                document.getElementById('nameError').innerHTML = "Full name must contain at least 5 characters.";
                isValid = false;
            }




            document.getElementById('depatureError').innerHTML = "";



            // Validate Depature Date is after Arrival Date
            var arrivalDate = new Date(document.getElementById('Arrival').value);
            var depatureDate = new Date(document.getElementById('Depature').value);

            if (depatureDate <= arrivalDate) {
                document.getElementById('depatureError').innerHTML = "Depature date must be after arrival date.";
                isValid = false;
            }

            // ... other validations ...

            return isValid;
        }
    </script>






</body>


</html>