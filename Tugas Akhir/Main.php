<?php
    session_start();
    require "config.php";
    $processedGameIds = array();
    $connection = mysqli_connect($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die('Database connection failed: ' . $connection->connect_error);
    };

    $query = "SELECT * FROM games";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $games = [];  
        while ($row = mysqli_fetch_assoc($result)) {
            $games[] = $row; 
        }
    } else {
        $games = [];
    } 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gameId'])) {
    $gameId = $_POST['gameId'];
    $_SESSION['shoppingBasket'][] = $gameId;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitOrder'])) {
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        $userId = $_SESSION['userId'];
        $gamesToBuy = $_SESSION['shoppingBasket'];

        $orderQuery = "INSERT INTO orders (user_id, game_id) VALUES ";
        $values = [];
        foreach ($gamesToBuy as $gameId) {
            $values[] = "($userId, $gameId)";
        }
        $orderQuery .= implode(",", $values);

        if (mysqli_query($connection, $orderQuery)) {
            $_SESSION['shoppingBasket'] = [];
            header("Location: order_success.php");
            exit();
        } else {
            echo "Failed to submit the order: " . mysqli_error($connection);
        }
    } else {
       header("Location: login.php");
        exit();
    }
}

mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/Main.css">
</head>
<body>
    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true): ?>
    <h2 id="welcomeMessage">
        Welcome, <?php echo $_SESSION['username']; ?>
    </h2>
    <a class="logout" href="Out.php">
        Logout
    </a>
    <?php endif; ?>
    <nav class="navbar">
        <div class="navbar-links">
            <a href="Landing.php">
                <img src="Assets/Home Icon.png" alt="Home">
            </a>
            <a href="Main.php">
                <img src="Assets/List.png" alt="List of Game">
            </a>
            <a href="#!" onclick="alert('In Progress')">
                <img src="Assets/FAQs.png" alt="FAQs">
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
                <img src="Assets/Info.png" alt="Info">
            </a>
        </div>
    </nav>
    <div class="sidebar">
        <a href="Landing.php">
            <img src="Assets/Home Icon.png" alt="Home">
        </a>
        <a href="Main.php">
            <img src="Assets/List.png" alt="List of Game">
        </a>
        <a href="#!" onclick="alert('In Progress')">
            <img src="Assets/FAQs.png" alt="FAQs">
        </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
            <img src="Assets/Info.png" alt="Info">
        </a>
    </div>
    <div class="main">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner p-0" role="listbox">
                <div class="carousel-item active">
                    <img src="Pics/Rainbox Six Siege.png" class=" w-100 d-block" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="Pics/MHR.jpg" class="w-100 d-block" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="Pics/Assassins-Creed-Mirage.png" class="w-100 d-block" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row p-0 m-0">
            <div class="col d-flex flex-row justify-content-around flex-wrap">
            <?php foreach ($games as $game): ?>
                <div class="cards" onclick="expandCard(this)">
                    <img src="<?php echo $game['image_path']; ?>" alt="<?php echo $game['title']; ?>">
                    <div class="card-description">
                        <?php echo $game['description']; ?>
                    </div>
                    <button class="buy-button bg-black text-white rounded-4 mt-5" onclick="addToCart('<?php echo $game['id']; ?>')">Buy</button>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <footer class="d-flex p-4 mt-4">
            <span class="me-3">cc 2023. Play-Z Production</span>
            <button class="shopping-basket-button bg-black text-white rounded-4" onclick="openShoppingBasket()">Shopping Basket</button>
        </footer>
    </div>
    <div class="modal fade" id="aboutUsModal" tabindex="-1" role="dialog" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutUsModalLabel">About Us</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Play-Z is an exciting online gaming platform where you can immerse yourself in a world of thrilling games. Whether you're a casual gamer or a dedicated enthusiast, Play-Z offers a wide range of games for you to browse, explore, and purchase.
                    </p>
                    <p>
                        At Play-Z, we understand your passion for gaming, and we strive to provide you with an exceptional experience. Our user-friendly interface allows you to effortlessly navigate through our extensive collection of games, conveniently categorized by genre, platform, and popularity.    
                    </p>
                    <p>
                        Not only can you browse and discover games on Play-Z, but you can also purchase them directly from our platform. We've partnered with reputable game developers and publishers to offer you a seamless buying experience. With just a few clicks, you can add your favorite games to your virtual shopping cart and proceed to a secure checkout process.
                    </p>
                    <p>    
                        Experience the joy of gaming with Play-Z. Whether you're looking to embark on epic quests, engage in fierce competitions, or simply unwind with a captivating storyline, Play-Z is your go-to destination for all your gaming needs. Explore, discover, and embrace the world of gaming with Play-Z today!
                    </p>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="shoppingBasketModal" tabindex="-1" role="dialog" aria-labelledby="shoppingBasketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shoppingBasketModalLabel">Shopping Basket</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Buyer Name: <?php echo $_SESSION['username']; ?></h6>
                    <h6>Games to Buy:</h6>
                    <ul>
                        <?php foreach ($_SESSION['shoppingBasket'] as $gameId): ?>
                            <li><?php echo $games[$gameId]['title']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submitOrder">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="JS/bootstrap.js"></script>
    <script>
        function expandCard(element) {
            const isSelected = element.classList.contains('selected');
            const cards = document.getElementsByClassName('cards');
    
            for (let i = 0; i < cards.length; i++) {
                cards[i].classList.remove('selected');
            }
    
            if (!isSelected) {
                element.classList.add('selected');
            }
        }

        if (<?php echo isset($_SESSION['accountCreated']) && $_SESSION['accountCreated'] ? 'true' : 'false'; ?>) {
        window.onload = function() {
            alert("Account created");
        };
        
    }

    function addToCart(gameId) {
            $.ajax({
                url: 'add_to_cart.php',
                method: 'POST',
                data: { gameId: gameId },
                success: function(response) {
                    alert('Game added to the shopping basket!');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function openShoppingBasket() {
            $('#shoppingBasketModal').modal('show');
        }
    </script>
</body>
</html>