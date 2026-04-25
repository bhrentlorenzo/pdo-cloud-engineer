<?php
require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../templates/header.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $spec = $_POST['cloudSpecialization'];
    $cert = $_POST['certificationLevel'];
    $exp = (int)$_POST['experienceYears'];

    $sql = "UPDATE cloud_engineers SET firstName=:first, lastName=:last, email=:email, cloudSpecialization=:spec, certificationLevel=:cert, experienceYears=:exp WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':first'=>$first, ':last'=>$last, ':email'=>$email, ':spec'=>$spec, ':cert'=>$cert, ':exp'=>$exp, ':id'=>$id
    ]);

    header('Location: index.php'); exit;
}

$stmt = $pdo->prepare("SELECT * FROM cloud_engineers WHERE id = :id");
$stmt->execute([':id' => $id]);
$row = $stmt->fetch();
if (!$row) { echo "Record not found"; require_once __DIR__ . '/../templates/footer.php'; exit; }
?>

<form method="post">
  <div class="mb-3"><label>First name</label><input class="form-control" name="firstName" value="<?=htmlspecialchars($row['firstName'])?>" required></div>
  <div class="mb-3"><label>Last name</label><input class="form-control" name="lastName" value="<?=htmlspecialchars($row['lastName'])?>" required></div>
  <div class="mb-3"><label>Email</label><input class="form-control" name="email" value="<?=htmlspecialchars($row['email'])?>" type="email" required></div>
  <div class="mb-3"><label>Cloud Specialization</label><input class="form-control" name="cloudSpecialization" value="<?=htmlspecialchars($row['cloudSpecialization'])?>" required></div>
  <div class="mb-3"><label>Certification Level</label><input class="form-control" name="certificationLevel" value="<?=htmlspecialchars($row['certificationLevel'])?>" required></div>
  <div class="mb-3"><label>Years of Experience</label><input class="form-control" name="experienceYears" type="number" min="0" value="<?=htmlspecialchars($row['experienceYears'])?>" required></div>

  <button class="btn btn-success">Update</button>
  <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
