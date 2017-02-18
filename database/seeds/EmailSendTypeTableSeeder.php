<?php

use Illuminate\Database\Seeder;

class EmailSendTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('email_send_types')->delete();
        $data = [
        	['type' => 'log'],
        	['type' => 'smtp'],
        	['type' => 'mailgun']
        ];
        \DB::table('email_send_types')->insert($data);
    }
}
