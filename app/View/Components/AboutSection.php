<?php

namespace App\View\Components;

use Closure;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Timeline;
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
   * Method to get all skills from column skills and remove , and return array
   */

    public function getSkillsOne()
    {
        $skills = Profile::all();
        $getSkills = [];
        foreach ($skills as $skill) {
            $getSkills[] = explode(',', $skill->skills);
        }
       return $getSkills;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-section', [
            'courses'   => Timeline::all()->sortByDesc('id')->take(5), // get last 5 courses
            'profile'   => Profile::first(), // profile data
            'about'     => Setting::first(), // section title
            'skills'    => $this->getSkillsOne() // get skills
        ]);
    }
}
