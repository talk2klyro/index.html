<?php
// backend/dashboard.php

// Path to your CSV log file
$logFile = __DIR__ . '/referrals.csv';

// Read file contents
$rows = [];
if (file_exists($logFile)) {
    if (($handle = fopen($logFile, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            $rows[] = $data;
        }
        fclose($handle);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Referral Dashboard | Talk2Klyro</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <header>
    <h1>Referral Dashboard</h1>
    <p>Real-time logs of ambassador activity</p>
  </header>

  <main>
    <section id="dashboard">
      <table>
        <caption>Ambassador Referral Logs</caption>

        <colgroup>
          <col span="1" />
          <col span="1" />
          <col span="1" />
          <col span="1" />
          <col span="1" />
        </colgroup>

        <thead>
          <tr>
            <th>Timestamp</th>
            <th>IP Address</th>
            <th>Source</th>
            <th>Medium</th>
            <th>Campaign</th>
          </tr>
        </thead>

        <tbody>
          <?php if (count($rows) > 0): ?>
            <?php foreach ($rows as $i => $row): ?>
              <tr>
                <?php foreach ($row as $cell): ?>
                  <td><?= htmlspecialchars($cell) ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No referrals logged yet.</td>
            </tr>
          <?php endif; ?>
        </tbody>

        <tfoot>
          <tr>
            <td colspan="5">Data auto-loaded from referrals.csv</td>
          </tr>
        </tfoot>
      </table>
    </section>
  </main>

  <footer>
    <p>© 2025 Talk2Klyro Consultancy — Analytics Dashboard</p>
  </footer>
</body>
</html>
