<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/gavias_edupia/templates/page/header-2.html.twig */
class __TwigTemplate_6cd999182b4617ce917218dc69828e2bcb4766a0a779bf8021dc1ba47bfe46f7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 5, "if" => 6];
        $filters = ["escape" => 10];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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

    protected function doDisplay(array $context, array $blocks = [])
    {
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
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["class_sticky"] ?? null)), "html", null, true);
        echo "\">
    <div class=\"container header-content-layout\">
      <div class=\"header-main-inner p-relative\">
        <div class=\"row\">
          <div class=\"col-md-2 col-sm-5 col-xs-5 branding\">
            ";
        // line 15
        if ($this->getAttribute(($context["page"] ?? null), "branding", [])) {
            // line 16
            echo "              ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "branding", [])), "html", null, true);
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
        if ($this->getAttribute(($context["page"] ?? null), "main_menu", [])) {
            // line 28
            echo "                        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "main_menu", [])), "html", null, true);
            echo "
                      ";
        }
        // line 30
        echo "
                      ";
        // line 31
        if ($this->getAttribute(($context["page"] ?? null), "offcanvas", [])) {
            // line 32
            echo "                        <div class=\"after-offcanvas hidden\">
                          ";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "offcanvas", [])), "html", null, true);
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
        if ($this->getAttribute(($context["page"] ?? null), "search", [])) {
            // line 44
            echo "                      <div class=\"gva-search-region search-region\">
                        <span class=\"icon\"><span class=\"icon-line\"></span><i class=\"fa fa-search\"></i><span class=\"icon-line\"></span></span>
                        <div class=\"search-content\">
                          ";
            // line 47
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "search", [])), "html", null, true);
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
        return array (  153 => 56,  141 => 47,  136 => 44,  134 => 43,  125 => 36,  119 => 33,  116 => 32,  114 => 31,  111 => 30,  105 => 28,  103 => 27,  92 => 18,  86 => 16,  84 => 15,  76 => 10,  73 => 9,  70 => 8,  67 => 7,  64 => 6,  62 => 5,  59 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/page/header-2.html.twig", "/Users/bradleywaye/Sites/local.cyberwatch.net/web/themes/gavias_edupia/templates/page/header-2.html.twig");
    }
}
