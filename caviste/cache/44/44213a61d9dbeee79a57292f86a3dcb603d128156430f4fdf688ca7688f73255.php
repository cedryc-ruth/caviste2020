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

/* layout.html.twig */
class __TwigTemplate_3f0303cc1e8e7cc6269ecf1587008813400bb0c1e0b3eff2fab454644511d757 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"utf-8\">
<title>Caviste - ";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
    <main>";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        echo "</main>
    <footer>";
        // line 10
        $this->displayBlock('footer', $context, $blocks);
        echo "</footer>
</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  75 => 10,  69 => 9,  63 => 6,  56 => 10,  52 => 9,  46 => 6,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"utf-8\">
<title>Caviste - {% block title %}{% endblock %}</title>
</head>
<body>
    <main>{% block content %}{% endblock %}</main>
    <footer>{% block footer %}{% endblock %}</footer>
</body>
</html>", "layout.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\layout.html.twig");
    }
}
