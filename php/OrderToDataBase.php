<?php
if (isset($_POST['add_order'])) {
    include('load_database.php');
    class Product
    {
        public $id;
        public $amount;
        public $price;
    }
    $_SESSION["basket"] = unserialize(serialize($_SESSION["basket"]));
    $basket = $_SESSION['basket'];
    $fname = $_POST["firstname"];
    $sname = $_POST["surname"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $zip = $_POST["zip"];
    $house_number = $_POST["house_number"];
    $apartment_number = $_POST["apartment_number"];




    $stmt675 = $pdo->query('SELECT id_order FROM orders');
    foreach ($stmt675 as $row675) {
    }
    if (isset($row675['id_order'])) {
        $stmt67 = $pdo->query('SELECT id_order FROM orders ORDER BY id_order DESC LIMIT 1');
        foreach ($stmt67 as $row67) {
            $last_order_id = $row67['id_order'];
        }
    } else {
        $last_order_id = 0;
    }



    $current_order = $last_order_id + 1;
    $order_date = '"' . date("Y/m/d") . '"';

    if (isset($_SESSION['login'])) {
        $stmt70 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status) VALUES (' . $current_order . ', ' . $order_date . ', "nadchodzace")');
        foreach ($basket as $product) {
            
            $id = $product->id;
            $amount = $product->amount;

            $stan=$pdo->query('SELECT amount FROM products WHERE id='.$id);
            foreach($stan as $ilo){}
            $old_amount=$ilo['amount'];
            $new_amount=$old_amount-$amount;
            $update_stan=$pdo->prepare('UPDATE products SET amount = :new_amount WHERE id=:id');
            $update_stan->bindValue(':new_amount',$new_amount,PDO::PARAM_STR);
            $update_stan->bindValue(':id',$id,PDO::PARAM_STR);
            $update_stan->execute();

            $stmt69 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES (' . $_SESSION['id_user'] . ', ' . $id . ', ' . $amount . ', ' . $current_order . ' )');
        }
    } else {

        $make_account = $pdo->prepare("INSERT INTO users (firstname,surname,email,city,street,zip,house_number,apartment_number,type) values (:firstname, :surname, :email, :city, :street, :zip, :house_number, :apartment_number, 'anon')");
        $make_account -> bindValue(':firstname',$fname,PDO::PARAM_STR);
        $make_account -> bindValue(':surname',$sname,PDO::PARAM_STR);
        $make_account -> bindValue(':email',$email,PDO::PARAM_STR);
        $make_account -> bindValue(':city',$city,PDO::PARAM_STR);
        $make_account -> bindValue(':zip',$zip,PDO::PARAM_STR);
        $make_account -> bindValue(':street',$street,PDO::PARAM_STR);
        $make_account -> bindValue(':house_number',$house_number,PDO::PARAM_STR);
        $make_account -> bindValue(':apartment_number',$apartment_number,PDO::PARAM_STR);
        $make_account -> execute();

        $stmt885 = $pdo->query('SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1');
            foreach($stmt885 as $row885){
                $anonym_user_id = $row885['id_user'];
            }


        $stmt71 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status) VALUES (' . $current_order . ', ' . $order_date . ', "nadchodzace")');
        foreach ($basket as $product) {

            $id = $product->id;
            $amount = $product->amount;

            $stan=$pdo->query('SELECT amount FROM products WHERE id='.$id);
            foreach($stan as $ilo){}
            $old_amount=$ilo['amount'];
            $new_amount=$old_amount-$amount;
            $update_stan=$pdo->prepare('UPDATE products SET amount = :new_amount WHERE id=:id');
            $update_stan->bindValue(':new_amount',$new_amount,PDO::PARAM_STR);
            $update_stan->bindValue(':id',$id,PDO::PARAM_STR);
            $update_stan->execute();

            $stmt691 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES ('.$anonym_user_id.' , ' . $id . ', ' . $amount . ', ' . $current_order . ' )');
        }
    }

    unset($_SESSION['basket']);
    unset($_POST);
    header('location:index.php');
}
