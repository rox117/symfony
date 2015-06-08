
<?php 
use_javascript('jquery/jquery.form');
use_javascript(plugin_web_path('orangehrmPayrollPlugin', 'js/payGradeSuccess')); 
?>

<?php if($PaygroupPermissions->canRead()){ ?>
<div id="payGrade" class="box">
    
    <div class="head">
        <h1 id="payGradeHeading"><?php echo $title; ?></h1>
    </div>
    
    <div class="inner">
        
        <?php include_partial('global/flash_messages', array('prefix' => 'paygrade')); ?>

        <form name="frmPayGrade" id="frmPayGrade" method="post" action="<?php echo url_for('payroll/addPaygroup'); ?>" >
           
            <fieldset>

                <ol>
                    
                    <?php echo $form->render(); ?>
                    
                    <li class="required">
                        <em>*</em> <?php echo __(CommonMessages::REQUIRED_FIELD); ?>
                    </li>
                    
                </ol>

                <p>
                    <?php if(($PaygroupPermissions->canCreate() && empty($paygroupid)) || ($PaygroupPermissions->canUpdate() && ($paygroupid > 0))){?>
                    <input type="button" class="addbutton" name="btnSave" id="btnSave" value="<?php echo __("Save"); ?>"/>
                    <?php }?>
                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="<?php echo __("Cancel"); ?>"/>
                </p>
                
            </fieldset>

        </form>
        
    </div>

</div>

<?php if ($paygroupid > 0) {
 ?>


<?php } 
}
?>

<script type="text/javascript">
    var payGrades = <?php echo str_replace('&#039;', "'", $form->getPaygroupListAsJson()); ?> ;
    var payGradeList = eval(payGrades);
    var lang_NameRequired = '<?php echo __(ValidationMessages::REQUIRED); ?>';
    var lang_exceed50Charactors = '<?php echo __(ValidationMessages::TEXT_LENGTH_EXCEEDS, array('%amount%' => 50)); ?>';
    var lang_exceed12Charactors = '<?php echo __(ValidationMessages::TEXT_LENGTH_EXCEEDS, array('%amount%' => 10)); ?>';
    var payGradeId = "<?php echo $paygroupid; ?>";
    var lang_edit = "<?php echo __("Edit"); ?>";
    var lang_save = "<?php echo __("Save"); ?>";
    var lang_salaryShouldBeNumeric = '<?php echo __("Should be a positive number"); ?>';
    var lang_validSalaryRange  = '<?php echo __("Should be higher than Minimum Salary"); ?>';
    var lang_uniquePayGradeName  = '<?php echo __(ValidationMessages::ALREADY_EXISTS); ?>';
    var viewPayGradesUrl = "<?php echo url_for("payroll/viewPaygroup"); ?>";
    var lang_typeHint = "<?php echo __("Type for hints") . "..."; ?>";
    var lang_negativeAmount = "<?php echo __("Should be a positive number"); ?>";
    var lang_tooLargeAmount = '<?php echo __("Should be less than %amount%", array("%amount%" => '1000,000,000')); ?>';
</script>
