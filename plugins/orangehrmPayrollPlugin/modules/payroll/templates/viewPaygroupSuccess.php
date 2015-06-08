
<?php 
use_javascript(plugin_web_path('orangehrmPayrollPlugin', '/js/viewPayGradesSuccess')); 
?>

<?php if($PaygroupPermissions->canRead()){?>

<div id="jobTitleList">
    <?php include_component('core', 'ohrmList', $parmetersForListCompoment); ?>
</div>
<?php }?>
<!-- Confirmation box HTML: Begins -->
<div class="modal hide" id="deleteConfModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo __('OrangeHRM - Confirmation Required'); ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo __(CommonMessages::DELETE_CONFIRMATION); ?></p>
  </div>
  <div class="modal-footer">
    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="<?php echo __('Ok'); ?>" />
    <input type="button" class="btn reset" data-dismiss="modal" value="<?php echo __('Cancel'); ?>" />
    a 
  </div>
</div>
<!-- Confirmation box HTML: Ends -->


<script type="text/javascript">
    var addPaygroupUrl = '<?php echo url_for('payroll/addPaygroup'); ?>';
</script>