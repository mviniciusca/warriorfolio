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
                'blocks'     => '[{"data": {"id": null}, "type": "design.background"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}, {"data": {"vertical_space": "xs"}, "type": "design.empty-separator"}, {"data": {"is_active": true, "is_center": true, "bumper_tag": "New", "bumper_icon": null, "bumper_link": null, "bumper_role": "primary", "is_animated": true, "bumper_title": "Warriorfolio is here 🎉 Let\'s fly now! 🚀", "bumper_target": "_self"}, "type": "component.info-bumper"}, {"data": {"active": null}, "type": "hero"}, {"data": {"slug": "whats-new", "title": "What\'s new?", "subtitle": null, "is_active": true, "module_name": "whats-new", "tailwind_css_attributes": ["text-primary-500"]}, "type": "component.module"}, {"data": {"features": [{"icon": "sparkles", "link": null, "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.\\n", "is_new_window": false}, {"icon": "heart", "link": null, "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.", "is_new_window": false}, {"icon": "logo-dribbble", "link": null, "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.", "is_new_window": false}], "is_active": true, "is_center": true}, "type": "component.feature-list"}, {"data": {"vertical_space": "xs"}, "type": "design.empty-separator"}, {"data": {"active": null}, "type": "courses"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "projects"}, {"data": {"active": null}, "type": "client"}, {"data": {"active": null}, "type": "newsletter"}, {"data": {"color": "blur"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "contact"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}]',
            ]);
    }
}
