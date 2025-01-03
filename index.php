<?php
    include("header.php");
?>
<html>
<head>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
    <script src="script.js" defer></script>
    <title>Home</title>

</head>

<body>

    <section class="ContentBackImage" id="Home">
        <div class="BackgroundImage">
        
        </div>
        <div class="slogan">
            <h1>Decide. Commit. Succeed.</h1> <br>
            <h2>Make yourself <span>stronger</span> than your excuses.</h2>
    
            <button><a href="#AboutUs">Learn More</a></button>
        </div>
    </section>
    
    <section class="ContentBodyIndex">
        <section id="AboutUs"> <br><br>
            <div class="mt-5">
                <h1>What do we offer</h1>
                
                <div class="aboutlist d-lg-flex flex-wrap">
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>Inclusive Fitness for All Ages and Abilities</h5>
                                Our gym is dedicated to helping people of all ages and fitness levels achieve their health and wellness goals.
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>Flexible Membership Options</h5>
                                We offer a variety of membership options to fit every budget and schedule.
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>Top-of-the-Line Equipment and Certified Trainers</h5>
                                Our gym is equipped with state-of-the-art equipment and staffed by certified personal trainers.
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>A Holistic Approach to Wellness</h5>
                                We believe in a holistic approach to fitness that focuses on the whole person, including mental and emotional wellness.
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>A Supportive Community</h5>    
                                We provide a supportive and welcoming community that encourages and motivates our members.
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <img src="image/features-first-icon.png" alt="">
                            <div>
                                <h5>Health and Safety First</h5>
                                We prioritize the health and safety of our members by following strict cleaning protocols.
                            </div>
                        </div>
                </div>
            </div>

            <div class="Trainer">
                <?php
                    $dbHost     =  "Localhost";
                    $dbUsername =  "root";
                    $dbPassword =  "";
                    $dbName = "Gym";
                
                    // create connection
                    $conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
                

                    $sql_select = "Select * from PersonelTrainer where certification = 1 and Experience >= 3 limit 3";
                    $result = $conn -> query($sql_select);

                    echo '<h1>EXPERT <span>TRAINERS</span></h1>';
                    if ($result -> num_rows > 0){
                        echo '<article class="d-md-flex justify-content-evenly">';
                        while ($row = $result -> fetch_assoc()){
                            echo '<div class="Box">';
                            echo '<div class="Image">';
                            echo '<img src="PersonelTrainer - Image/Background1.jpg" alt="">';
                            echo '</div>';
    
                            echo '<div>';
                            echo '<div class="TrainingType">';
                            echo '<h4>'.$row["TrainingType"].'</h4>';
                            echo '</div>';
    
                            echo '<div>';
                            echo '<div class="Name">';
                            echo '<h4>'.$row["FirstName"] ." ". $row["LastName"] .'</h4>';
                            echo '</div>';
    
                            echo '<div>';
                            echo '<div class="Description">';
                               echo '<p>'.$row["Description"].'</p>';
                            echo '</div>';
    
                            echo '<div class="Trainer-SocialMedia">';
                                echo '<a href="https://www.instagram.com/'.$row['Instagram'].'" target=_blank><i class="fa-brands fa-instagram"></i></a>';
                                echo '<a href="https://www.linkedin.com/'.$row['LinkedIn'].'" target=_blank><i class="fa-brands fa-linkedin"></i></a>';
                                echo '<a href="https://www.facebook.com/'.$row['FaceBook'].'" target=_blank><i class="fa-brands fa-facebook"></i></a>';
                                echo '<a href="https://www.twitter.com/'.$row['Twitter'].'" target=_blank><i class="fa-brands fa-twitter"></i></a>';
                          echo '</div>';
                          echo '</div>';
                          echo '<br><br>';
                        }
                       
                        echo '</article>';
                        echo '</div>';
                    }
                

                ?>
                
                <!--<article class="d-md-flex justify-content-evenly">
                    <div class="Box">
                        <div class="Image mt-3">
                            <img src="Image/pexels-andrea-piacquadio-3763115.jpg" alt="">
                        </div>

                        <div>
                            <div class="TrainingType">
                                <h4>Calisthenics</h4>
                            </div>

                            <div class="Name">
                                <h2>Charbel Faddoul</h2>
                            </div>

                            <div class="Description">
                                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis aperiam quo natus culpa fugiat ducimus aut dolorem, distinctio perspiciatis! Vel dolorum sit id quibusdam omnis.</p>
                            </div>

                        </div>
                        <div class="Trainer-SocialMedia">
                            <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="Box">
                        <div class="Image mt-3">
                            <img src="Image/pexels-andrea-piacquadio-3763115.jpg" alt="">
                        </div>

                        <div>
                            <div class="TrainingType">
                                <h4>Calisthenics</h4>
                            </div>

                            <div class="Name">
                                <h2>Charbel Faddoul</h2>
                            </div>

                            <div class="Description">
                                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis aperiam quo natus culpa fugiat ducimus aut dolorem, distinctio perspiciatis! Vel dolorum sit id quibusdam omnis.</p>
                            </div>

                        </div>
                        <div class="Trainer-SocialMedia">
                            <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="Box">
                        <div class="Image mt-3">
                            <img src="Image/pexels-andrea-piacquadio-3763115.jpg" alt="">
                        </div>

                        <div>
                            <div class="TrainingType">
                                <h4>Calisthenics</h4>
                            </div>

                            <div class="Name">
                                <h2>Charbel Faddoul</h2>
                            </div>

                            <div class="Description" >
                                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, at! Vel laudantium corrupti sed! Saepe voluptatem, nam sint libero velit, assumenda doloribus iste ex doloremque natus vel neque ad in!</p>
                            </div>

                        </div>
                        <div class="Trainer-SocialMedia">
                            <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </article>

                <div class="PageNumber">
                    <a href="javascript:void(0)">1</a>
                    <a href="javascript:void(0)">2</a>
                    <a href="javascript:void(0)">3</a>
                </div>
            </div>-->


            <br><br><br>
        </section>

        <footer id="ContactUs">

            <div class="mt-5 d-md-flex justify-content-evenly">
                <div>
                    <div>
                        <div>
                            <i class="fa fa-location-dot"></i> <span>Lebanon Jounieh, sarba</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-phone"></i> <span>78-982-270</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-envelope"></i> <span>charbel.boufaddoul@gmail.com</span>
                        </div>
                    </div>

                    <div class="SocialMedia d-flex justify-content-evenly">
                        <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-youtube"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <form action="">
                    <legend>Contact us</legend>
                    <input type="text" name="fullName" id="" placeholder="full name" required> <br><br>
                    <input type="phone" name="phone" id="" placeholder="Phone" required> <br><br>
                    <input type="email" name="email" id="" placeholder="email" required> <br><br>

                    <textarea name="Message" id="" placeholder="Message" required></textarea> <br><br>

                    <input type="submit" name="submit" id="submit"> <br>
                </form>
            </div>

            <br>

            <div class="Copyright">
                Copyright © 2023 ECC. All Rights Reserved.
            </div>

        </footer>
    </section>

</body>
</html>


