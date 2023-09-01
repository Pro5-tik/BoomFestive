<?php  
?>
<div class="theme_options">
<div id="theme_optin_body">
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">General</a>
      <a class="nav-link" id="v-pills-header-tab" data-toggle="pill" href="#v-pills-header" role="tab" aria-controls="v-pills-header" aria-selected="false">Header</a>
      <a class="nav-link" id="v-pills-footer-tab" data-toggle="pill" href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="false">Footer</a>
      <a class="nav-link" id="v-pills-background-tab" data-toggle="pill" href="#v-pills-background" role="tab" aria-controls="v-pills-background" aria-selected="false">Background</a>
      <a class="nav-link" id="v-pills-single-post-tab" data-toggle="pill" href="#v-pills-single-post" role="tab" aria-controls="v-pills-single-post" aria-selected="false">Single Post</a>
      <a class="nav-link" id="v-pills-documentation-tab" data-toggle="pill" href="#v-pills-documentation" role="tab" aria-controls="v-pills-documentation" aria-selected="false">Documentation/Help</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
      <?php require_once(get_template_directory() . '/inc/theme-option/general_setting.php');?>
      </div>
      <div class="tab-pane fade" id="v-pills-header" role="tabpanel" aria-labelledby="v-pills-header-tab">
      <?php require_once(get_template_directory() . '/inc/theme-option/header_setting.php');?>

      </div>
      <div class="tab-pane fade" id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-footer-tab">
        <?php require_once(get_template_directory() . '/inc/theme-option/footer_setting.php');?>
      </div>
      <div class="tab-pane fade" id="v-pills-background" role="tabpanel" aria-labelledby="v-pills-background-tab">
      <?php require_once(get_template_directory() . '/inc/theme-option/background_setting.php');?>
      </div>
      <div class="tab-pane fade" id="v-pills-single-post" role="tabpanel" aria-labelledby="v-pills-single-post-tab">This file will be upload after the single post section will be created(Do it)</div>
      <div class="tab-pane fade" id="v-pills-documentation" role="tabpanel" aria-labelledby="v-pills-documentation-tab">It will be uploaded very soon.</div>

    </div>
  </div>
</div>
</div>
</div>
  <?php
 