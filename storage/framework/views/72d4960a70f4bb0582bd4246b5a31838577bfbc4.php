<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('layouts.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
    
<?php if(auth()->guard()->guest()): ?>
    <?php echo $__env->make('layouts.navbars.navs.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH D:\Sem I i II MGR\Aplikacje Internetowe\xampp\htdocs\eFaktura\resources\views/layouts/navbars/navbar.blade.php ENDPATH**/ ?>