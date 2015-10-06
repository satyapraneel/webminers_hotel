<?php if (!empty($message)): ?>
    <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
<?php endif; ?>
<div class="container">
    <h2>login</h2>
    <?php echo form_open("admin/login"); ?>

    <p>
        Email Id:
        <?php echo form_input($email_id); ?>
    </p>

    <p>
        <?php echo lang('login_password_label', 'password'); ?>
        <?php echo form_input($password); ?>
    </p>

    <p>
        <?php echo lang('login_remember_label', 'remember'); ?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
    </p>


    <p><?php echo form_submit('submit', lang('login_submit_btn')); ?></p>

    <?php echo form_close(); ?>

    <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
</div>