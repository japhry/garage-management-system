<?php
require_once 'config.php';
?>
<div class="mrc-notes-widget mrc-widget">
  <div class="mrc-widget-header mrc-notes-tabs">
    <button class="mrc-notes-tab active" data-tab="global">Global Notes</button>
    <button class="mrc-notes-tab" data-tab="user">User Notes</button>
  </div>
  <div class="mrc-notes-content">
    <textarea class="mrc-notes-textarea mrc-notes-global" placeholder="Write global notes here..."></textarea>
    <textarea class="mrc-notes-textarea mrc-notes-user" placeholder="Write user notes here..." style="display:none;"></textarea>
  </div>
</div> 