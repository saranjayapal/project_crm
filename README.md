Project CRM

URL: http://localhost/project_crm/
1. Run http://localhost/create_symlink to create the symlink for storage/app/public to public/storage
2. Seeder file to create admin user is <project_folder>/seeders/AdminUserSeeder.php
3. Run the following command to run the Seeder that creates admin user.
php artisan db:seed --class=AdminUserSeeder
