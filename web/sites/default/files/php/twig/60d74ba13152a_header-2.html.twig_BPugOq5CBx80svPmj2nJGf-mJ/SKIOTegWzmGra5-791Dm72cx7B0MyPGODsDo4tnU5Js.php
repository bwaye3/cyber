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

/* themes/gavias_edupia/templates/page/header-2.html.twig */
class __TwigTemplate_fde7fa9ffae0cd077ab993f42ceca48b0590167adf1fbc249d1f01c947a449cd extends \Twig\Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<header id=\"header\" class=\"header-v2\">

 ";
        // line 4
        echo "
  ";
        // line 5
        $context["class_sticky"] = "";
        // line 6
        echo "  ";
        if ((($context["sticky_menu"] ?? null) == 1)) {
            // line 7
            echo "    ";
            $context["class_sticky"] = "gv-sticky-menu";
            // line 8
            echo "  ";
        }
        // line 9
        echo "
  <div class=\"header-main ";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["class_sticky"] ?? null), 10, $this->source), "html", null, true);
        echo "\">
    <div class=\"container header-content-layout\">
      <div class=\"header-main-inner p-relative\">
        <div class=\"row\">
          <div class=\"col-md-2 col-sm-5 col-xs-5 branding\">
            ";
        // line 15
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 15)) {
            // line 16
            echo "              ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "
            ";
        }
        // line 18
        echo "          </div>

          <div class=\"col-md-9 col-sm-7 col-xs-7 p-static\">
            <div class=\"header-inner clearfix\">
              <div class=\"main-menu\">
                <div class=\"area-main-menu\">
                  <div class=\"area-inner\">
                    <div class=\"gva-offcanvas-mobile\">
                      <div class=\"close-offcanvas hidden\"><i class=\"fa fa-times\"></i></div>
                      ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "main_menu", [], "any", false, false, true, 27)) {
            // line 28
            echo "                        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "main_menu", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            echo "
                      ";
        }
        // line 30
        echo "
                      ";
        // line 31
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "offcanvas", [], "any", false, false, true, 31)) {
            // line 32
            echo "                        <div class=\"after-offcanvas hidden\">
                          ";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "offcanvas", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
            echo "
                        </div>
                      ";
        }
        // line 36
        echo "                    </div>
                    <div id=\"menu-bar\" class=\"menu-bar d-xl-none d-lg-none d-xl-none\">
                      <span class=\"one\"></span>
                      <span class=\"two\"></span>
                      <span class=\"three\"></span>
                    </div>

                    ";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 43)) {
            // line 44
            echo "                      <div class=\"gva-search-region search-region\">
                        <span class=\"icon\"><span class=\"icon-line\"></span><i class=\"fa fa-search\"></i><span class=\"icon-line\"></span></span>
                        <div class=\"search-content\">
                          ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
            echo "
                        </div>
                        <span class=\"phone-main\">+ 1 (888) 272 0049</span>
                        <div>


                        </div>
                      </div>
                    ";
        }
        // line 56
        echo "                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>


</header>
";
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/page/header-2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 56,  125 => 47,  120 => 44,  118 => 43,  109 => 36,  103 => 33,  100 => 32,  98 => 31,  95 => 30,  89 => 28,  87 => 27,  76 => 18,  70 => 16,  68 => 15,  60 => 10,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  46 => 5,  43 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/page/header-2.html.twig", "/Users/bradleywaye/Sites/local.cyberwatchsystems.com/web/themes/gavias_edupia/templates/page/header-2.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 5, "if" => 6);
        static $filters = array("escape" => 10);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
