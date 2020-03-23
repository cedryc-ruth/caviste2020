<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Wine/index.html.twig */
class __TwigTemplate_c342e7925044c175a796cad1f814f69e34a5b43bb9f4390786a47569e49a6419 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html.twig", "Wine/index.html.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Liste des vins";
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<h1>";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["title"] ?? null)), "html", null, true);
        echo "</h1>
<p>";
        // line 8
        echo twig_escape_filter($this->env, ($context["data"] ?? null), "html", null, true);
        echo "</p>
<div>";
        // line 9
        echo twig_escape_filter($this->env, ($context["vin"] ?? null), "html", null, true);
        echo "</div>
";
    }

    // line 12
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "    <p>&copy; EPFC - 2020</p>
";
    }

    public function getTemplateName()
    {
        return "Wine/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 13,  74 => 12,  68 => 9,  64 => 8,  59 => 7,  55 => 6,  48 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
{% extends 'layout.html.twig' %}

{% block title %}Liste des vins{% endblock%}

{% block content %}
<h1>{{ title|upper }}</h1>
<p>{{ data }}</p>
<div>{{ vin }}</div>
{% endblock %}

{% block footer %}
    <p>&copy; EPFC - 2020</p>
{% endblock %}", "Wine/index.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\Wine\\index.html.twig");
    }
}
