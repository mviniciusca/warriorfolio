<?php

namespace App\View\Components;

use Closure;
use App\Models\Profile;
use App\Models\Timeline;
use App\Models\PagesSettings;
use App\Models\Skill;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AboutSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

  /**
   * Method to get all skills from column skill_one and remove , and return array
   */

    public function getSkillsOne()
    {
        $skills = Skill::all();
        $skillsOne = [];
        foreach ($skills as $skill) {
            $skillsOne[] = explode(',', $skill->skill_one);
        }
       return $skillsOne;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-section', [
            'courses'           => Timeline::all()->sortByDesc('id')->take(5),
            'profile'           => Profile::first(),
            'about_title'       => PagesSettings::first()->about_title,
            'about_description' => PagesSettings::first()->about_description,
            'skills'            =>  $this->getSkillsOne() // get skills from column skill_one

        ]);
    }
}
