<?php $__env->startSection('title', " | $post->title"); ?>

<?php $__env->startSection('content'); ?>
 <div class="row">
     <div class="col-md-8 col-md-offset-2">
      <h1><?php echo e($post->title); ?></h1>
       <p><?php echo e($post->body); ?></p>
       <p><?php echo e($post->category->name); ?></p>
     	
     </div>

 </div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>