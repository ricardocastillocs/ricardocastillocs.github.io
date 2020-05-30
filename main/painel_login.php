<?php if (!defined('FLUX_ROOT')) exit; ?>
<h4 class="page-header no-margin-top">CONTROL PANEL</h4>
<p class="margin-bottom-15" style="padding-left: 26px;">Manage your account.</p>
<?php if (!$session->isLoggedIn()): ?>
<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="POST" class="no-padding-xs padding-left-20 padding-right-20 margin-bottom-10">
    <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<input type="text" class="form-control input-lg margin-bottom-15" name="username" placeholder="Usuário">
	<input type="password" class="form-control input-lg margin-bottom-30" name="password" placeholder="Senha">
	<button type="submit" class="btn btn-primary pull-right">Login</button>
	<div class="clearfix"></div>
	<a href="<?php echo $this->url('account','resetpass'); ?>" class="text-dark margin-top-10 padding-top-15 help-block border-top-1 border-grey-200 btn-icon-right"><i class="fa fa-unlock"></i> Forgot your Password?</a>
</form>
<?php else: ?>
<a href="<?php echo $this->url('voteforpoints'); ?>"><button style="margin-top: 150px;" type="button" class="btn btn-info btn-lg btn-block">Vote Now</button></a>
<a href="<?php echo $this->url('account','view'); ?>"><button type="button" class="btn btn-primary btn-lg btn-block margin-top-15">My account</button></a>
<?php endif; ?>