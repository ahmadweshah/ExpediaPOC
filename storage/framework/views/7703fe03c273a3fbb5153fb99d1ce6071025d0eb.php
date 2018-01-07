<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expedia</title>

        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/jquery-ui.css')); ?>"/>
    </head>

    <body>
        <div class="container-fluid">

            
            <div class="row">
                <?php echo $__env->make('partials/menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            
            <div class="row rowheader">
                <?php echo $__env->make('partials/logo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            
            <div class="col-xs-12">
                <hr>
            </div>

            
            <div class="row row-centered">

                
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?php echo $__env->make('partials/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                
                <div class="col-md-9 col-sm-12 col-xs-12" id='mainContent'>

                    
                    <?php if(!empty($errors->all())): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(!empty($searchString)): ?>
                        <div class="alert alert-info">
                            <?php echo e($searchString); ?>

                        </div>
                    <?php endif; ?>



                    
                    <?php echo $__env->renderEach('partials/hotel', $hotels, 'hotel'); ?>
                </div>
            </div>

            
            <?php echo $__env->make('partials/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

        <script src="<?php echo e(URL::asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/bootstrap.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/jquery-ui.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/spin.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/sidebar.js')); ?>"></script>
    </body>
</html>
