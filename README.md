# Brains Science School

Brains Science School is a system that has been developed for a secondary school. This system developed will help the school to manage submission of assignment between teachers and students.

The objectives of this new system are to improve the submission of assignment. Besides, to provide a suitable platform for students and facilitate students to submit assignments. Moreover, to make it easier for teachers to store assignment submission data that has been submitted by students. Furthemore, to facilitate teachers to assign assignments to students in various formats such as Pdf, Microsoft Word and others. Next, to facilitate teachers and student to use only one system medium and do not need to use other applications. Lastly, to train and introduce students to how to use technology easily and correctly.


## How to install

- Clone the repository with __git clone__ or download zip file
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has initial data)
- Run __php artisan serve__
- That's it: launch the main URL
