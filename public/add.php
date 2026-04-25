<?php
require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = $_POST['firstName'] ?? '';
    $last = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $spec = $_POST['cloudSpecialization'] ?? '';
    $cert = $_POST['certificationLevel'] ?? '';
    $exp = (int)($_POST['experienceYears'] ?? 0);

    $sql = "INSERT INTO cloud_engineers (firstName,lastName,email,cloudSpecialization,certificationLevel,experienceYears)
            VALUES (:first,:last,:email,:spec,:cert,:exp)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':first' => $first,
      ':last'  => $last,
      ':email' => $email,
      ':spec'  => $spec,
      ':cert'  => $cert,
      ':exp'   => $exp
    ]);

    header('Location: index.php');
    exit;
}
?>

<form method="post">
  <div class="mb-3"><label>First name</label><input class="form-control" name="firstName" required></div>
  <div class="mb-3"><label>Last name</label><input class="form-control" name="lastName" required></div>
  <div class="mb-3"><label>Email</label><input class="form-control" name="email" type="email" required></div>
  <div class="mb-3"><label>Cloud Specialization</label><input class="form-control" name="cloudSpecialization" placeholder="AWS / Azure / GCP" required></div>
  <div class="mb-3"><label>Certification Level</label><input class="form-control" name="certificationLevel" placeholder="Associate / Professional" required></div>
  <div class="mb-3"><label>Years of Experience</label><input class="form-control" name="experienceYears" type="number" min="0" required></div>

  <button class="btn btn-success">Save</button>
  <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
