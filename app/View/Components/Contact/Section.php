<?php

namespace App\View\Components\Contact;

use App\Models\Profile;
use App\Models\Setting;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    use SectionLoader;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->loadSection('contact');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact.section', [
            'social_network' => $this->isEmpty(),
            'data'           => Setting::with(['module', 'layout'])
                ->first(),
        ]);
    }

    /**
     * Check if social network is empty.
     * @return int
     */
    public function isEmpty(): int
    {
        $model = Profile::first(['social']);
        $count = 0;
        foreach ($model->toArray() as $value) {
            if (! empty($value)) {
                $count++;
            }
        }

        return $count;
    }
}
