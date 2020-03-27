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

/* Wine/show.html.twig */
class __TwigTemplate_9fc5891c66e0580e30ede40d086d2fc31288a2deb57da6644a684b7d414bb225 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<h2>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "name", [], "any", false, false, false, 2), "html", null, true);
        echo "</h2>
<figure>
    <img src=\"/pics/";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "picture", [], "any", false, false, false, 4), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "name", [], "any", false, false, false, 4), "html", null, true);
        echo "\">
    <figcaption>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "name", [], "any", false, false, false, 5), "html", null, true);
        echo "</figcaption>
</figure>
<p>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "country", [], "any", false, false, false, 7), "html", null, true);
        echo "</p>
<p>";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "region", [], "any", false, false, false, 8), "html", null, true);
        echo "</p>
<p>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "description", [], "any", false, false, false, 9), "html", null, true);
        echo "</p>";
    }

    public function getTemplateName()
    {
        return "Wine/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 9,  58 => 8,  54 => 7,  49 => 5,  43 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
<h2>{{ vin.name }}</h2>
<figure>
    <img src=\"/pics/{{ vin.picture }}\" alt=\"{{ vin.name }}\">
    <figcaption>{{ vin.name }}</figcaption>
</figure>
<p>{{ vin.country }}</p>
<p>{{ vin.region }}</p>
<p>{{ vin.description }}</p>", "Wine/show.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\Wine\\show.html.twig");
    }
}
