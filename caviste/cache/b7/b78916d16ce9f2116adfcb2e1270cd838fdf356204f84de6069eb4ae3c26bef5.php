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
            'javascript' => [$this, 'block_javascript'],
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
        echo "   <!-- Start Top Bar -->
    <div class=\"top-bar\">
      <div class=\"top-bar-left\">
        <ul class=\"menu\">
          <li class=\"menu-text\">Caviste</li>
          <li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("home"), "html", null, true);
        echo "\">Accueil</a></li>
          <li><a href=\"#\">Profil</a></li>
        </ul>
      </div>
      <div class=\"top-bar-right\">
        <ul class=\"menu\">
          <li><a href=\"#\">FAQ</a></li>
          <li><a href=\"#\">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->


    <div class=\"orbit\" role=\"region\" aria-label=\"Favorite Space Pictures\" data-orbit>
      <ul class=\"orbit-container\">
        <button class=\"orbit-previous\" aria-label=\"previous\"><span class=\"show-for-sr\">Previous Slide</span>&#9664;</button>
        <button class=\"orbit-next\" aria-label=\"next\"><span class=\"show-for-sr\">Next Slide</span>&#9654;</button>
        <li class=\"orbit-slide is-active\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
      </ul>
    </div>

    <div class=\"row column text-center\">
      <h2>Our Newest Products</h2>
      <hr>
    </div>

    <div class=\"row small-up-2 large-up-4\">
        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["vins"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["vin"]) {
            echo "    
      <div class=\"column\">
        <img class=\"thumbnail\" data-id=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vin"], "id", [], "any", false, false, false, 53), "html", null, true);
            echo "\" src=\"pics/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vin"], "picture", [], "any", false, false, false, 53), "html", null, true);
            echo "\" width=\"300\">
        <h5><a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("show", ["id" => twig_get_attribute($this->env, $this->source, $context["vin"], "id", [], "any", false, false, false, 54)]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["vin"], "name", [], "any", false, false, false, 54), 0, 10), "html", null, true);
            echo "</a></h5>
        <p>";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vin"], "year", [], "any", false, false, false, 55), "html", null, true);
            echo "</p>
        <a href=\"#\" class=\"button expanded\">Buy</a>
      </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vin'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "    </div>

    <hr>
";
    }

    // line 64
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "    <p>&copy; EPFC - 2020</p>
";
    }

    // line 68
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        echo "<script>
    \$( function() {
      \$( \"#dialog\" ).hide();

      \$('img.thumbnail').on('click', function() {
        const idWine = \$(this).data('id');
        const img = this;
          
        //Récupérer les données du vin (requête Ajax vers l'API)
        \$.getJSON('/api/wines/'+idWine, function(data) {
            if(data[0].id!=0){
                if(\$( \"#dialog\" ).attr('title')) {
                    \$( \"#dialog\" ).attr('title',data[0].name);
                } else {
                    \$('.ui-dialog-titlebar .ui-dialog-title').html(data[0].name);
                }
            
                \$(\"#dialog img.vin-picture\").attr('src',img.src);
                \$(\"#dialog img.vin-picture\").attr('alt',img.alt);
                \$(\"#dialog p.vin-country span\").html(data[0].country);
                \$(\"#dialog p.vin-region span\").html(data[0].region);
                \$(\"#dialog p.vin-grapes span\").html(data[0].grapes);
                \$(\"#dialog p.vin-year span\").html(data[0].year);
                \$(\"#dialog p.vin-description span\").html(data[0].description);
            }
        });
        
        \$( \"#dialog\" ).dialog({
            width: 600
        });
      });
    } );
</script>

<div id=\"dialog\" title=\"Basic dialog\">
    <div style=\"float: left\">
        <img class=\"vin-picture\" src=\"\" alt=\"\">
    </div>
    <div>
        <p class=\"vin-country\"><strong>Country:</strong> <span></span></p>
        <p class=\"vin-region\"><strong>Region:</strong> <span></span></p>
        <p class=\"vin-grapes\"><strong>Grapes:</strong> <span></span></p>
        <p class=\"vin-year\"><strong>Year:</strong> <span></span></p>
        <p class=\"vin-description\"><strong>Description:</strong> <span></span></p>
    </div>
</div>
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
        return array (  158 => 69,  154 => 68,  149 => 65,  145 => 64,  138 => 59,  128 => 55,  122 => 54,  116 => 53,  109 => 51,  67 => 12,  60 => 7,  56 => 6,  49 => 4,  38 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# empty Twig template #}
{% extends 'layout.html.twig' %}

{% block title %}Liste des vins{% endblock%}

{% block content %}
   <!-- Start Top Bar -->
    <div class=\"top-bar\">
      <div class=\"top-bar-left\">
        <ul class=\"menu\">
          <li class=\"menu-text\">Caviste</li>
          <li><a href=\"{{ url_for('home') }}\">Accueil</a></li>
          <li><a href=\"#\">Profil</a></li>
        </ul>
      </div>
      <div class=\"top-bar-right\">
        <ul class=\"menu\">
          <li><a href=\"#\">FAQ</a></li>
          <li><a href=\"#\">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->


    <div class=\"orbit\" role=\"region\" aria-label=\"Favorite Space Pictures\" data-orbit>
      <ul class=\"orbit-container\">
        <button class=\"orbit-previous\" aria-label=\"previous\"><span class=\"show-for-sr\">Previous Slide</span>&#9664;</button>
        <button class=\"orbit-next\" aria-label=\"next\"><span class=\"show-for-sr\">Next Slide</span>&#9654;</button>
        <li class=\"orbit-slide is-active\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
        <li class=\"orbit-slide\">
          <img src=\"https://placehold.it/2000x750\">
        </li>
      </ul>
    </div>

    <div class=\"row column text-center\">
      <h2>Our Newest Products</h2>
      <hr>
    </div>

    <div class=\"row small-up-2 large-up-4\">
        {% for vin in vins %}    
      <div class=\"column\">
        <img class=\"thumbnail\" data-id=\"{{ vin.id }}\" src=\"pics/{{ vin.picture }}\" width=\"300\">
        <h5><a href=\"{{ url_for('show', {'id':vin.id}) }}\">{{ vin.name|slice(0, 10) }}</a></h5>
        <p>{{ vin.year }}</p>
        <a href=\"#\" class=\"button expanded\">Buy</a>
      </div>
        {% endfor %}
    </div>

    <hr>
{% endblock %}

{% block footer %}
    <p>&copy; EPFC - 2020</p>
{% endblock %}

{% block javascript %}
<script>
    \$( function() {
      \$( \"#dialog\" ).hide();

      \$('img.thumbnail').on('click', function() {
        const idWine = \$(this).data('id');
        const img = this;
          
        //Récupérer les données du vin (requête Ajax vers l'API)
        \$.getJSON('/api/wines/'+idWine, function(data) {
            if(data[0].id!=0){
                if(\$( \"#dialog\" ).attr('title')) {
                    \$( \"#dialog\" ).attr('title',data[0].name);
                } else {
                    \$('.ui-dialog-titlebar .ui-dialog-title').html(data[0].name);
                }
            
                \$(\"#dialog img.vin-picture\").attr('src',img.src);
                \$(\"#dialog img.vin-picture\").attr('alt',img.alt);
                \$(\"#dialog p.vin-country span\").html(data[0].country);
                \$(\"#dialog p.vin-region span\").html(data[0].region);
                \$(\"#dialog p.vin-grapes span\").html(data[0].grapes);
                \$(\"#dialog p.vin-year span\").html(data[0].year);
                \$(\"#dialog p.vin-description span\").html(data[0].description);
            }
        });
        
        \$( \"#dialog\" ).dialog({
            width: 600
        });
      });
    } );
</script>

<div id=\"dialog\" title=\"Basic dialog\">
    <div style=\"float: left\">
        <img class=\"vin-picture\" src=\"\" alt=\"\">
    </div>
    <div>
        <p class=\"vin-country\"><strong>Country:</strong> <span></span></p>
        <p class=\"vin-region\"><strong>Region:</strong> <span></span></p>
        <p class=\"vin-grapes\"><strong>Grapes:</strong> <span></span></p>
        <p class=\"vin-year\"><strong>Year:</strong> <span></span></p>
        <p class=\"vin-description\"><strong>Description:</strong> <span></span></p>
    </div>
</div>
{% endblock %}", "Wine/index.html.twig", "C:\\UwAmp3\\www\\caviste2020\\caviste\\src\\templates\\Wine\\index.html.twig");
    }
}
