    <?php
    include_once 'config/config.php';

    class KosmetikModel {
        static function select() {
            global $conn;
            $sql = "SELECT * FROM crud";
            $result = $conn->query($sql);
            $rows = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
            $result->free();
            $conn->close();
            return $rows;
        }

        static function insert($data=[]) {
            extract($data);
            global $conn;
            $sql = "INSERT INTO crud (date, name, hp, deskripsi, ammount, status, image) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssss', $date, $name, $hp, $deskripsi, $ammount, $status, $image);
            $stmt->execute();

            $result = $stmt->affected_rows > 0 ? true : false;
            return $result;
        }

        static function update($data=[]) {
            extract($data);
            global $conn;
            $sql = "UPDATE crud SET date = ? name = ?, hp = ?, deskripsi = ?, ammount = ?, status = ?, image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssssi', $date, $name, $hp, $deskripsi, $ammount, $status, $image, $id);
            $stmt->execute();

            $result = $stmt->affected_rows > 0 ? true : false;
            $conn->close();
            return $result;
        }

        static function delete($id='') {
            global $conn;
            $result = '';
            $sql = "DELETE FROM crud WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $result = $stmt->affected_rows > 0 ? true : false;
            return $result;
        }
    }