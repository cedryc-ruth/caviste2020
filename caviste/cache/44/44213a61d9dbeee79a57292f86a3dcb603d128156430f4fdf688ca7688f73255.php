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
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<!DOCTYPE html>
<html class=\"no-js\" lang=\"fr\">
<head>
<meta charset=\"utf-8\">
<title>Caviste - ";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />

<!-- Foundation CSS -->
<link rel=\"stylesheet\" href=\"https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css\">

<!-- jQuery UI -->
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
</head>
<body>
    <main>";
        // line 16
        $this->displayBlock('content', $context, $blocks);
        echo "</main>
    <footer>";
        // line 17
        $this->displayBlock('footer', $context, $blocks);
        echo "</footer>
    
    <script src=\"https://code.jquery.com/jquery-2.1.4.min.js\"></script>
    <script src=\"https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js\"></script>
    <script>
      \$(document).foundation();
    </script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    
    ";
        // line 26
        $this->displayBlock('javascript', $context, $blocks);
        // line 27
        echo "</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 16
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 17
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 26
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  101 => 26,  95 => 17,  89 => 16,  83 => 6,  78 => 27,  76 => 26,  64 => 17,  60 => 16,  47 => 6,  41 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
<!DOCTYPE html>
<html class=\"no-js\" lang=\"fr\">
<head>
<meta charset=\"utf-8\">
<title>Caviste - {% block title %}{% endblock %}</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />

<!-- Foundation CSS -->
<link rel=\"stylesheet\" href=\"https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css\">

<!-- jQuery UI -->
<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
</head>
<body>
    <main>{% block content %}{% endblock %}</main>
    <footer>{% block footer %}{% endblock %}</footer>
    
    <script src=\"https://code.jquery.com/jquery-2.1.4.min.js\"></script>
    <script src=\"https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js\"></script>
    <script>
      \$(document).foundation();
    </script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    
    {% block javascript %}{% endblock %}
</body>
</html>", "layout.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\layout.html.twig");
    }
}
