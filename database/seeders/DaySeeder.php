<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\DayTranslation;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('days')->delete();
        DB::table('day_translations')->delete();
        $lang = Language::where('code' ,'ar')->first();
        $langEn = Language::where('code' ,'en')->first();



        Day::create()->translations()->create([
            'name' => 'السبت',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الاحد',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الاثنين',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الثلاثاء',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الاربعاء',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الخميس',
            'language_id' => $lang->id
        ]);

        Day::create()->translations()->create([
            'name' => 'الجمعة',
            'language_id' => $lang->id
        ]);



        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'السبت',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'saturday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);

        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الاحد',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Sunday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);

        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الاثنين',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Monday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);

        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الثلاثاء',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Tuesday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);


        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الاربعاء',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Wednesday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);


        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الخميس',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Thursday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);


        // DayTranslation::create([
        //     'language_id' => $lang->id,
        //     'name' => 'الجمعة',
        //     'day_id' => (Day::create()->translations()->create([
        //         'name' => 'Friday',
        //         'language_id' => $langEn->id
        //     ]))->id
        // ]);
       

    }
}
