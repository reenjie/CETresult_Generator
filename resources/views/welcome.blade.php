<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>WMSU CET</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #a80404;
        }


        .active {
            background-color: #FFFFFF;
        }

        @media screen and (max-width: 500px) {
            .navbar a {
                float: none;
                display: block;
            }
        }

        .footer {
            background: #a80404;
        }

        /* Navbar container */
        .navbar {
            overflow: hidden;
            background-color: #FFFFFF;
        }

        /* Links inside the navbar */
        .navbar a {
            float: left;
            font-size: 16px;
            color: #a80404;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* The dropdown container */
        .dropdown {
            float: left;
            overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: #a80404;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            /* Important for vertical align on mobile phones */
            margin: 0;
            /* Important for vertical align on mobile phones */
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: #a80404;
            color: white;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #a80404;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>


    <center><img src="{{asset('images/bwlogo1.png')}}" alt="biglogo" width="1400" height="170"></center>

    <div class="navbar">
        <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
        <!--<a href=""><i class="fa fa-fw fa-user"></i> Create account</a>-->

        <!--<a href="pages/passed.php"><i class="fa fa-fw fa-user"></i> 2022 List of Passers</a>-->
        <div class="dropdown">
            <button class="dropbtn">List of Passers
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="pages/passed.php">School Year 2022-2023</a>
                <a href="#">School Year 2023-2024</a>
            </div>
        </div>
        <a href="/login"><i class="fa fa-fw fa-sign-in"></i> Login</a>
    </div>

    </div>


    <!--<center><img src="wmsupass.png" alt="wmsupass" width="1500" height="500"></center>-->
    <br>


    <center>
        <h1 style="color:#FFFFFF;font-size:120px; ">WMSU CET GUIDELINES</h1>
    </center>

    <div class="row">
        <div class="col-md-3 col-md-offset-3" style="background-color:#FFFFFF;">
            <h2 style="color:#a80404;;font-size:30px;text-align:center;padding-top: 20px; ">WHO MAY TAKE THE WMSU CET?</h2>
            <p style="color:#a80404;font-size:20px;padding-left: 20px;">1. Senior high students of Department of Education are accredited schools expecting to graduate at the end of school year.
                <br>2. Senior high school Graduates who are not yet enrolled in college.
                <br>3. Those who failed in the WMSU-CET prior to School Year are not yet enrolled in college.
                <br>4. Those who are enrolled in other HEIs but have the intention to transfer to WMSU
                <br>5. Those enrolled in WMSU but have the intention to shift to another program
            </p><br>
            <h2 style="color:#a80404;font-size:30px;text-align:center ">WHERE TO GET FORMS?</h2>
            <p style="color:#a80404;font-size:20px;padding-left: 20px;"> You may get the Application forms form
                <br>A. Your school contact person.
                <br>B. The contact person at your respective Test center.
                <br>C. Testing and Evaluation Center (WMSU MAIN CAMPUS)
            </p><br>
            <h2 style="color:#a80404;font-size:30px;text-align:center ">WHERE TO SUBMIT?</h2>
            <p style="color:#a80404;font-size:20px;padding-left: 20px;"> Submit your fully accomplished WMSU-CET application
                from the complete requirments to: <br>
                <br> SENIOR HIGH SCHOOL GRADUATING STUDENTS - School Contact Person <br>
                SENIOR HIGH SCHOOL GRADUATES - WMSU Testing and Evaluation Center
            </p>


            <div class="col-md-3" style="background-color:#FFFFFF;">
                <h2 style="color:#a80404;font-size:35px;text-align:center; ">REQUIREMENTS</h2>
                <p style="color:#a80404;font-size:20px;padding-left: 20px;padding-bottom: 20px;">1. A.For a Senior High School graduating students -
                    <br>Certification from the School Principal/Registrar that certifies
                    that the applicant is currently enrolled as grade 12 student and a
                    candidate for graduation <br><br>
                    B. For Senior High School Graduates -
                    Original and photocopy of senior high school report card
                    <br><br>
                    C. For Transferees/Shifties -
                    Endorsement from the WMSU dean of admission and a
                    photocopy of the Transcript of records. <br>
                    <br>2. Correctly accomplished WMSU-CET Application Form.
                    <br><br>
                    3. Two identical copies of 2" x 2" photo recently with NAME TAG. (selfie is not accepted)
            </div>
        </div>



        <div class="footer">
            <table style="solid black;margin-left:auto;margin-right:auto;">
                <tr>
                    <th style=" padding-right: 100px; padding-top: 10px;"> WMSUCET</th>
                    <th style=" padding-right: 100px; padding-top: 15px;">WESTERN MINDANAO STATE UNIVERSITY</th>
                    <th style=" padding-left: 50px; padding-top: 15px;">SOCIAL LINKS</th>
                    <th style=" padding-left: 150px; padding-top: 15px;"> FOR INQUIRIES CONTACT US:</th>

                </tr>
                <tr>
                    <td style=" padding-right: 100px;"><img style=" padding-bottom: 5px; padding-top: 5px;" src="{{asset('images/logo.png')}}" alt="logo" width="110" height="100"></td>
                    <td style=" padding-right: 100px;">Normal Road, Baliwasan 7000 <BR> Zamboanga City Philippines</td>
                    <td style=" padding-left: 50px;"><a href="https://www.facebook.com/wmsu.edu.ph"><img alt="Facebooklink" src="{{asset('images/fbicon.png')}}" width="40" height="30"><a href="http://wmsu.edu.ph/"><img alt="Websitelink" src="{{asset('images/logo.png')}}" width="40" height="30"></td>
                    <td style=" padding-left: 150px;">09367081103<BR>09367081092 <br>
                        <hr>tec@wmsu.edu.ph
                    </td>
                </tr>
            </table>
        </div>

</body>

</html>