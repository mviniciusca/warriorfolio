<?php

namespace App\View\Components\Contact;

use Closure;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Profile;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact.section', [
            'social_network' => $this->isEmpty(),
            'module' => Module::query()
                ->select(['contact'])
                ->first(),
            'info' => Layout::query()
                ->select([
                    'contact_section_fill',
                    'contact_section_title',
                    'contact_section_subtitle_text',
                    'contact_section_address',
                    'contact_section_email',
                    'contact_section_google_map',
                    'contact_section_google_map',
                    'contact_section_phone'
                ])
                ->first(),
        ]);
    }

    /**
     * Check if any field is empty and return the count of empty fields.
     */
    public function isEmpty(): int
    {
        $model = Profile::query()
            ->select([
                'facebook',
                'twitter',
                'instagram',
                'linkedin',
                'youtube',
                'github',
                'medium',
                'devto',
                'twitch',
                'dribbble'
            ])
            ->first();
        $count = 0;
        foreach ($model->toArray() as $key => $value) {
            if (!empty($value)) {
                $count++;
            }
        }
        return $count;
    }

}
