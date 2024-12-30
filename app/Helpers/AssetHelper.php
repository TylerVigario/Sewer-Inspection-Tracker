<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

function upstreamPathSearch($asset, $accepted, $end): bool
{
    foreach ($asset->upstreamPipes as $pipe) {
        if (!$accepted($pipe, $pipe->upstreamAsset, $asset)) {
            return false;
        }

        if ($end($pipe, $pipe->upstreamAsset, $asset)) {
            return true;
        }

        if (upstreamPathSearch($pipe->upstreamAsset, $accepted, $end)) {
            return true;
        }
    }

    return false;
}

function upstreamPath($asset, $accepted, $end): Collection
{
    $pipes = [];

    foreach ($asset->upstreamPipes as $pipe) {
        if ($accepted($pipe, $pipe->upstreamAsset, $asset)) {
            $pipes[] = $pipe;

            if ($end($pipe, $pipe->upstreamAsset, $asset)) {
                break;
            }

            $pipes += upstreamPath($pipe->upstreamAsset, $accepted, $end);
        }
    }

    return collect($pipes);
}
