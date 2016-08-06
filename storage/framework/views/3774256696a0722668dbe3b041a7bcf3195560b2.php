<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8">
			<h1><?php echo e($post->title); ?></h1>
			
			<p class="lead"><?php echo e($post->body); ?></p>
		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="<?php echo e(url('blog/'.$post->slug)); ?>"><?php echo e(url('blog/'.$post->slug)); ?></a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p><?php echo e(date('M j, Y h:ia', strtotime($post->created_at))); ?></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p><?php echo e(date('M j, Y h:ia', strtotime($post->updated_at))); ?></p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<?php echo Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')); ?>

					</div>

					<div class="col-sm-6">
					<?php echo Form::open(['route'=>['posts.destroy',$post->id],"method"=>'DELETE']); ?>


					<?php echo Form::submit('Delete',['class'=>'btn btn-danger btn-block']); ?> 
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php echo e(Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing'])); ?>

					</div>
				</div>
					
				</div>

			

			</div>
		</div>
	</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>