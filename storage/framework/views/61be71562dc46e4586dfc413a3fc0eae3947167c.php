

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4>Companies</h4>
    <?php if(session('successMsg')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('successMsg')); ?>

    </div>
    <?php endif; ?>
    
    <p><a href="<?php echo e(route('companies_create')); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add New</a></p>
    

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Website</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td scope="row"><?php echo e(($companies->currentpage()-1) * $companies->perpage() + $loop->index + 1); ?></td>
      <td><?php echo e($company->name); ?></td>
      <td><?php echo e($company->email); ?></td>
      <td><?php echo e($company->website); ?></td>
      <td><a class="btn btn-primary btn-raised btn-sm" href=" <?php echo e(route('companies_edit',$company->id)); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      |     
      <form method="POST" id="delete_<?php echo e($company->id); ?>" action = " <?php echo e(route('companies_delete',$company->id)); ?>" style="display:none">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('post')); ?>

      
    </form>
        <button onclick="if(confirm('Are you sure to delete the company? All the associated employees will also be deleted.')) {
        event.preventDefault();
        document.getElementById('delete_<?php echo e($company->id); ?>').submit();
      }
      else
      {
        event.preventDefault();

      }" class="btn btn-danger btn-raised btn-sm" href=" "><i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
      <td></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   
  </tbody>
</table>

<?php echo e($companies->links()); ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project_crm\resources\views/companies/index.blade.php ENDPATH**/ ?>