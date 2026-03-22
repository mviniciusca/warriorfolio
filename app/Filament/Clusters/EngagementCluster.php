<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class EngagementCluster extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return __('Workspace');
    }

    public static function getNavigationLabel(): string
    {
        return __('Audience & work');
    }

    public static function getClusterBreadcrumb(): ?string
    {
        return __('Audience & work');
    }
}
