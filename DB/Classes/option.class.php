<?php
class options{
    public function show(){
        try {
            $show = Connection::getInstance()->connect();
            $stmt = $show->query('SELECT * from LaLa');
            echo '<div class="container"><table class="table"><thead><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Оценка</th><th>Время добавления</th></tr></thead><tbody>';
         echo '<form action="Modules/send.php" method="post"><tr>
            <td></td>
            <td><input class="form-control" type="text" name="Name"></td>
            <td><input class="form-control" type="text" name="Surname"></td>
            <td><input class="form-control" type="number" name="Mark"></td>
            <td></td>
            <td><input type="submit" class="btn btn-success" value="Добавить"></td>
            </tr></form>';
while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>'.$row['ID'].'</td>';
    echo '<td>'.$row['Name'].'</td>';
    echo '<td>'.$row['Surname'].'</td>';
    echo '<td>'.$row['Mark'].'</td>';
    echo '<td>'.$row['Time'].'</td>';
     echo "<form action='Modules/delete.php' method='post'>
    <input type=hidden name=ID  value = '".$row['ID']."'>
    <input type=hidden name=del value=yes>
    <td><input type=submit class='btn btn-danger' value=Удалить></td>
    </form>";
    echo '</tr>';
    }
                echo '<form action="Modules/update.php" method="post">
                <tr>
                <td><input class="form-control" size="5" name="ID" placeholder="Введите ID"></td>
                <td><input class="form-control"  type="text" name="Name" placeholder="Введите имя"></td>
                <td><input class="form-control"  type="text" name="Surname" placeholder="Ввеите фамилию"></td>
                <td><input class="form-control"  type="number" name="Mark" placeholder="Введите оценку"></td>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="Исправить"></td>
                </tr>
                </form>';

            echo "</tbody></table></div>";
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
    public function delete(){
        try {
            $delete = Connection::connect();
            $ID = $_POST["ID"];
            if (isset($_POST['del']) && isset($_POST['ID']))
            {
                $stmt = $delete->prepare("DELETE FROM LaLa WHERE ID =:ID");
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
    public function send(){
        try {
            $send = Connection::getInstance()->connect();
            $Name = $_POST['Name'];
            $Surname = $_POST['Surname'];
            $Mark = $_POST['Mark'];
            if (isset($_POST['Name']) &&
                isset($_POST['Surname']) &&
                isset($_POST['Mark']))
            {
                $stmt = $send->prepare("INSERT INTO LaLa (Name,Surname,Mark)
                VALUES (:Name,:Surname,:Mark)");
                $stmt->bindParam(':Name', $Name);
                $stmt->bindParam(':Surname', $Surname);
                $stmt->bindParam(':Mark', $Mark);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }

    public function update()
    {
        try {
            $upd = Connection::connect();
                $Name = $_POST['Name'];
                $Surname = $_POST['Surname'];
                $Mark = $_POST['Mark'];
                $ID = $_POST['ID'];
            if (isset($_POST['ID'])) {
                $stmt = $upd->prepare("UPDATE LaLa SET Name = :Name, Surname = :Surname, Mark = :Mark WHERE ID = :ID");
                $stmt->bindParam(':Name', $Name);
                $stmt->bindParam(':Surname', $Surname);
                $stmt->bindParam(':Mark', $Mark);
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
    
}

?>