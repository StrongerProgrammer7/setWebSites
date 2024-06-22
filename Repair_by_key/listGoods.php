<!DOCTYPE html>
<html>
<head>
    <title>Поиск по артикулу</title>
</head>
<body>
    <h1>Поиск по артикулу</h1>
    <form method="POST">
        <label for="article">Введите артикул:</label>
        <input type="text" id="article" name="article" value="OC47">
        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем введенный артикул из формы
        $article = $_POST["article"];


        $client = new SoapClient("https://api.forum-auto.ru/wsdl", ["exceptions" => false]);
        $login = "493358_stroyzar";
        $pass = "sAVDkrEbqd";
        $result = $client->listGoods($login,$pass,$article);

        if(is_soap_fault($result))
        {
            echo "SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring}, detail: {$result->detail})";
        }else
        {
           // echo '<pre>' . var_export($result, true) . '</pre>';


            echo '<table border="1">';
            echo '<tr>';
            echo '<th>gid</th>';
            echo '<th>brand</th>';
            echo '<th>art</th>';
            echo '<th>name</th>';
            echo '<th>d_deliv</th>';
            echo '<th>kr</th>';
            echo '<th>num</th>';
            echo '<th>price</th>';
            echo '<th>whse</th>';
            echo '<th>is_returnable</th>';
            echo '</tr>';
            
            foreach ($result as $item) {
                echo '<tr>';
                echo '<td>' . $item['gid'] . '</td>';
                echo '<td>' . $item['brand'] . '</td>';
                echo '<td>' . $item['art'] . '</td>';
                echo '<td>' . $item['name'] . '</td>';
                echo '<td>' . $item['d_deliv'] . '</td>';
                echo '<td>' . $item['kr'] . '</td>';
                echo '<td>' . $item['num'] . '</td>';
                echo '<td>' . $item['price'] . '</td>';
                echo '<td>' . $item['whse'] . '</td>';
                echo '<td>' . $item['is_returnable'] . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            
        }
        
    }
    ?>
</body>
</html>
