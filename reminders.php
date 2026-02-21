<?php
require_once 'config.php';
renderHeader();
?>
  <?php include 'partials/sidebar.php'; ?>
  <div class="main-content">
    <?php include 'partials/header.php'; ?>
    <div class="reminder-center-wrap">
      <div class="reminder-filter-chips-row">
        <div class="reminder-chip">All Reminders <button class="chip-remove">&times;</button></div>
        <div class="reminder-chip">Due From Today <button class="chip-remove">&times;</button></div>
      </div>
      <div class="reminder-main-card">
        <div class="reminder-main-title">All Reminders</div>
        <div class="reminder-main-flex">
          <div class="reminder-donut">
            <svg width="170" height="170" viewBox="0 0 170 170">
              <circle cx="85" cy="85" r="75" fill="none" stroke="#f3f4f6" stroke-width="18" />
              <circle cx="85" cy="85" r="75" fill="none" stroke="#ef4444" stroke-width="18" stroke-dasharray="48 471" />
            </svg>
            <div class="reminder-donut-center">8</div>
          </div>
          <table class="reminder-summary-table">
            <tr><td>Print</td><td style="text-align:right;">2</td><td style="text-align:right;"><a href="#" class="reminder-link">Print</a></td></tr>
            <tr><td>Email</td><td style="text-align:right;">3</td><td style="text-align:right;"><a href="#" class="reminder-link">Send</a></td></tr>
            <tr><td>SMS</td><td style="text-align:right;">3</td><td style="text-align:right;"><a href="#" class="reminder-link">Send</a></td></tr>
            <tr><td style="color:#b1b1b1;font-weight:600;">Errors</td><td style="text-align:right;">1</td><td style="text-align:right;"><a href="#" class="reminder-link">View</a></td></tr>
            <tr><td style="color:#b1b1b1;">Failed</td><td style="text-align:right;">0</td><td style="text-align:right;"><a href="#" class="reminder-link">View</a></td></tr>
            <tr><td style="color:#b1b1b1;">Expired</td><td style="text-align:right;">1</td><td style="text-align:right;"><a href="#" class="reminder-link">View</a></td></tr>
          </table>
        </div>
        <div style="text-align:right;margin-top:6px;"><a href="#" class="reminder-link" style="font-size:0.98rem;color:#b1b1b1;">Retry Failures</a></div>
        <button class="reminder-main-btn" style="width:100%;margin:18px 0 0 0;">Print / Send Current Reminders</button>
        <div class="reminder-main-btn-row">
          <button class="reminder-secondary-btn" disabled>View Reminders Due Now</button>
          <button class="reminder-secondary-btn">View Past</button>
          <button class="reminder-secondary-btn">View Future</button>
        </div>
        <div class="reminder-main-btn-row">
          <select class="reminder-select"><option>Previous Dates</option></select>
          <button class="reminder-main-btn gradient">Display Previously Sent</button>
        </div>
      </div>
    </div>
  </div>
<style>
.reminder-center-wrap {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  min-height: 100vh;
  width: 100%;
  padding-top: 24px;
}
.reminder-filter-chips-row {
  display: flex;
  gap: 14px;
  align-items: center;
  min-height: 48px;
  padding: 6px 0 18px 0;
  justify-content: center;
}
.reminder-chip {
  background: #f3f4f6;
  color: #b91c1c;
  font-weight: 900;
  border-radius: 999px;
  padding: 10px 22px 10px 16px;
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 1.13rem;
  box-shadow: 0 2px 8px rgba(185,28,28,0.04);
  letter-spacing: 0.01em;
}
.chip-remove {
  background: none;
  border: none;
  color: #b91c1c;
  font-size: 1.18rem;
  cursor: pointer;
  margin-left: 2px;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.18s, color 0.18s;
}
.chip-remove:hover {
  background: #fde8e8;
  color: #ef4444;
}
.reminder-main-card {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 2px 12px rgba(185,28,28,0.07);
  padding: 28px 28px 18px 28px;
  max-width: 700px;
  width: 100%;
  margin: 0 auto 32px auto;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.reminder-main-title {
  font-size: 2.1rem;
  font-weight: 900;
  text-align: center;
  margin-bottom: 18px;
  letter-spacing: 0.5px;
}
.reminder-main-flex {
  display: flex;
  gap: 28px;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-bottom: 8px;
}
.reminder-donut {
  width: 170px;
  height: 170px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.reminder-donut-center {
  position: absolute;
  width: 170px;
  height: 170px;
  display: flex;
  align-items: center;
  justify-content: center;
  top: 0;
  left: 0;
  font-size: 2.8rem;
  font-weight: 900;
  color: #ef4444;
  letter-spacing: 0.01em;
}
.reminder-summary-table {
  flex: 1;
  min-width: 220px;
  max-width: 320px;
  margin-left: 12px;
  font-size: 1.13rem;
  color: #222;
  border-collapse: separate;
  border-spacing: 0 2px;
}
.reminder-summary-table td {
  padding: 7px 8px;
  font-weight: 600;
}
.reminder-link {
  color: #b91c1c;
  font-weight: 700;
  text-decoration: none;
  font-size: 1.01rem;
  transition: color 0.18s;
}
.reminder-link:hover {
  color: #ef4444;
  text-decoration: underline;
}
.reminder-main-btn {
  width: 100%;
  margin: 18px 0 0 0;
  padding: 13px 0;
  font-size: 1.13rem;
  font-weight: 700;
  background: #f3f4f6;
  color: #b1b1b1;
  border: none;
  border-radius: 8px;
  cursor: not-allowed;
  transition: background 0.18s, color 0.18s;
}
.reminder-main-btn.gradient {
  background: linear-gradient(90deg,#ef4444,#b91c1c);
  color: #fff;
  cursor: pointer;
}
.reminder-main-btn.gradient:hover {
  background: linear-gradient(90deg,#b91c1c,#ef4444);
}
.reminder-main-btn-row {
  display: flex;
  gap: 12px;
  margin: 18px 0 0 0;
  width: 100%;
}
.reminder-secondary-btn {
  flex: 1;
  background: #fff;
  color: #b91c1c;
  font-weight: 700;
  border: 1.5px solid #f3f4f6;
  border-radius: 8px;
  padding: 13px 0;
  font-size: 1.13rem;
  transition: background 0.18s, color 0.18s;
}
.reminder-secondary-btn:disabled {
  background: #f3f4f6;
  color: #b1b1b1;
  cursor: not-allowed;
}
.reminder-select {
  flex: 1;
  padding: 11px 12px;
  border-radius: 8px;
  border: 1.5px solid #eee;
  background: #f9fafb;
  color: #b91c1c;
  font-weight: 600;
  outline: none;
  font-size: 1.13rem;
}
@media (max-width: 900px) {
  .reminder-main-card {
    padding: 16px 4vw 12px 4vw;
    max-width: 98vw;
  }
  .reminder-main-flex {
    flex-direction: column;
    gap: 18px;
    align-items: center;
    width: 100%;
  }
  .reminder-summary-table {
    margin-left: 0;
    min-width: 0;
    width: 100%;
  }
  .reminder-donut {
    margin: 0 auto;
  }
}
@media (max-width: 600px) {
  .reminder-center-wrap {
    padding-top: 8px;
  }
  .reminder-main-title {
    font-size: 1.3rem;
  }
  .reminder-main-card {
    border-radius: 10px;
    padding: 8px 2vw 8px 2vw;
  }
  .reminder-chip {
    font-size: 0.98rem;
    padding: 7px 12px 7px 10px;
  }
  .reminder-main-btn, .reminder-main-btn.gradient, .reminder-secondary-btn {
    font-size: 1rem;
    padding: 10px 0;
  }
  .reminder-summary-table td {
    padding: 5px 4px;
  }
}
</style>
<?php renderFooter(); ?> 