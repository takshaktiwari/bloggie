<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
                    'option'		=>	'site_name_lg',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'site_name_md',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'site_name_sm',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'tag_line',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_lg',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_500',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_400',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_300',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_200',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_100',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'logo_50',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'favicon',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'email',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'email_2',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'phone',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'phone_2',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'whatsapp_no',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'facebook_page',
    				'option_value'	=>	null
                ]);

        DB::table('settings')->insert([
                    'option'        =>  'instagram_page',
                    'option_value'  =>  null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'twitter_page',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'pinterest_page',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'reddit_page',
    				'option_value'	=>	null
                ]);

       	DB::table('settings')->insert([
                    'option'		=>	'youtube_page',
    				'option_value'	=>	null
                ]);
    }
}
