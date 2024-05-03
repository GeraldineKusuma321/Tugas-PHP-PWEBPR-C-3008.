<?php
// Ambil informasi profil pengguna dari database atau dari mana pun Anda menyimpannya
$userProfile = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    // Informasi profil lainnya
];
?>

<div class="profile-info">
    <h2>Profile</h2>
    <p>Name: <?php echo $userProfile['name']; ?></p>
    <p>Email: <?php echo $userProfile['email']; ?></p>
    <!-- Informasi profil lainnya -->
</div>
