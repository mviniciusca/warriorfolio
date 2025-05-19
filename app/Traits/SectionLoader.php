<?php

namespace App\Traits;

use App\Models\Section;
use Illuminate\Support\Facades\Log;

trait SectionLoader
{
    protected Section $section;

    public ?string $title;

    public ?string $subtitle;

    public ?bool $is_centered;

    public ?string $button_header;

    public ?string $button_url;

    public ?string $button_icon;

    public ?bool $is_filled;

    public ?bool $is_section_filled_inverted;

    public ?bool $with_padding;

    public ?string $module_name;

    public ?bool $is_active; // is the module active?

    public ?bool $is_coupled;

    public ?bool $is_heading_visible; // is the heading visible?

    public ?string $module_slug;

    public ?array $content;

    public function loadSection(string $slug): void
    {
        try {
            $section = Section::where('slug', '=', $slug)->sole();
        } catch (\Throwable $e) {
            Log::error("Failed to load section with slug '{$slug}': ".$e->getMessage());
            throw $e;
        }

        $this->section = $section;

        $this->module_name = $section->slug ?? rand(1, 1000);
        $this->is_active = $section->is_active;
        $this->is_coupled = $section->is_coupled;
        // Content
        $this->is_heading_visible = $section->content['is_heading_visible'] ?? null;
        $this->title = $section->content['title'] ?? null;
        $this->button_header = $section->content['button_header'] ?? null;
        $this->subtitle = $section->content['subtitle'] ?? null;
        $this->button_icon = $section->content['button_icon'] ?? null;
        $this->button_url = $section->content['button_url'] ?? null;
        $this->is_filled = $section->content['is_filled'] ?? null;
        $this->with_padding = $section->content['with_padding'] ?? null;
        $this->is_section_filled_inverted = $section->content['is_section_filled_inverted'] ?? null;
        $this->is_centered = $section->content['is_centered'] ?? false;
        $this->module_slug = $section->slug ?? null;
        $this->module_name = $section->name ?? null;
        $this->content = $section->content ?? null;
    }
}
//
