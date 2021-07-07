


<?php $__env->startSection('content'); ?>
<div class="container">
  <h4 class="heading">Create Company</h4>
  <?php if($errors->any()): ?>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="alert alert-danger" role="alert"><?php echo e($error); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
  <form id="companyform" action="<?php echo e(route('companies_store')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo e(csrf_field()); ?>

 
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="company_name">Name *</label>
      <input type="text" class="form-control" id="name" name="name" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="" >
    </div>
     </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="logo">Logo</label>
      <input type="file" class="form-control" name="logo" id="logo" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="website">Website</label>
      
      <input type="text" class="form-control" id="website" name="website">
      </select>
    </div>
    </div>
  <div class="form-group">
    
  <button class="btn btn-primary" type="submit">Save</button>
  <button class="btn btn-primary" type="submit" onClick="javascript:history.go(-1);">Cancel</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project_crm\resources\views/companies/create.blade.php ENDPATH**/ ?>