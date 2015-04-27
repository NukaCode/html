<?php namespace NukaCode\Html;

use Collective\Html\HtmlBuilder as BaseHtmlBuilder;

class HtmlBuilder extends BaseHtmlBuilder
{

    public function linkImage($url, $imageSrc, $attributes = [], $https = null)
    {
        $url = $this->url->to($url, $https);

        return '<a href="' . $url . '"' . static::attributes($attributes) . '>' . $imageSrc . '</a>';
    }

    public function linkRouteImage($route, array $parameters, $imageSrc, $attributes = [], $https = null)
    {
        $url = $this->url->route($route, $parameters, $https);

        return '<a href="' . $url . '"' . static::attributes($attributes) . '>' . $imageSrc . '</a>';
    }

    public function linkIcon($url, $iconClasses, $iconText = null, $attributes = [], $https = null)
    {
        $url = $this->url->to($url, $https);

        return '<a href="' . $url . '"' . static::attributes($attributes) . '><i class="' . $iconClasses . '"></i> ' . $iconText . '</a>';
    }

    public function linkRouteIcon($route, array $parameters, $iconClasses, $iconText = null, $attributes = [],
                                  $https = null)
    {
        $url = $this->url->route($route, $parameters, $https);

        return '<a href="' . $url . '"' . static::attributes($attributes) . '><i class="' . $iconClasses . '"></i> ' . $iconText . '</a>';
    }

    public function span($value, $attributes = [])
    {
        return '<span' . static::attributes($attributes) . '>' . $value . '</span>';
    }

    public function icon($value, $attributes = [])
    {
        return '<i' . static::attributes($attributes) . '>' . $value . '</i>';
    }

    public function bold($value, $attributes = [])
    {
        return '<strong' . static::attributes($attributes) . '>' . $value . '</strong>';
    }

    public function italic($value, $attributes = [])
    {
        return '<em' . static::attributes($attributes) . '>' . $value . '</em>';
    }

    public function delete($value, $attributes = [])
    {
        return '<del' . static::attributes($attributes) . '>' . $value . '</del>';
    }

    public function strike($value, $attributes = [])
    {
        return '<s' . static::attributes($attributes) . '>' . $value . '</s>';
    }

    public function insert($value, $attributes = [])
    {
        return '<ins' . static::attributes($attributes) . '>' . $value . '</ins>';
    }

    public function underline($value, $attributes = [])
    {
        return '<u' . static::attributes($attributes) . '>' . $value . '</u>';
    }

    public function quote($value, $source = null)
    {
        $source = $source == null ? null : '<footer>' . $source . '</footer>';

        return '<blockquote><p>' . $value . '</p>' . $source . '</blockquote>';
    }

    public function iframe($url, $attributes = [])
    {
        return '<iframe src="' . $url . '"' . static::attributes($attributes) . '></iframe>';
    }
}