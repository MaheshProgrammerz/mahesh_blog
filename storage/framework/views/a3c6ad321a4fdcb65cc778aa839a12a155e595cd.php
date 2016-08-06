    <?php $__env->startSection('title' ,'|HomePage'); ?>
    <?php $__env->startSection('content'); ?>

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <?php foreach($posts as $post): ?>
          <div class="post">
            <h3><?php echo e($post->title); ?></h3>
            <h4>Published Date:<?php echo e(date('M j, Y', strtotime($post->created_at))); ?></h4>

            <p><?php echo e(substr($post->body, 0 , 100)); ?> <?php echo e(strlen($post->body)>100 ? "......":""); ?></p>
            <a href="<?php echo e(url('blog/'.$post->slug)); ?>" class="btn btn-primary">Read More</a>
          </div>

          <hr>
        <?php endforeach; ?>
   </div>
        <div class="row">
           <div class="col-md-12">
            <div class="text-center">
              <?php echo e($posts->links()); ?>

            </div>
        </div>
      </div>

      <?php $__env->stopSection(); ?>


<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>