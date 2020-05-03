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

/* themes/gavias_edupia/templates/user/page--user--login.html.twig */
class __TwigTemplate_00f4666c0c4adbca83903c6c298ab007dccc9927392bb5ec6c068d257c2ebaef extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["include" => 9, "if" => 13];
        $filters = ["escape" => 14];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
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
        // line 7
        echo "
<div class=\"page-user-login gva-body-page\">
   ";
        // line 9
        $this->loadTemplate((($context["directory"] ?? null) . "/templates/page/parts/preloader.html.twig"), "themes/gavias_edupia/templates/user/page--user--login.html.twig", 9)->display($context);
        // line 10
        echo "   <div class=\"bg\"></div>
   <div role=\"main\" class=\"main main-page\">
      <div class=\"branding text-center\">
         ";
        // line 13
        if ($this->getAttribute(($context["page"] ?? null), "branding", [])) {
            // line 14
            echo "            ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "branding", [])), "html", null, true);
            echo "
         ";
        }
        // line 16
        echo "      </div>
      ";
        // line 17
        if ($this->getAttribute(($context["page"] ?? null), "help", [])) {
            // line 18
            echo "         <div class=\"help show\">
            <div class=\"container\">
               <div class=\"content-inner\">
                  ";
            // line 21
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "help", [])), "html", null, true);
            echo "
               </div>
            </div>
         </div>
      ";
        }
        // line 26
        echo "      <div class=\"clearfix\"></div>
      <div id=\"content\" class=\"content content-full\">
         ";
        // line 28
        if ($this->getAttribute(($context["page"] ?? null), "content", [])) {
            // line 29
            echo "            <div class=\"content-main\">
               ";
            // line 30
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
            echo "
            </div>
         ";
        }
        // line 33
        echo "      </div>
   </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/user/page--user--login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 33,  101 => 30,  98 => 29,  96 => 28,  92 => 26,  84 => 21,  79 => 18,  77 => 17,  74 => 16,  68 => 14,  66 => 13,  61 => 10,  59 => 9,  55 => 7,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/user/page--user--login.html.twig", "/Users/bradleywaye/Sites/local.cyberwatch.net/web/themes/gavias_edupia/templates/user/page--user--login.html.twig");
    }
}
