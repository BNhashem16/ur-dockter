<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;

/**
 * Helper to download images from the internet and store them in public storage.
 */
class ImageDownloader
{
    /**
     * Download an image from a URL and save it to public storage.
     *
     * @param string $url      The image URL to download
     * @param string $folder   Storage subfolder (e.g. 'banners', 'users', 'branches')
     * @param string $filename Filename with extension (e.g. 'medical-tests.jpg')
     * @return string|null     Storage path relative to public disk, or null on failure
     */
    public static function download(string $url, string $folder, string $filename): ?string
    {
        try {
            Storage::disk('public')->makeDirectory($folder);

            $contents = file_get_contents($url);

            if ($contents === false) {
                return null;
            }

            $path = "{$folder}/{$filename}";
            Storage::disk('public')->put($path, $contents);

            return $path;
        } catch (\Exception $e) {
            // If download fails, return null — the model will just have no image
            return null;
        }
    }
}
