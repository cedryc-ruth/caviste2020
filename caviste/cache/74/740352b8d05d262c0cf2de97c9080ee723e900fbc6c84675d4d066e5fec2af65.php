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
<p>";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vin"] ?? null), "country", [], "any", false, false, false, 3), "html", null, true);
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
        return array (  42 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
<h2>{{ vin.name }}</h2>
<p>{{ vin.country }}</p>", "Wine/show.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\Wine\\show.html.twig");
    }
}
