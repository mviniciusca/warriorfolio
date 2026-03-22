<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class ContentCluster extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Workspace');
    }

    public static function getNavigationLabel(): string
    {
        return __('Content');
    }

    public static function getClusterBreadcrumb(): ?string
    {
        return __('Content');
    }
}
