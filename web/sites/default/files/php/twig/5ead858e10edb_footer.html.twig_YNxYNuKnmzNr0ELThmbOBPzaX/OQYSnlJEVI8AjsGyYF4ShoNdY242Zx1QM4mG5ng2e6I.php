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

/* themes/gavias_edupia/templates/page/footer.html.twig */
class __TwigTemplate_b26de49dc5cd771718475a487bd0416bfba537db74db64958eb299747dfd1805 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 1];
        $filters = ["escape" => 3];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
        if ($this->getAttribute(($context["page"] ?? null), "message", [])) {
            // line 2
            echo "  <div class=\"gva-drupal-message-status\">
    ";
            // line 3
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "message", [])), "html", null, true);
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
        if ($this->getAttribute(($context["page"] ?? null), "before_footer", [])) {
            // line 11
            echo "     <div class=\"footer-top\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12\">
              <div class=\"before-footer clearfix area\">
                  ";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "before_footer", [])), "html", null, true);
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
        if ($this->getAttribute(($context["page"] ?? null), "footer_first", [])) {
            // line 28
            echo "                <div class=\"footer-first col-xl-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_size"] ?? null)), "html", null, true);
            echo " col-lg-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_size"] ?? null)), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_first", [])), "html", null, true);
            echo "
                </div> 
              ";
        }
        // line 32
        echo "
              ";
        // line 33
        if ($this->getAttribute(($context["page"] ?? null), "footer_second", [])) {
            // line 34
            echo "               <div class=\"footer-second col-xl-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_size"] ?? null)), "html", null, true);
            echo " col-lg-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_size"] ?? null)), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 35
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_second", [])), "html", null, true);
            echo "
                </div> 
              ";
        }
        // line 38
        echo "
              ";
        // line 39
        if ($this->getAttribute(($context["page"] ?? null), "footer_third", [])) {
            // line 40
            echo "                <div class=\"footer-third col-xl-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_size"] ?? null)), "html", null, true);
            echo " col-lg-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_size"] ?? null)), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 41
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_third", [])), "html", null, true);
            echo "
                </div> 
              ";
        }
        // line 44
        echo "
              ";
        // line 45
        if ($this->getAttribute(($context["page"] ?? null), "footer_four", [])) {
            // line 46
            echo "                 <div class=\"footer-four col-xl-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_four_size"] ?? null)), "html", null, true);
            echo " col-lg-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_four_size"] ?? null)), "html", null, true);
            echo " col-md-12 col-sm-12 col-xs-12 column\">
                  ";
            // line 47
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_four", [])), "html", null, true);
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
        if ($this->getAttribute(($context["page"] ?? null), "copyright", [])) {
            // line 56
            echo "    <div class=\"copyright\">
      <div class=\"container\">
        <div class=\"copyright-inner\">
            ";
            // line 59
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "copyright", [])), "html", null, true);
            echo "
        </div>   
      </div>   
    </div>
  ";
        }
        // line 64
        echo "  <div id=\"gva-popup-ajax\" class=\"clearfix\"><div class=\"pajax-content\"><a href=\"javascript:void(0);\" class=\"btn-close\"><i class=\"gv-icon-4\"></i></a><div class=\"gva-popup-ajax-content clearfix\"></div></div></div>
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
        return array (  188 => 64,  180 => 59,  175 => 56,  173 => 55,  166 => 50,  160 => 47,  153 => 46,  151 => 45,  148 => 44,  142 => 41,  135 => 40,  133 => 39,  130 => 38,  124 => 35,  117 => 34,  115 => 33,  112 => 32,  106 => 29,  99 => 28,  97 => 27,  91 => 23,  81 => 16,  74 => 11,  72 => 10,  66 => 6,  60 => 3,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/page/footer.html.twig", "/Users/bradleywaye/Sites/local.cyberwatch.net/web/themes/gavias_edupia/templates/page/footer.html.twig");
    }
}
