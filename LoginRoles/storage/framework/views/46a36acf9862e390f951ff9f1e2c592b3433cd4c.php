<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>ADMINISTRATOR</h1>

    <form action="<?php echo e(route('admin.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="date">Date</label><br>
        <input type="date" name="date" id=""><br><br>

        <label for="designation">Designation de pharmacie</label><br>
        <input type="text" name="designation" id=""><br><br>

        <label for="description">Description</label><br>
        <input type="text" name="description" id=""><br><br>

        <button type="submit">Valider</button>
    </form><br><br>

    <a href="<?php echo e(route('pharmacies.index')); ?>">
        <button>Voir</button><br>
    </a><br>

    <table border="2">
        <thead>
            <tr>
                <th>Date</th>
                <th>Désignation Pharmacie</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            
        </thead>
        <tbody>
            <?php $__currentLoopData = $pharmacies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pharmacie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($pharmacie->date->format('Y-m-d')); ?> </td>
                <td> <?php echo e($pharmacie->designation); ?> </td>
                <td> <?php echo e($pharmacie->description); ?> </td>
                <td>
                    <form action="<?php echo e(route('pharmacies.destroy', ['pharmacy' => $pharmacie->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                            this.closest(\'form\').submit();']]); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                            this.closest(\'form\').submit();']); ?>
            <?php echo e(__('Log Out')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </form>
    
</body>
</html><?php /**PATH /home/omar/Bureau/LaravelLoginRoles/LoginRoles/resources/views/admin/index.blade.php ENDPATH**/ ?>