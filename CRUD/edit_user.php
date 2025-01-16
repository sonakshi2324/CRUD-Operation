<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $phone, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
