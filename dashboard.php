<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include 'config.php';

function getUsers($conn) {
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $users;
}

$users = getUsers($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <header class="header">
    <div class="logo">
      <a href="#">Beauty Charm</a>
      <div class="search_box">
        <input type="text" placeholder="Searching in here">
        <i class="fas fa-search"></i> 
      </div>
    </div>

    <div class="header-icons">
      <i class="fas fa-bell"></i>
      <div class="account">
        <img src="profile (1).png" alt="">
        <h3>Geraldine</h3>
      </div>
    </div>
  </header>

  <div class="container">
    <nav>
      <div class="side_navbar" id="sidebar">
        <span>Menu</span>
        <a href="#" class="active">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">History</a>
        <a href="#">My Account</a>
      </div>
    </nav>

    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="welcome">
        <h1>Welcome to Beauty Charm</h1>
        <span>Kecantikan sejatimu terpancar dari dalam dirimu</span>
      </div>

      <div class="history_lists">
        <div class="list1">
          <div class="row">
            <h4>TABEL</h4>
            <a href="#"><button>Tambah</button></a>
          </div>
          <table>
            <thead>
              <tr>
                <th>No ID</th>
                <th>Dates</th>
                <th>Name</th>
                <th>No HP</th>
                <th>Deskripsi</th>
                <th>Ammount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>A01</td>
                <td>2 April 2024</td>
                <td>Fina</td>
                <td>087658975316</td>
                <td>Foundation 2</td>
                <td>150.000</td>
                <td>On going</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>A02</td>
                <td>2 April 2024</td>
                <td>Gina</td>
                <td>087658975316</td>
                <td>Maskara 1</td>
                <td>100.000</td>
                <td>Completed</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>A03</td>
                <td>6 April 2024</td>
                <td>Rahma</td>
                <td>087658975316</td>
                <td>Lip matte 3</td>
                <td>600.000</td>
                <td>Completed</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>A04</td>
                <td>8 April 2024</td>
                <td>Indah</td>
                <td>087658975316</td>
                <td>Cushion 4</td>
                <td>430.000</td>
                <td>On going</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>A05</td>
                <td>12 April 2024</td>
                <td>Lily</td>
                <td>087658975316</td>
                <td>Foundation 1</td>
                <td>300.000</td>
                <td>On going</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>A06</td>
                <td>14 April 2024</td>
                <td>Eliana</td>
                <td>087658975316</td>
                <td>Eyeshadow 1</td>
                <td>150.000</td>
                <td>Completed</td>
                <td><button>Edit</button></td>
                <td><button>Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</body>
</html>
</span>
