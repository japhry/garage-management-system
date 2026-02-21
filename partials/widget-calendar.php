<?php
require_once 'config.php';
$calYear = (int) date('Y');
$calMonth = (int) date('n') - 1; // 0-indexed for JS
$calMonthName = strtoupper(date('F'));
$firstDay = (int) date('w', mktime(0, 0, 0, $calMonth + 1, 1, $calYear)); // 0=Sun
$daysInMonth = (int) date('t', mktime(0, 0, 0, $calMonth + 1, 1, $calYear));
$today = (int) date('j');
$prevMonth = $calMonth === 0 ? 11 : $calMonth - 1;
$prevYear = $calMonth === 0 ? $calYear - 1 : $calYear;
$daysInPrevMonth = (int) date('t', mktime(0, 0, 0, $prevMonth + 1, 1, $prevYear));
?>
<div class="mrc-calendar-widget">
  <div class="mrc-calendar-header">
    <h3>Calendar</h3>
  </div>
  <div class="mrc-calendar-nav">
    <button type="button" class="mrc-calendar-prev" aria-label="Previous month"><i class="fas fa-chevron-left"></i></button>
    <div class="mrc-calendar-title"><?php echo e($calMonthName . ' ' . $calYear); ?></div>
    <button type="button" class="mrc-calendar-next" aria-label="Next month"><i class="fas fa-chevron-right"></i></button>
  </div>
  <div class="mrc-calendar-grid">
    <div class="mrc-calendar-day-header">SUN</div>
    <div class="mrc-calendar-day-header">MON</div>
    <div class="mrc-calendar-day-header">TUE</div>
    <div class="mrc-calendar-day-header">WED</div>
    <div class="mrc-calendar-day-header">THU</div>
    <div class="mrc-calendar-day-header">FRI</div>
    <div class="mrc-calendar-day-header">SAT</div>
    <?php
    // Previous month trailing days
    for ($i = 0; $i < $firstDay; $i++) {
      $d = $daysInPrevMonth - $firstDay + $i + 1;
      echo '<div class="mrc-calendar-day mrc-calendar-day-other">' . e((string) $d) . '</div>';
    }
    // Current month days
    for ($d = 1; $d <= $daysInMonth; $d++) {
      $cls = 'mrc-calendar-day';
      if ($d === $today) {
        $cls .= ' today';
      }
      echo '<div class="' . e($cls) . '">' . e((string) $d) . '</div>';
    }
    // Next month leading days to fill 6 rows (42 cells total)
    $totalCells = $firstDay + $daysInMonth;
    $remaining = 42 - $totalCells;
    for ($i = 1; $i <= $remaining; $i++) {
      echo '<div class="mrc-calendar-day mrc-calendar-day-other">' . e((string) $i) . '</div>';
    }
    ?>
  </div>
</div>
