<?php

namespace App\View\Components\Ui;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Mail;
use App\Models\Page;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Quickbar extends Component
{
    public $mailCount;

    public $postCount;

    public $projectCount;

    public $categoryCount;

    public $pageCount;

    public $mediaCount;

    public $alertCount;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->mailCount = $this->formatCount(Mail::where('is_read', false)
            ->where('is_sent', false)
            ->count());

        // Contagem de posts publicados do tipo blog
        $this->postCount = $this->formatCount(Page::whereHas('post', function ($query) {
            $query->where('is_active', true);
        })->where('style', 'blog')->count());

        // Contagem de projetos publicados
        $this->projectCount = $this->formatCount(Page::whereHas('project', function ($query) {
            $query->where('is_active', true);
        })->where('style', 'project')->count());

        $this->categoryCount = $this->formatCount(Category::where('is_active', true)
            ->count());

        $this->pageCount = $this->formatCount(Page::whereNotIn('style', ['blog', 'project'])
            ->count());

        $this->mediaCount = $this->formatCount(Media::count());

        $this->alertCount = $this->formatCount(Alert::where('is_active', true)->count());
    }

    /**
     * Formata a contagem para mostrar +99 quando exceder 99
     * @param int $count
     * @return int|string
     */
    private function formatCount(int $count): int|string
    {
        return $count <= 99 ? $count : '+99';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.quickbar', [
            'mailCount'     => $this->mailCount,
            'postCount'     => $this->postCount,
            'projectCount'  => $this->projectCount,
            'categoryCount' => $this->categoryCount,
            'pageCount'     => $this->pageCount,
            'mediaCount'    => $this->mediaCount,
            'alertCount'    => $this->alertCount,
        ]);
    }
}
