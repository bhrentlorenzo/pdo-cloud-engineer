<?php
require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../templates/header.php';

$stmt = $pdo->query("SELECT * FROM cloud_engineers ORDER BY dateAdded DESC");
$rows = $stmt->fetchAll();
?>

<a href="add.php" class="btn btn-primary mb-3">Add Cloud Engineer</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Specialization</th><th>Cert Level</th><th>Exp (yrs)</th><th>Date Added</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?=htmlspecialchars($r['id'])?></td>
      <td><?=htmlspecialchars($r['firstName'].' '.$r['lastName'])?></td>
      <td><?=htmlspecialchars($r['email'])?></td>
      <td><?=htmlspecialchars($r['cloudSpecialization'])?></td>
      <td><?=htmlspecialchars($r['certificationLevel'])?></td>
      <td><?=htmlspecialchars($r['experienceYears'])?></td>
      <td><?=htmlspecialchars($r['dateAdded'])?></td>
      <td>
        <a href="edit.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="delete.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
