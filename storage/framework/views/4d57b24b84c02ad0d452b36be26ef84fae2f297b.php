<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in as <strong>EMPLOYEE</strong>!
                    <br>
                    <br>
                    <h2>Laides</h2>
                    <ul>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($client->username); ?>

                            <form action="<?php echo e(route('employee.message.create')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                                <textarea rows="4" cols="30" name="text"></textarea>
                                <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
                                <input type="hidden" name="employee_id" value="<?php echo e(Auth::id()); ?>">
                                <input type="submit" value="Send">
                            </form>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <br>
                    <br>
                    <h2>Your Discussions</h2>
                    <ul>
                    <?php $__currentLoopData = $employee->discussion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($discussion->client->username); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <h2>Upload Photo</h2>
                    <form action="<?php echo e(route('employee.photo.create')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <input type="file" name="photo">
                        <input type="hidden" name="employee_id" value="1">
                        <input type="hidden" name="private" value="0">
                        <input type="submit" value="Upload">
                    </form>

                    <h2>Your Photos</h2>

                    <?php $__currentLoopData = $employee->employeePhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e($photo->url); ?>" height="200px" width="200px">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>