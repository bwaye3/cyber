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

/* themes/gavias_edupia/templates/page/footer.html.twig */
class __TwigTemplate_4486a88c0df1b8ede687177ae5cf399d87a8b9308e6e2ab615fb6357465481b1 extends \Twig\Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "message", [], "any", false, false, true, 1)) {
            // line 2
            echo "  <div class=\"gva-drupal-message-status\">
    ";
            // line 3
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "message", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
            echo "
  </div>
";
        }
        // line 6
        echo "
<footer id=\"footer\" class=\"footer\">
  <div class=\"footer-inner\">

    ";
        // line 10
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "before_footer", [], "any", false, false, true, 10)) {
            // line 11
            echo "     <div class=\"footer-top\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12\">
              <div class=\"before-footer clearfix area\">
                  ";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "before_footer", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
      </div>
     ";
        }
        // line 23
        echo "
     <div class=\"footer-center\">
        <div class=\"container\">
           <div class=\"row\">
              ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 27)) {
            // line 28
            echo "                <div class=\"footer-first col-xl-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_size"] ?? null), 28, $this->source), "html", null, true);
            echo " col-lg-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_size"] ?? null), 28, $this->source), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 29
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
            echo "
                </div>
              ";
        }
        // line 32
        echo "
              ";
        // line 33
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 33)) {
            // line 34
            echo "               <div class=\"footer-second col-xl-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_size"] ?? null), 34, $this->source), "html", null, true);
            echo " col-lg-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_size"] ?? null), 34, $this->source), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
            echo "
                </div>
              ";
        }
        // line 38
        echo "
              ";
        // line 39
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 39)) {
            // line 40
            echo "                <div class=\"footer-third col-xl-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_size"] ?? null), 40, $this->source), "html", null, true);
            echo " col-lg-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_size"] ?? null), 40, $this->source), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 41
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            echo "
                </div>
              ";
        }
        // line 44
        echo "
              ";
        // line 45
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_four", [], "any", false, false, true, 45)) {
            // line 46
            echo "                 <div class=\"footer-four col-xl-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_four_size"] ?? null), 46, $this->source), "html", null, true);
            echo " col-lg-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_four_size"] ?? null), 46, $this->source), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_four", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
            echo "
                </div>
              ";
        }
        // line 50
        echo "           </div>
        </div>
    </div>
  </div>

  ";
        // line 55
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 55)) {
            // line 56
            echo "    <div class=\"copyright\">
      <div class=\"container\">
        <div class=\"copyright-inner\">
            ";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
        </div>
      </div>
    </div>
  ";
        }
        // line 64
        echo "  <div id=\"gva-popup-ajax\" class=\"clearfix\"><div class=\"pajax-content\"><a href=\"javascript:void(0);\" class=\"btn-close\"><i class=\"gv-icon-4\"></i></a><div class=\"gva-popup-ajax-content clearfix\"></div></div></div>
  <div class=\"container pb-2\">
  <a href=\"https://www.wayedesigngroup.com\" title=\"Web Development by Waye Design Group \">Web Development by Waye Design Group</a>
  </div>
</footer>

";
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/page/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 64,  164 => 59,  159 => 56,  157 => 55,  150 => 50,  144 => 47,  137 => 46,  135 => 45,  132 => 44,  126 => 41,  119 => 40,  117 => 39,  114 => 38,  108 => 35,  101 => 34,  99 => 33,  96 => 32,  90 => 29,  83 => 28,  81 => 27,  75 => 23,  65 => 16,  58 => 11,  56 => 10,  50 => 6,  44 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/page/footer.html.twig", "/Users/bradleywaye/Sites/local.cyberwatchsystems.com/web/themes/gavias_edupia/templates/page/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1);
        static $filters = array("escape" => 3);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
