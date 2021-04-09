<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmTableinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id' =>1,
                'name' =>'admin',
                'type' =>'admin',
                'mobile' =>'123456789',
                'email' =>'admin@admin.com',
                'password' =>'$2y$10$Yj9Bgfqt3muwvRclV2.iIewCoQzccOgQRzAsUfMtGvcnJ6thcn9vC',
                'image' =>'',
                'status' =>1,

            ],
            [
                'id' =>2,
                'name' =>'jone',
                'type' =>'sub_admin',
                'mobile' =>'123456789',
                'email' =>'jone@admin.com',
                'password' =>'$2y$10$Yj9Bgfqt3muwvRclV2.iIewCoQzccOgQRzAsUfMtGvcnJ6thcn9vC',
                'image' =>'',
                'status' =>1,

            ],
        ];

        // foreach($adminRecords as $key => $record){
        //     \App\Admin::create($record);
        // }
        DB::table('admins')->insert($adminRecords);
    }
}
