<?php

namespace App\Helpers;

function upstreamAssetSearch($asset, $callback)
{
    foreach ($asset->upstreamPipes as $pipe) {
        if ($callback($pipe)) {
            return true;
        }

        if (upstreamAssetSearch($pipe->upstreamAsset, $callback)) {
            return true;
        }
    }

    return false;
}

function downstreamAssetSearch($asset, $callback)
{
    foreach ($asset->downstreamPipes as $pipe) {
        if ($callback($pipe)) {
            return true;
        }

        if (downstreamAssetSearch($pipe->downstreamAsset, $callback)) {
            return true;
        }
    }

    return false;
}
