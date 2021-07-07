

<?php $__env->startSection('content'); ?>
<div class="container">
  <h4 class="heading">Create Employee</h4>
  <?php if($errors->any()): ?>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="alert alert-danger" role="alert"><?php echo e($error); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
  <form id="employeeform" action="<?php echo e(route('employees_store')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo e(csrf_field()); ?>

 
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="employee_name">Firstname *</label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="lastname">Lastname *</label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="" required="">
    </div>
  </div>
  <div class="form-row">
     <div class="col-md-4 mb-3">
      <label for="employee_name">Phone</label>
      <input type="text" class="form-control" id="phone" name="phone" value="">
    </div>
    <div class="col-md-4 mb-3">
      <label for="website">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="">
      </select>
    </div>
    </div>
    <div class="form-row">
   <div class="col-md-4 mb-3">
      <label for="company">Company</label>
      <select name="company" id="company" required>
        <option value="">Select Company</option>
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      
    </div>
     </div>
  <div class="form-group">
    
  <button class="btn btn-primary" type="submit">Save</button>
  <button class="btn btn-primary" type="submit" onClick="javascript:history.go(-1);">Cancel</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project_crm\resources\views/employees/create.blade.php ENDPATH**/ ?>