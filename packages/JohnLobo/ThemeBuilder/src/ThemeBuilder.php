<?php

namespace JohnLobo\ThemeBuilder;


use Shipu\Themevel\Managers\Theme;

class ThemeBuilder extends Theme
{
    public function getFullPath($path)
    {

        $splitThemeAndPath = explode(':', $path);

        if (count($splitThemeAndPath) > 1) {
            if (is_null($splitThemeAndPath[0])) {
                return;
            }
            $themeName = $splitThemeAndPath[0];
            $path = $splitThemeAndPath[1];
        } else {
            $themeName = $this->current();
            $path = $splitThemeAndPath[0];
        }

        return $this->assetRecursive($themeName, $path);
    }

    private function assetRecursive($themeName, $path)
    {

        $themeInfo = $this->getThemeInfo($themeName);

        if ($this->config['theme.symlink']) {
            $themePath = str_replace(base_path('public') . DIRECTORY_SEPARATOR, '', $this->config['theme.symlink_path']) . DIRECTORY_SEPARATOR . $themeName . DIRECTORY_SEPARATOR;
        } else {
            $themePath = str_replace(base_path('public') . DIRECTORY_SEPARATOR, '', $themeInfo->get('path')) . DIRECTORY_SEPARATOR;
        }

        $assetPath = $this->config['theme.folders.assets'] . DIRECTORY_SEPARATOR;
        $fullPath = $themePath . $assetPath . $path;

        if (!file_exists($fullPath) && $themeInfo->has('parent') && !empty($themeInfo->get('parent'))) {

            $themePath = str_replace(base_path() . DIRECTORY_SEPARATOR, '', $this->getThemeInfo($themeInfo->get('parent'))->get('path')) . DIRECTORY_SEPARATOR;
            $fullPath = $themePath . $assetPath . $path;
            if (!file_exists($fullPath) && $themeInfo->has('parent') && !empty($themeInfo->get('parent'))) {

                return $this->assetRecursive($this->getThemeInfo($themeInfo->get('parent'))->get('name'), $path);
            }

        }

        return $fullPath;

    }
}