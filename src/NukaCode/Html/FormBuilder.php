<?php namespace NukaCode\Html;

use Collective\Html\FormBuilder as BaseFormBuilder;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Contracts\View\Factory;

class FormBuilder extends BaseFormBuilder
{
    protected $requiredClasses = [];

    private   $view;

    public function __construct(HtmlBuilder $html, UrlGenerator $url, $csrfToken, Factory $view)
    {
        $this->url       = $url;
        $this->html      = $html;
        $this->csrfToken = $csrfToken;
        $this->view      = $view;
    }

    protected function verifyHasOption($options, $key, $value)
    {
        if (! isset($options[$key])) {
            $options[$key] = $value;
        } elseif (strpos($options[$key], $value) === false) {
            $options[$key] = $options[$key] . ' ' . $value;
        }

        return $options;
    }

    protected function addToSection($section, $data)
    {
        if (! array_key_exists($section . 'Form', $this->view->getSections())) {
            $data = "@parent " . $data;
        }

        $this->view->inject($section . 'Form', $data);
    }
}
