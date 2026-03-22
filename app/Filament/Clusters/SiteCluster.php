<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class SiteCluster extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Workspace');
    }

    public static function getNavigationLabel(): string
    {
        return __('Your Website');
    }

    public static function getClusterBreadcrumb(): ?string
    {
        return __('Your Website');
    }
}
