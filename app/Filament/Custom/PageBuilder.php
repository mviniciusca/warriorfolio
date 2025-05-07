<?php

namespace App\Filament\Custom;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\Enums\BlockPickerStyle;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class PageBuilder extends \Z3d0X\FilamentFabricator\Forms\Components\PageBuilder
{
    protected BlockPickerStyle $blockPickerStyle = BlockPickerStyle::Modal;

    protected function setUp(): void
    {
        parent::setUp();
        $this->blockPickerColumns(4);
    }

    public function getBlocks(): array
    {
        $blocks = parent::getBlocks();

        uasort($blocks, function (Block $a, Block $b) {
            return strcmp($a->getLabel(), $b->getLabel());
        });

        return $blocks;
    }

    public function blockPickerStyle(BlockPickerStyle $style): static
    {
        if ($style === BlockPickerStyle::Modal) {
            $this->blockPickerColumns(4);
        }

        $this->blockPickerStyle = $style;

        return $this;
    }
}
