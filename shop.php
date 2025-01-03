<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <!-- End Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="shop.css">
    <script src="shop.js" defer></script>
    <title>shop</title>
    <style>
        ::selection {
            background-color: #FF5159;
            color: white;
        }
    </style>
</head>

<body>
    
    <header class="NavBar container-fluid d-lg-flex justify-content-between">

        <div class="logo col-lg-2 col-12 text-center">
            <a href="index.php"><img src="./Image/LogoGym.png" alt="" class=""></a>
        </div>

        <div class="col-xl-6 col-lg-8 col-12">
            <ul class="d-flex justify-content-around flex-wrap ulList">
                <li class=""><a href="./index.php">Home</a></li>
                <li class=""><a href="./index.php#AboutUs">About Us</a></li>
                <li class=""><a href="./Membership.php">Memberships</a></li>
                <li class=""><a href="./personelTrainer.php">Personal Trainers</a></li>
                <li class=""><a href="./shop.php">Shop</a></li>
                <li class=""><a href="./index.php#ContactUs">Contact Us</a></li>
                <li class="signIn"><a href="javascript:void(0)">Sign in</a></li>
            </ul>
        </div>

        <div class="col-xl-2 col-lg-1 col-12">
            <ul class="d-flex flex-direction-column align-items-center justify-content-center">
                <li class=""><div><a href="#Totalprice"><i class='bx bx-cart-alt' style="font-size: 25px;" id="cart-icon" onclick="Total()"><span id="Cart">0</span></i></a></div></li>
            </ul>
        </div>

    </header>

    <section class="Products">
        <?php
        
            $dbHost     =  "Localhost";
            $dbUsername =  "root";
            $dbPassword =  "";
            $dbName = "Gym";

            // create connection
            $conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

            $sql_select1 = "Select * from shoptype";
            $result1 = $conn -> query($sql_select1);

            if ($result1 -> num_rows > 0){
                while ($row1 = $result1 -> fetch_assoc()){
                    echo '<div class="container">';
                    echo '<div class="Title">';
                    echo '<h1>'.$row1['type'].'</h1>';
                    echo '</div>';

                    $sql_select2 = "Select * From Shop where Quantity > 0 and typeID is not Null and typeID = $row1[typeID];";
                    $result2 = $conn -> query($sql_select2);

                    if ($result2 -> num_rows > 0){
                        echo '<div class="Product-Type d-md-flex justify-content-around flex-wrap">';
                        while ($row2 = $result2 -> fetch_assoc()){

                            echo '<div class="Box">';
                            echo '<img src="" alt="">';
                            echo '<div class="info">';
                            echo '<h5>'.$row2['Name'].'</h5>';
                            echo '<h4>$<span class="productPrice">'.$row2['Price'].'</span></h4>';
                            echo '</div>';

                            echo '<div class="button">';
                            echo '<span onclick=ProductRemove("'.$row2['Name'].'") class="removeP"><p>x</p></span>';
                            echo '<span class="quantity" id="'.$row2['Name'].'"></span>';
                            echo '<span onclick=ProductAdd("'.$row2['Name'].'") class="cart"><i class="bx bx-cart-alt"></i></span>';
                            echo '</div>';
                            echo '</div>';
                            
                        }
                        echo '</div>';

                    }
                    echo '</div>';
                }
                
            }
        
        ?>            
        
        <!--<div class="container">
            <div class="Title">
                <h1>Supplement</h1>
            </div>

            <div class="Product-Type d-md-flex justify-content-around flex-wrap">
                <div class="Box">
                    <img src="" alt="">
                    <div class="info">
                        <h5>Creatine</h5>
                        <h4>$<span class='productPrice'>1</span></h4>
                    </div>
                    <div class="button">
                        <span onclick="ProductRemove('quantity1')" class="removeP"><p>x</p></span>
                        <span class="quantity" id="quantity1"></span>
                        <span onclick="ProductAdd('quantity1')" class="cart"><i class='bx bx-cart-alt'></i></span>
                    </div>
                </div>

                <div class="Box">
                    <img src="" alt="">
                    <div class="info">
                        <h5>Whey Protein</h5>
                        <h4>$<span class='productPrice'>2</span></h4>
                    </div>
                    <div class="button">
                        <span onclick="ProductRemove('quantity2')" class="removeP"><p>x</p></span>
                        <span class="quantity" id="quantity2"></span>
                        <span onclick="ProductAdd('quantity2')" class="cart"><i class='bx bx-cart-alt'></i></span>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br>-->

    </section>

    <script>
        function ProductAdd(quantityId) {
    var quantityElement = document.getElementById(quantityId);
    console.log(quantityElement);
    var currentQuantity = parseInt(quantityElement.innerHTML);
    if (!isNaN(parseInt(quantityElement.innerHTML))) {
        quantityElement.innerHTML = currentQuantity + 1;
    } else {
        quantityElement.innerHTML = 1;
    }

    var totalCart = document.getElementById('Cart');
    var currentCARTQuantity = parseInt(totalCart.innerHTML);
    totalCart.innerHTML = currentCARTQuantity + 1;
}

    function ProductRemove(quantityRemove) {
        var quantityElement = document.getElementById(quantityRemove);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        if (!isNaN(currentQuantity) && currentQuantity > 0) {
            quantityElement.innerHTML = currentQuantity - 1;
        }

        if (quantityElement.innerHTML == 0){
            quantityElement.innerHTML = '';
        }
        var totalCart = document.getElementById('Cart');
        var currentCARTQuantity = parseInt(totalCart.innerHTML);
        if (currentCARTQuantity > 0){
            totalCart.innerHTML = currentCARTQuantity - 1;
        }

    }

    function Total(){
        var total = 0;
        let quantities = document.querySelectorAll(".quantity");
        let prices = document.querySelectorAll(".productPrice");
        let sum = 0.00;

        for (let i = 0; i < quantities.length; i++) {
            let quantity = parseFloat(quantities[i].innerHTML);
            let price = parseFloat(prices[i].innerHTML);
            if (!isNaN(quantity)) {
                sum += quantity * price
            }
        }

        if (sum > 0){
            alert(sum);
            location.reload();
        }

    }
    </script>

</body>
</html>