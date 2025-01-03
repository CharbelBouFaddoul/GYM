

<html>
<?php
    include('header.php');
?>
    <title>Personel Trainers</title>
    <link rel="stylesheet" href="personelTrainer.css?v=<?php echo time();?>">
<body>

    
        <div class="Trainer">
                <?php
                    $dbHost     =  "Localhost";
                    $dbUsername =  "root";
                    $dbPassword =  "";
                    $dbName = "Gym";
                
                    // create connection
                    $conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
                
                    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
                        $_GET['page'] = intval($_GET['page']);
                        $pageCourante = $_GET['page'];
                    } else{
                        $pageCourante = 1;
                    }

                    $sql_Count= "Select count(PersonelTrainerID) as total From PersonelTrainer;";
                    $resultnum = $conn -> query($sql_Count);
                    $totalSalesman = $resultnum -> fetch_row()[0];
                    $salesmanPerPage = 3;
                    $nombreTotalPage = ceil($totalSalesman/$salesmanPerPage);
                    $depart = ($pageCourante-1)*$salesmanPerPage;
                    $sql_select = "Select * from PersonelTrainer where certification = 1 LIMIT $depart, $salesmanPerPage";
                    $result = $conn -> query($sql_select);

                    echo '<h1 class="text-center">EXPERT <span>TRAINERS</span></h1>';
                    if ($result -> num_rows > 0){
                        echo '<article class="d-md-flex justify-content-evenly">';
                        while ($row = $result -> fetch_assoc()){
                            echo '<div class="Box">';
                            
                            echo '<div class="Image">';
                            echo '<img src="PersonelTrainer - Image/Background1.jpg" alt="">';
                            echo '</div>';
    
                            echo '<div class="TrainingType">';
                            echo '<h4>'.$row["TrainingType"].'</h4>';
                            echo '</div>';
    
                            echo '<div class="Name">';
                            echo '<h4>'.$row["FirstName"] ." ". $row["LastName"] .'</h4>';
                            echo '</div>';
    
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

                       
                    }
                    
                    echo '<div class="PageNumber">';
                    for ($i=1; $i<=$nombreTotalPage; $i++){
                        if ($i == $pageCourante){
                            echo '<a href="javascript:void(0)">' .$i. '</a>'."<br>";
                        } else{
                            echo '<a href="personelTrainer.php?page='.$i.'">' .$i. '</a>'."<br>";
                        }
                    }
                    echo '</div>';
                    echo '</div>';

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
                </div>-->

        </div>

</body>
</html>