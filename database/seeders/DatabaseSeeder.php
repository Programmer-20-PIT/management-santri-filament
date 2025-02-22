<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Activity;
use App\Models\Assessment;
use App\Models\Attachment;
use App\Models\Attendence;
use App\Models\Permission;
use App\Models\Departement;
use App\Models\Kelas;
use App\Models\ProgramStage;
use App\Models\SantriFamily;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttachmentSantri;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'EL',
            'email' => 'ghifariakun@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('1')
        ]);

        $dataUser = User::factory(100)->create();
        $dataKelas = Kelas::factory(5)->create();
        $dataProgramStage = ProgramStage::factory(10)->create();
        $dataDepartments = Departement::factory(5)->create();
        $dataSantriFamily = SantriFamily::factory(100)->create();
        $dataLesson = Lesson::factory(100)->create();
        $dataAssessment = Assessment::factory(100)->create();
        $dataPermissions = Permission::factory(250)->create();
        $dataActivity = Activity::factory(400)->create();
        $dataAttendence = Attendence::factory(500)->create();
        $dataAttachment = Attachment::factory(100)->create();
        $dataAttachmentSantri = AttachmentSantri::factory(100)->create();

        // Update users foreign keys
        foreach ($dataUser as $data) {
            $data->update([
                'kelas_id' => Kelas::all()->random()->id,
                'department_id' => Departement::all()->random()->id,
                'program_stage_id' => ProgramStage::all()->random()->id
            ]);
        }

        // Update kelas foreign keys
        foreach ($dataKelas as $data) {
            $data->update([
                'mentor_id' => User::all()->random()->id,
            ]);
        }

        // Update departments foreign keys
        foreach ($dataDepartments as $data) {
            $data->update([
                'leader_id' => User::all()->random()->id,
                'co_leader_id' => User::all()->random()->id
            ]);
        }

        // Update permissions foreign keys
        foreach ($dataPermissions as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
            ]);
        }

        // Update lessons foreign keys
        foreach ($dataLesson as $data) {
            $data->update([
                'kelas_id' => Kelas::all()->random()->id,
            ]);
        }

        // Update assessments foreign keys
        foreach ($dataAssessment as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'lesson_id' => Lesson::all()->random()->id,
            ]);
        }

        // Update attendences foreign keys
        foreach ($dataAttendence as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'activity_id' => Activity::all()->random()->id,
            ]);
        }

        // Update attachment_santris foreign keys
        foreach ($dataAttachmentSantri as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'attachment_id' => Attachment::all()->random()->id,
            ]);
        }

        // Update santri_families foreign keys
        foreach ($dataSantriFamily as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
            ]);
        }
    }
}
