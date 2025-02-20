<?php

namespace Database\Seeders;

use App\Models\Activities;
use App\Models\Assesment;
use App\Models\Attachment;
use App\Models\AttachmentSantri;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\FinancialRecord;
use App\Models\KelasSantri;
use App\Models\Lessons;
use App\Models\News;
use App\Models\Permission;
use App\Models\ProgramStage;
use App\Models\RaportSantri;
use App\Models\SantriFamily;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataUser = User::factory(10)->create();
        $KelasSantri = KelasSantri::factory(10)->create();
        $Assesment = Assesment::factory(10)->create();
        $Lessons = Lessons::factory(10)->create();
        $ProgramStage = ProgramStage::factory(10)->create();
        $Department = Department::factory(10)->create();
        $RaportSantri = RaportSantri::factory(10)->create();
        $Permission = Permission::factory(10)->create();
        $SantriFamily = SantriFamily::factory(10)->create();
        $Attachment = Attachment::factory(10)->create();
        $News = News::factory(10)->create();
        $FinancialRecord = FinancialRecord::factory(10)->create();
        $Attendance = Attendance::factory(10)->create();
        $Activities = Activities::factory(10)->create();
        $AttachmentSantri = AttachmentSantri::factory(10)->create();
        
        

        foreach ($dataUser as $data) {
            $data->update([
                'kelas_santri_id' => KelasSantri::all()->random()->id,
                'department_id' => Department::all()->random()->id,
                'program_stage_id' => ProgramStage::all()->random()->id,
            ]);
        }


        foreach ($Assesment as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'lesson_id' => Lessons::all()->random()->id,
            ]);
        }

        foreach ($KelasSantri as $data) {
            $data->update([
                'mentor_id' => User::all()->random()->id,
            ]);
        }

        foreach ($Lessons as $data) {
            $data->update([
                'kelas_santri_id' => KelasSantri::all()->random()->id,
            ]);
        }

        foreach ($Department as $data) {
            $data->update([
                'leader_id' => User::all()->random()->id,
                'co_leader_id' => User::all()->random()->id,
            ]);
        }

        foreach ($RaportSantri as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
            ]);
        }

        foreach ($Permission as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
            ]);
        }

        foreach ($SantriFamily as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
            ]);
        }

        foreach ($News as $data) {
            $data->update([
                'author_id' => User::all()->random()->id,
            ]);
        }

        foreach ($Attendance as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'activity_id' => Activities::all()->random()->id,
            ]);
        }

        foreach ($AttachmentSantri as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'attachment_id' => Attachment::all()->random()->id,
            ]);
        }

        foreach ($FinancialRecord as $data) {
            $data->update([
                'accounting_id' => User::all()->random()->id,
            ]);
        }
    }
}
