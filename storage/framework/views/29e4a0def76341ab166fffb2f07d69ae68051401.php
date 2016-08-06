Click Here to Reset your Password: <br>
<a href="<?php echo e($link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())); ?>"><?php echo e($link); ?></a>