<?php

namespace App\View\Components\About;

use App\Models\Course;
use App\Models\Section as SectionModel;
use App\Models\Setting;
use App\Models\Slideshow;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    public $button_header;

    public $button_url;

    public $is_filled;

    public $is_section_filled_inverted;

    public $with_padding;

    public $module_name;

    public $is_active;

    public $is_coupled;

    public $is_heading_visible;

    public function __construct()
    {
        $module = SectionModel::where('slug', 'about-me')
            ->sole();
        $this->button_header = $module->content['button_header'] ?? null;
        $this->button_url = $module->content['button_url'] ?? null;
        $this->is_filled = $module->content['is_filled'] ?? null;
        $this->is_section_filled_inverted = $module->content['is_section_filled_inverted'] ?? null;
        $this->with_padding = $module->content['with_padding'] ?? null;
        $this->module_name = $module->slug ?? rand(1, 1000);
        $this->is_active = $module->is_active ?? null;
        $this->is_coupled = $module->is_coupled ?? null;
        $this->is_heading_visible = $module->content['is_heading_visible'] ?? true;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about.section', [
            'sliders' => getSlider('about-section', new Slideshow),
            'courses' => Course::all()
                ->sortDesc()
                ->take(5),
            'data' => Setting::with(['layout', 'module', 'user'])
                ->first(),
            'module' => SectionModel::where('slug', 'about-me')
                ->sole(),
        ]);
    }
}
