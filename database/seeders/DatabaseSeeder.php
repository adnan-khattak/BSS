<?php

namespace Database\Seeders;

use App\Models\Classs;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->getSubjects();
        $this->getClasses();

        // \App\Models\Subject::factory(5)->create();
        // \App\Models\Teacher::factory(2)->create();
        // \App\Models\Classs::factory(2)->create();
        // \App\Models\Student::factory(5)->create();
    }

    public function getSubjects()
    {
        $Subjectjson = file_get_contents(database_path() . '/subjects.json');
        $subjects = json_decode($Subjectjson, true)['subjects'];

        foreach ($subjects as $subject) {
            Subject::firstOrCreate($subject);
        }
    }

    public function getClasses()
    {
        $Classjson = file_get_contents(database_path() . '/classes.json');

        $classes = json_decode($Classjson, true)['classes'];

        foreach ($classes as $classs) {
            Classs::firstOrCreate($classs);
        }
    }
}
