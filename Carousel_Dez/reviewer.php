<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer</title>
</head>
<style>
        * {
            box-sizing: border-box; /* Malay ko */
            padding: 0; /* Nagbibigay ng space sa loob ng element */
            margin: 0; /* Naglalagay ng space sa labas ng element */
            /* Recommended to lagi sa una, para walang spaces sa webpages nyo */
        }

        .flex {
            display: flex; /* Para mag tabi tabi yung laman ng container */
            flex-wrap: wrap; /* Para mag wrap yung laman ng container pag di na kasya sa isang line */
            gap: 20px; /* Para lagyan ng space yung mga laman ng container or di mag dikit-dikit */
            justify-content: center; /* Para i-center yung laman ng container horizontally*/
            justify-content: space-between; /*~     ~     ~*/
            justify-content: space-around;  /*  ~    ~    ~  */
            justify-content: space-evenly;  /*  ~  ~  ~  */
            align-items: center; /* Para i-center din yung laman ng container vertically */
        }

        .grid {
            display: grid; /* Para mag grid yung laman ng container */
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Para mag adjust yung column ng grid base sa laki ng screen, 200px minimum, 1fr maximum */
            gap: 20px; /* Para lagyan ng space yung mga laman ng container or di mag dikit-dikit */
        }


</style>

<body>
    <main>
        <div class="container">
            <h1>Data Fetching </h1>
            <?php
            include "db.php";
            $sql = "SELECT * FROM products";
            // Table name (table name ng gusto nyo display)                                    
            $result = $conn->query($sql);
            // execute the query (wag kalimutan gais)                                   
            ?>
        </div>

        <h1>Displaying Data</h1>
        <div class="container">
            <!-- Dapat my container nakayo bago nyo lagay yung data -->
            <?php
            if ($result->num_rows > 0) {
                // meaning nung 0 is wala laman ung table nyo
                // num_rows kinukuha nya yung laman ng isang buong row sa database nyo.
                while ($row = $result->fetch_assoc()) {
                    // malay ko ano to. basta si "$row" variable name na nagsstore ng multiple data(array).
            ?>
                    <div class="card">
                        <!-- kaya each echo merong "$row" kasi naka array na yung buong row, need nalang macall -->
                        <!-- si "product_name" yung name ng column sa database nyo -->
                        <!-- sample array value pag 4 yung naka echo ["apple", "100", "50", "apple.jpg"] -->
                        <h2><?php echo $row["product_name"]; ?></h2>
                    </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>

        <h1>Inserting Data</h1>

        <div class="container">
            <?php
            if (isset($_POST["add"])) {
                $product_name = $_POST["product_name"];
                $price = $_POST["price"];
                // value ng "name" attribute sa form nyo (input) yung ilalagay nyo dito.  
                $sql = "INSERT INTO products (product_name, price) VALUES ('$product_name', '$price')";
                // si "products" yung name ng table nyo. "product_name" at "price" yung name ng column sa database nyo.
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Product added successfully.</p>";
                } else {
                    echo "<p>Error adding product: " . $conn->error . "</p>";
                }
            }
            ?>
            <!-- since lalagay ko ung process sa same file, lalagay ko din sa action yung same file name. -->
            <!-- pwede din kahit different page. -->
            <form action="reviewer.php" method="POST" enctype="multipart/form-data">
                <!-- action attribute parang link lang yan -->
                <!-- method attribute alam nyo naman na "POST" private, "GET" public -->
                <!-- enctype attribute kailangan pag my files/img kayong ssubmit -->
                <input type="text" name="product_name" required>
                <input type="number" name="price" required>
                <button type="submit" name="add">Add Product</button>
            </form>
        </div>

        <div class="container">

        </div>

    </main>
</body>

</html>