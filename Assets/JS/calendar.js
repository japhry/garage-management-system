// Calendar page scripts extracted from the original sample

// Modal open/close logic
const openModalBtn = document.querySelector('.btn-primary, .quick-action-card');
const modal = document.getElementById('appointmentModal');
const closeModalBtn = document.getElementById('closeAppointmentModal');
if (openModalBtn && modal && closeModalBtn) {
  openModalBtn.addEventListener('click', () => { modal.style.display = 'flex'; });
  closeModalBtn.addEventListener('click', () => { modal.style.display = 'none'; });
  window.addEventListener('click', (e) => { if (e.target === modal) modal.style.display = 'none'; });
}

// Duration calculation functionality
function calculateDuration() {
  const fromDate = document.getElementById('appt-from-date').value;
  const toDate = document.getElementById('appt-to-date').value;
  const fromHour = parseInt(document.getElementById('appt-from-hour').value) || 0;
  const fromMinute = parseInt(document.getElementById('appt-from-minute').value) || 0;
  const toHour = parseInt(document.getElementById('appt-to-hour').value) || 0;
  const toMinute = parseInt(document.getElementById('appt-to-minute').value) || 0;

  // Create Date objects for comparison
  const fromDateTime = new Date(fromDate + 'T' + String(fromHour).padStart(2, '0') + ':' + String(fromMinute).padStart(2, '0') + ':00');
  const toDateTime = new Date(toDate + 'T' + String(toHour).padStart(2, '0') + ':' + String(toMinute).padStart(2, '0') + ':00');

  // Calculate difference in milliseconds
  const diffMs = toDateTime - fromDateTime;
  
  if (diffMs < 0) {
    document.getElementById('appt-duration-days').textContent = 'Invalid';
    document.getElementById('appt-duration-time').innerHTML = '<span class="hours">0h</span><span class="minutes">0m</span>';
    return;
  }

  // Convert to days, hours and minutes
  const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
  const diffHours = Math.floor((diffMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

  // Update days display
  const daysText = diffDays === 1 ? 'day' : 'days';
  document.getElementById('appt-duration-days').textContent = `${diffDays} ${daysText}`;

  // Update time display with styled elements
  const hoursText = diffHours === 1 ? 'h' : 'h';
  const minutesText = diffMinutes === 1 ? 'm' : 'm';
  document.getElementById('appt-duration-time').innerHTML = `<span class="hours">${diffHours}${hoursText}</span><span class="minutes">${diffMinutes}${minutesText}</span>`;
}

// Add event listeners for time inputs
function initializeDurationCalculator() {
  const timeInputs = ['appt-from-date', 'appt-to-date', 'appt-from-hour', 'appt-from-minute', 'appt-to-hour', 'appt-to-minute'];
  timeInputs.forEach(id => {
    const element = document.getElementById(id);
    if (element) {
      element.addEventListener('input', calculateDuration);
      element.addEventListener('change', calculateDuration);
    }
  });

  // Add event listeners for increment buttons
  const incrementButtons = document.querySelectorAll('.appointment-modal-timeinc');
  incrementButtons.forEach(button => {
    button.addEventListener('click', function() {
      const target = this.getAttribute('data-target');
      const increment = parseInt(this.getAttribute('data-increment'));
      
      const hourInput = document.getElementById(`appt-${target}-hour`);
      const minuteInput = document.getElementById(`appt-${target}-minute`);
      
      let currentHour = parseInt(hourInput.value) || 0;
      let currentMinute = parseInt(minuteInput.value) || 0;
      
      // Add increment to minutes
      currentMinute += increment;
      
      // Handle hour overflow
      while (currentMinute >= 60) {
        currentMinute -= 60;
        currentHour += 1;
      }
      
      // Handle day overflow (24-hour format)
      if (currentHour >= 24) {
        currentHour = 0;
        // You could add logic here to increment the date if needed
      }
      
      hourInput.value = currentHour;
      minuteInput.value = currentMinute;
      
      calculateDuration();
    });
  });

  // Initial calculation
  calculateDuration();
}

// Initialize when modal opens
if (openModalBtn) {
  openModalBtn.addEventListener('click', () => {
    setTimeout(initializeDurationCalculator, 100);
  });
}

// Also initialize if modal is already visible
if (modal && modal.style.display !== 'none') {
  initializeDurationCalculator();
}

// Tab switching logic
const tabButtons = document.querySelectorAll('.modal-tab');
const tabContents = document.querySelectorAll('.modal-tab-content');
tabButtons.forEach(btn => {
  btn.addEventListener('click', function() {
    // Remove active from all
    tabButtons.forEach(b => b.classList.remove('active'));
    // Hide all contents
    tabContents.forEach(c => c.style.display = 'none');
    // Activate clicked
    this.classList.add('active');
    const tab = this.getAttribute('data-tab');
    const content = document.getElementById('tab-' + tab);
    if (content) content.style.display = 'block';
  });
});

// Sync Appts for Bay tab fields with main form
function syncApptsForBayTab() {
  // Status
  const statusSelect = document.getElementById('appt-status');
  const statusValue = statusSelect ? statusSelect.value : '-';
  document.querySelector('#appt-bay-table-status .appt-bay-table-status-badge').textContent = statusValue;

  // Time (hours and minutes with AM/PM)
  function formatAMPM(h, m) {
    let hour = parseInt(h, 10);
    let minute = m.padStart(2, '0');
    let ampm = hour >= 12 ? 'pm' : 'am';
    hour = hour % 12;
    if (hour === 0) hour = 12;
    return `${hour.toString().padStart(2, '0')}:${minute}${ampm}`;
  }
  const fromHour = document.getElementById('appt-from-hour').value.padStart(2, '0');
  const fromMinute = document.getElementById('appt-from-minute').value.padStart(2, '0');
  const toHour = document.getElementById('appt-to-hour').value.padStart(2, '0');
  const toMinute = document.getElementById('appt-to-minute').value.padStart(2, '0');
  let timeText = '-';
  if (fromHour && fromMinute && toHour && toMinute) {
    timeText = `${formatAMPM(fromHour, fromMinute)} - ${formatAMPM(toHour, toMinute)}`;
  }
  document.querySelector('#appt-bay-table-time .appt-bay-table-time-text').textContent = timeText;

  // Duration
  const days = document.getElementById('appt-duration-days').textContent;
  const time = document.getElementById('appt-duration-time').textContent;
  document.querySelector('#appt-bay-table-duration .appt-bay-table-duration-badge').textContent = `${days} ${time}`;

  // Description
  const desc = document.getElementById('appt-description-input').value;
  const descSpan = document.querySelector('#appt-bay-table-description .appt-bay-table-description-text');
  if (desc && desc.trim() !== '') {
    descSpan.textContent = desc;
    descSpan.style.color = '#22223b';
    descSpan.style.fontStyle = 'normal';
  } else {
    descSpan.textContent = '-';
    descSpan.style.color = '#6b7280';
    descSpan.style.fontStyle = 'italic';
  }
}

// Update Appts for Bay tab whenever main form changes
function setupApptsForBaySync() {
  function getTimeString() {
    const fromHour = String(document.getElementById('appt-from-hour').value).padStart(2, '0');
    const fromMinute = String(document.getElementById('appt-from-minute').value).padStart(2, '0');
    const toHour = String(document.getElementById('appt-to-hour').value).padStart(2, '0');
    const toMinute = String(document.getElementById('appt-to-minute').value).padStart(2, '0');
    return `${fromHour}:${fromMinute}am - ${toHour}:${toMinute}am`;
  }
  function getDurationString() {
    return document.getElementById('appt-duration-days').textContent + ' ' + document.getElementById('appt-duration-time').textContent;
  }
  function update() {
    const time = getTimeString();
    const duration = getDurationString();
    const status = document.getElementById('appt-status').value;
    const description = document.getElementById('appt-description-input').value;
    updateApptsForBayTable(time, duration, status, description);
  }
  [
    'appt-from-hour', 'appt-from-minute', 'appt-to-hour', 'appt-to-minute',
    'appt-duration-days', 'appt-duration-time', 'appt-status', 'appt-description-input'
  ].forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.addEventListener('input', update);
      el.addEventListener('change', update);
    }
  });
  // Also update on duration calculation
  document.getElementById('appt-from-date').addEventListener('change', update);
  document.getElementById('appt-to-date').addEventListener('change', update);
  // Initial update
  update();
}
setupApptsForBaySync();

// Show New Doc modal when New Doc button is clicked
const newDocBtn = document.querySelector('.modal-action-btn:not(.primary):not(.danger)');
const newDocModal = document.getElementById('newDocModal');
const newDocBackdrop = document.querySelector('.newdoc-modal-backdrop');
if (newDocBtn && newDocModal) {
  newDocBtn.addEventListener('click', function(e) {
    e.preventDefault();
    newDocModal.style.display = 'flex';
  });
}
// Hide modal on Cancel or backdrop click
['newdoc-cancel', 'newDocModal', 'newdoc-modal-backdrop'].forEach(id => {
  const el = document.getElementById(id) || document.querySelector('.'+id);
  if (el) {
    el.addEventListener('click', function(e) {
      if (e.target === el) newDocModal.style.display = 'none';
    });
  }
});
document.getElementById('newdoc-cancel').addEventListener('click', function() {
  newDocModal.style.display = 'none';
});
// Redirects
if (document.getElementById('newdoc-estimate')) {
  document.getElementById('newdoc-estimate').onclick = function() { window.location.href = 'estimates.php'; };
}
if (document.getElementById('newdoc-jobsheet')) {
  document.getElementById('newdoc-jobsheet').onclick = function() { window.location.href = 'job-sheets.php'; };
}
if (document.getElementById('newdoc-invoice')) {
  document.getElementById('newdoc-invoice').onclick = function() { window.location.href = 'invoices.php'; };
}

// Show Repetition Modal when 'New Repetition' button is clicked in the action bar
const openRepetitionModalBtn = document.getElementById('openRepetitionModal');
const repetitionModal = document.getElementById('repetitionModal');
if (openRepetitionModalBtn && repetitionModal) {
  openRepetitionModalBtn.addEventListener('click', function(e) {
    e.preventDefault();
    repetitionModal.style.display = 'flex';
  });
}
// Hide modal on backdrop click
const repetitionBackdrop = document.querySelector('.repetition-modal-backdrop');
if (repetitionBackdrop) {
  repetitionBackdrop.addEventListener('click', function() {
    repetitionModal.style.display = 'none';
  });
}
// Tab switching logic
const repTabs = document.querySelectorAll('.repetition-tab');
const repTabContents = document.querySelectorAll('.repetition-tab-content');
repTabs.forEach(tab => {
  tab.addEventListener('click', function() {
    repTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    const tabName = tab.getAttribute('data-tab');
    repTabContents.forEach(content => {
      content.style.display = (content.getAttribute('data-content') === tabName) ? 'block' : 'none';
    });
  });
});
// Stop condition toggles (Daily tab example, repeat for others)
function setupStopToggles(suffix) {
  const afterRadio = document.getElementById('stop-after-radio'+suffix);
  const onRadio = document.getElementById('stop-on-radio'+suffix);
  const onDate = document.getElementById('stop-on-date'+suffix);
  if (afterRadio && onRadio && onDate) {
    afterRadio.addEventListener('change', function() {
      if (afterRadio.checked) onDate.disabled = true;
    });
    onRadio.addEventListener('change', function() {
      if (onRadio.checked) onDate.disabled = false;
    });
    // When user clicks the date input, auto-select the 'Stop on' radio and enable input
    onDate.addEventListener('focus', function() {
      onRadio.checked = true;
      onDate.disabled = false;
    });
    // Also allow clicking the date input's container (for better UX)
    onDate.addEventListener('mousedown', function() {
      onRadio.checked = true;
      onDate.disabled = false;
    });
  }
}
setupStopToggles('');
setupStopToggles('-week');
setupStopToggles('-month');
setupStopToggles('-year');
// Create Repetitions button logic (example: alert settings)
function addRepetitionsToTable(repetitions) {
  const tbody = document.getElementById('repetitions-table-body');
  tbody.innerHTML = '';
  repetitions.forEach(rep => {
    const tr = document.createElement('tr');
    // Status badge class
    let statusClass = 'status-badge';
    const s = rep.status.toLowerCase();
    if (s.includes('pending')) statusClass += ' pending';
    else if (s.includes('complete')) statusClass += ' complete';
    else if (s.includes('cancel')) statusClass += ' cancelled';
    else if (s.includes('review')) statusClass += ' review';
    else if (s.includes('urgent')) statusClass += ' urgent';
    else if (s.includes('service')) statusClass += ' service';
    else if (s.includes('auth')) statusClass += ' auth';
    else if (s.includes('cancellation')) statusClass += ' cancellation';
    tr.innerHTML = `
      <td>${rep.date}</td>
      <td>${rep.time}</td>
      <td><span style="background:#e0f7ef; color:#059669; font-weight:700; border-radius:8px; padding:4px 12px; font-size:1em;">${rep.duration}</span></td>
      <td><span class="${statusClass}">${rep.status}</span></td>
      <td><span style="color:#6b7280; font-style:italic;">${rep.description}</span></td>
    `;
    tbody.appendChild(tr);
  });
}
// Store repetitions in memory for this session
let repetitionsData = [];
function generateRepetitions(pattern, startDate, fromTime, toTime, duration, status, description, count) {
  // pattern: 'daily', 'weekly', 'monthly', 'yearly'
  // startDate: 'YYYY-MM-DD', fromTime/toTime: {hour, minute}, duration: string, status: string, description: string, count: int
  const reps = [];
  let date = new Date(startDate);
  for (let i = 0; i < count; i++) {
    // Format date as dd/mm/yyyy
    const d = String(date.getDate()).padStart(2, '0');
    const m = String(date.getMonth()+1).padStart(2, '0');
    const y = date.getFullYear();
    const dateStr = `${d}/${m}/${y}`;
    // Format time as 07:00am ~ 08:00am
    const fromH = String(fromTime.hour).padStart(2, '0');
    const fromM = String(fromTime.minute).padStart(2, '0');
    const toH = String(toTime.hour).padStart(2, '0');
    const toM = String(toTime.minute).padStart(2, '0');
    const fromAMPM = fromTime.hour < 12 ? 'am' : 'pm';
    const toAMPM = toTime.hour < 12 ? 'am' : 'pm';
    const timeStr = `${fromH}:${fromM}${fromAMPM} ~ ${toH}:${toM}${toAMPM}`;
    reps.push({
      date: dateStr,
      time: timeStr,
      duration: duration,
      status: status,
      description: description
    });
    // Increment date
    if (pattern === 'daily') date.setDate(date.getDate() + 1);
    else if (pattern === 'weekly') date.setDate(date.getDate() + 7);
    else if (pattern === 'monthly') date.setMonth(date.getMonth() + 1);
    else if (pattern === 'yearly') date.setFullYear(date.getFullYear() + 1);
  }
  return reps;
}
// Hook into repetition creation buttons
function setupRepetitionCreateBtn(tab, repeatId, afterId, onId, afterRadioId, onRadioId, pattern) {
  const btn = document.getElementById('create-repetitions'+tab);
  if (btn) {
    btn.addEventListener('click', function() {
      // Get values
      const repeat = parseInt(document.getElementById(repeatId).value) || 1;
      const after = parseInt(document.getElementById(afterId).value) || 1;
      const on = document.getElementById(onId).value;
      const afterRadio = document.getElementById(afterRadioId).checked;
      const onRadio = document.getElementById(onRadioId).checked;
      // Get from/to time and status/description from modal
      const fromDate = document.getElementById('appt-from-date').value;
      const fromHour = parseInt(document.getElementById('appt-from-hour').value) || 0;
      const fromMinute = parseInt(document.getElementById('appt-from-minute').value) || 0;
      const toHour = parseInt(document.getElementById('appt-to-hour').value) || 0;
      const toMinute = parseInt(document.getElementById('appt-to-minute').value) || 0;
      const status = document.getElementById('appt-status').value;
      const description = document.getElementById('appt-description-input').value;
      // Duration
      const days = document.getElementById('appt-duration-days').textContent;
      const time = document.getElementById('appt-duration-time').textContent;
      const duration = `${days} ${time}`.replace(/\s+/g, ' ').trim();
      // Determine count
      let count = 1;
      if (afterRadio) count = after;
      else if (onRadio && on) {
        // Calculate number of repetitions until 'on' date
        let start = new Date(fromDate);
        let end = new Date(on.split('/').reverse().join('-'));
        count = 0;
        while (start <= end && count < 100) {
          count++;
          if (pattern === 'daily') start.setDate(start.getDate() + repeat);
          else if (pattern === 'weekly') start.setDate(start.getDate() + 7 * repeat);
          else if (pattern === 'monthly') start.setMonth(start.getMonth() + repeat);
          else if (pattern === 'yearly') start.setFullYear(start.getFullYear() + repeat);
        }
      }
      // Generate repetitions
      const reps = generateRepetitions(
        pattern,
        fromDate,
        {hour: fromHour, minute: fromMinute},
        {hour: toHour, minute: toMinute},
        duration,
        status,
        description,
        count
      );
      repetitionsData = reps;
      addRepetitionsToTable(repetitionsData);
      // Close modal
      repetitionModal.style.display = 'none';
    });
  }
}
setupRepetitionCreateBtn('', 'repeat-every', 'stop-after-count', 'stop-on-date', 'stop-after-radio', 'stop-on-radio', 'daily');
setupRepetitionCreateBtn('-week', 'repeat-every-week', 'stop-after-count-week', 'stop-on-date-week', 'stop-after-radio-week', 'stop-on-radio-week', 'weekly');
setupRepetitionCreateBtn('-month', 'repeat-every-month', 'stop-after-count-month', 'stop-on-date-month', 'stop-after-radio-month', 'stop-on-radio-month', 'monthly');
setupRepetitionCreateBtn('-year', 'repeat-every-year', 'stop-after-count-year', 'stop-on-date-year', 'stop-after-radio-year', 'stop-on-radio-year', 'yearly');

function setupCustomDatePicker(inputId, radioId) {
  var input = document.getElementById(inputId);
  var radio = document.getElementById(radioId);
  if (input && radio) {
    flatpickr(input, {
      dateFormat: "d/m/Y",
      disableMobile: true,
      onOpen: function() {
        radio.checked = true;
        input.disabled = false;
      },
      onChange: function() {
        radio.checked = true;
        input.disabled = false;
      }
    });
    // Also enable on focus/mousedown for fallback
    input.addEventListener('focus', function() {
      radio.checked = true;
      input.disabled = false;
    });
    input.addEventListener('mousedown', function() {
      radio.checked = true;
      input.disabled = false;
    });
  }
}
setupCustomDatePicker('stop-on-date', 'stop-on-radio');
setupCustomDatePicker('stop-on-date-week', 'stop-on-radio-week');
setupCustomDatePicker('stop-on-date-month', 'stop-on-radio-month');
setupCustomDatePicker('stop-on-date-year', 'stop-on-radio-year');

// Enhance Appts for Bay table row rendering (unified with Repetitions table)
function updateApptsForBayTable(time, duration, status, description) {
  const timeCell = `<i class="fas fa-clock appt-time-icon"></i> <span>${time}</span>`;
  const durationCell = `<span class="duration-badge">${duration}</span>`;
  let statusClass = 'status-badge';
  const s = status.toLowerCase();
  if (s.includes('pending')) statusClass += '';
  else if (s.includes('complete')) statusClass += ' complete';
  else if (s.includes('cancel')) statusClass += ' cancelled';
  else if (s.includes('review')) statusClass += '';
  else if (s.includes('urgent')) statusClass += ' urgent';
  else if (s.includes('service')) statusClass += ' service';
  else if (s.includes('auth')) statusClass += ' auth';
  else if (s.includes('cancellation')) statusClass += ' cancellation';
  const statusCell = `<span class="${statusClass}">${status.toUpperCase()}</span>`;
  const descriptionCell = `<span class="description-text">${description}</span>`;
  document.getElementById('appt-bay-table-time').innerHTML = timeCell;
  document.getElementById('appt-bay-table-duration').innerHTML = durationCell;
  document.getElementById('appt-bay-table-status').innerHTML = statusCell;
  document.getElementById('appt-bay-table-description').innerHTML = descriptionCell;
}

// Show Link to Doc modal when Link to Doc button is clicked
const linkDocBtn = document.querySelector('.modal-action-btn i.fa-link')?.parentElement;
const linkDocModal = document.getElementById('linkDocModal');
if (linkDocBtn && linkDocModal) {
  linkDocBtn.addEventListener('click', function(e) {
    e.preventDefault();
    linkDocModal.style.display = 'flex';
  });
}
// Hide modal on Cancel or backdrop click
const linkDocBackdrop = document.querySelector('.linkdoc-modal-backdrop');
document.getElementById('linkdoc-cancel').addEventListener('click', function() {
  linkDocModal.style.display = 'none';
});
if (linkDocBackdrop) {
  linkDocBackdrop.addEventListener('click', function() {
    linkDocModal.style.display = 'none';
  });
}
// Link button (for now, just close modal or show alert)
document.getElementById('linkdoc-link').addEventListener('click', function() {
  // You can add your linking logic here
  linkDocModal.style.display = 'none';
});

// Veh History tab switching (show correct table)
document.querySelectorAll('.vehhistory-tab').forEach(tab => {
  tab.addEventListener('click', function() {
    document.querySelectorAll('.vehhistory-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    // Show/hide tables
    document.querySelector('.vehhistory-table-docs').style.display = tab.dataset.tab === 'docs' ? 'table' : 'none';
    document.querySelector('.vehhistory-table-advisors').style.display = tab.dataset.tab === 'advisors' ? 'table' : 'none';
    document.querySelector('.vehhistory-table-labour').style.display = tab.dataset.tab === 'labour' ? 'table' : 'none';
    document.querySelector('.vehhistory-table-parts').style.display = tab.dataset.tab === 'parts' ? 'table' : 'none';
    // Add similar logic for other tabs if needed
  });
}); 