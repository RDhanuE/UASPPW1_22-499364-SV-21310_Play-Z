# Play-Z
Ryvalino Dhanu Ekaputra

Play-Z merupakan platform online yang dapat digunakan oleh para gamers untuk mencari games - games dengan harga termurah, serta mempelejari lebih jauh tentang game tersebut melalui deskripsi yang ada. Play-Z dibuat agar para gamers tidak perlu repot - repot untuk berpindah - pindah platform atau web untuk mencari dan membeli games, cukup dengan website ini yang mencakup games - games dari semua konsol.

Aspek Penilaian :

**Desain rapi mengikuti kaidah atau prinsip desain**

Berikut tampilan - tampilan dari website Play-Z
Landing-page : 
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/f105f3d4-a9c8-4e46-96c6-d04674162b00)
Sign Up Page :
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/29d6d52d-9e32-45f9-a11e-f1dfc220cb2c)
Login Page   :
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/ddca5897-9c05-453f-83ad-70a3c5031a81)
Main Page bagian atas :
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/805c9dc2-23ee-4e5d-a4bc-311ccb19bf56)
Main Page bagian bawah:
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/1c0328b5-c58e-41f2-8936-15f38a4a800d)

**Website responsive**

Berikut tampilan beberapa page nya ketika diakses melalui tablet :
![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/ba486e9f-81c1-41f3-8f6c-e20ecdeb9050)

![image](https://github.com/RDhanuE/UASPPW1_22-499364-SV-21310_Play-Z/assets/113745267/0ddacc92-0106-490b-8ff3-ea2f2001425a)

Berikut kode yang digunakan untuk menghasilkan tampilan responsive tersebut:
```CSS

/* Responsive */

/* TABLET */

@media screen and (max-width: 768px) {


    .sidebar {
        display: none;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: black;
        color: white;
    }

    .navbar img {
        height: 50px;
        width: 50px;
    }

    .navbar-links {
        align-items: center;
        display: flex;
    }

    .navbar-links a {
        margin-right: 20px;
        color: white;
        text-decoration: none;
    }

    .navbar-links a:last-child{
        margin-left: auto;    
        margin-right: 0;
    }

    
    .sidebar {
        display: none;
    }

    .main {
        margin-left: 0;
    }

    .container-column {
        margin-top: 40px;
    }


    .container-row a {
        margin: 20px;
    }

    h1 {
        font-size: 40px;
        margin-bottom: 30px;
    }

    h4 {
        font-size: 24px;
    }
    
    
}

/* MOBILE */
@media screen and (max-width: 320px) {

    h1 {
        font-size: 36px;
        margin-bottom: 15px;
    }

    h4 {
        font-size: 16px;
    }

    .container-row a {
        margin: 5px;
        font-size: 14px;
    }

    .container-row a img {
        height: 20px;
        width: 20px;
    }

}
```

**Direct feedback**
Setelah membuat akun, pengguna akan langsung masuk ke dalam main page, serta sebuah notifikasi akan muncul

```JavaScript
if (<?php echo isset($_SESSION['accountCreated']) && $_SESSION['accountCreated'] ? 'true' : 'false'; ?>) {
        window.onload = function() {
            alert("Account created");
        };
```

**Konten dinamis dari database**
Terdapat sistem akun yang selalu berubah - ubah. Akun pengguna dapat ditambahkan

```PHP
<?php
    require 'config.php';
    session_start();

    $connection = mysqli_connect($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die('Database connection failed: ' . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hpassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hpassword')";
        if ($connection->query($query) === TRUE) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            $_SESSION['accountCreated'] = true;
            header("Location: Main.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $connection->error;
        }
    }
    
    $connection->close();
?>
```
