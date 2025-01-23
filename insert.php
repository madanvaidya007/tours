<?php
    include 'connection.php';
    // Retrieve data from the form and sanitize it
    $_name = mysqli_real_escape_string($con, $_POST['name']);
    $_address = mysqli_real_escape_string($con, $_POST['address']);
    $_email = mysqli_real_escape_string($con, $_POST['email']);
    $_phone = mysqli_real_escape_string($con, $_POST['phone']);
    $_phone2 = mysqli_real_escape_string($con, $_POST['phone2']);
    $_arrival = mysqli_real_escape_string($con, $_POST['arrival']);
    $_departure = mysqli_real_escape_string($con, $_POST['depature']);
    $_options = mysqli_real_escape_string($con, $_POST['options']);

    // SQL query to insert data into the database
    $query = "INSERT INTO `clients` (`Name`, `Address`, `Email`, `Phone`, `Phone2`, `Arrival`, `depature`, `Package-Name`)
              VALUES ('$_name', '$_address', '$_email', '$_phone', '$_phone2', '$_arrival', '$_departure', '$_options')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo '<div class="container" style="width: 70vw;
        height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 30px auto;
        flex-direction: column;
        background-position: center;
        color: white;
        background-color: #ffa600d6;
        border-radius: 13px;
        padding: 20px;">
            <h4 style="color: green;">Data has been captured successfully!</h4>
            <p>Our team will contact you promptly. Thank you for choosing our services</p>
             
        </div>
        
        ';
       
        // header("refresh:3;url=index.html");
        
       
        // Redirect to another page after displaying the message
        echo '<script type="text/javascript">
        setTimeout(function(){
            alert("yes captured successfully,go-back to Home");
            window.location.href = "./index.html";
        }, 30); // 3000 milliseconds (3 seconds)
      </script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);

?>
