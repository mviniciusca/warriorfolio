<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')
            ->insert([
                'layout'     => 'default',
                'title'      => 'Landing Page',
                'slug'       => '/',
                'created_at' => now(),
                'updated_at' => now(),
                'blocks'     => '[{"data": {"vertical_space": "xs"}, "type": "design.empty-separator"}, {"data": {"is_active": true, "is_center": true, "bumper_tag": "New", "bumper_icon": null, "bumper_link": null, "bumper_role": "primary", "is_animated": true, "bumper_title": "Warriorfolio is here 🎉 Let\'s fly now! 🚀", "bumper_target": "_self"}, "type": "component.info-bumper"}, {"data": {"active": null}, "type": "hero"},{"data": {"vertical_space": "xs"}, "type": "design.empty-separator"}, {"data": {"active": null}, "type": "courses"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "projects"}, {"data": {"active": null}, "type": "client"}, {"data": {"active": null}, "type": "newsletter"}, {"data": {"color": "blur"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "contact"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}]',
            ]);
    }
}
