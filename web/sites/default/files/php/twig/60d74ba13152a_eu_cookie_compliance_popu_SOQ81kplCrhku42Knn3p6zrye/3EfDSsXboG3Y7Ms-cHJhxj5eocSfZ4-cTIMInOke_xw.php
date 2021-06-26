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

/* modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig */
class __TwigTemplate_acdfaf3b2f2434e4828887e2b1c95c01a6fcd9977977e6fab570be70769cc87e extends \Twig\Template
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
        // line 36
        if (($context["privacy_settings_tab_label"] ?? null)) {
            // line 37
            echo "  <button type=\"button\" class=\"eu-cookie-withdraw-tab\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["privacy_settings_tab_label"] ?? null), 37, $this->source), "html", null, true);
            echo "</button>
";
        }
        // line 39
        $context["classes"] = [0 => "eu-cookie-compliance-banner", 1 => "eu-cookie-compliance-banner-info", 2 => ("eu-cookie-compliance-banner--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 42
($context["method"] ?? null), 42, $this->source)))];
        // line 44
        echo "<div role=\"alertdialog\" aria-labelledby=\"popup-text\" ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 44), 44, $this->source), "html", null, true);
        echo ">
  <div class=\"popup-content info eu-cookie-compliance-content\">
    <div id=\"popup-text\" class=\"eu-cookie-compliance-message\">
      ";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null), 47, $this->source), "html", null, true);
        echo "
      ";
        // line 48
        if (($context["more_info_button"] ?? null)) {
            // line 49
            echo "        <button type=\"button\" class=\"find-more-button eu-cookie-compliance-more-button\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more_info_button"] ?? null), 49, $this->source), "html", null, true);
            echo "</button>
      ";
        }
        // line 51
        echo "    </div>

    ";
        // line 53
        if (($context["cookie_categories"] ?? null)) {
            // line 54
            echo "      <div id=\"eu-cookie-compliance-categories\" class=\"eu-cookie-compliance-categories\">
        ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cookie_categories"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["category"]) {
                // line 56
                echo "          <div class=\"eu-cookie-compliance-category\">
            <div>
              <input type=\"checkbox\" name=\"cookie-categories\" id=\"cookie-category-";
                // line 58
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 58, $this->source), "html", null, true);
                echo "\"
                     value=\"";
                // line 59
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 59, $this->source), "html", null, true);
                echo "\"
                     ";
                // line 60
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 60), [0 => "checked", 1 => "required"])) {
                    echo " checked ";
                }
                // line 61
                echo "                     ";
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "checkbox_default_state", [], "any", false, false, true, 61) == "required")) {
                    echo " disabled ";
                }
                echo " >
              <label for=\"cookie-category-";
                // line 62
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 62, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "label", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
                echo "</label>
            </div>
            ";
                // line 64
                if (twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 64)) {
                    // line 65
                    echo "              <div class=\"eu-cookie-compliance-category-description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "description", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
                    echo "</div>
            ";
                }
                // line 67
                echo "          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "        ";
            if (($context["save_preferences_button_label"] ?? null)) {
                // line 70
                echo "          <div class=\"eu-cookie-compliance-categories-buttons\">
            <button type=\"button\"
                    class=\"eu-cookie-compliance-save-preferences-button\">";
                // line 72
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["save_preferences_button_label"] ?? null), 72, $this->source), "html", null, true);
                echo "</button>
          </div>
        ";
            }
            // line 75
            echo "      </div>
    ";
        }
        // line 77
        echo "
    <div id=\"popup-buttons\" class=\"eu-cookie-compliance-buttons";
        // line 78
        if (($context["cookie_categories"] ?? null)) {
            echo " eu-cookie-compliance-has-categories";
        }
        echo "\">
      <button type=\"button\" class=\"";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary_button_class"] ?? null), 79, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["agree_button"] ?? null), 79, $this->source), "html", null, true);
        echo "</button>
      ";
        // line 80
        if (($context["secondary_button_label"] ?? null)) {
            // line 81
            echo "        <button type=\"button\" class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_class"] ?? null), 81, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_label"] ?? null), 81, $this->source), "html", null, true);
            echo "</button>
      ";
        }
        // line 83
        echo "    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 83,  161 => 81,  159 => 80,  153 => 79,  147 => 78,  144 => 77,  140 => 75,  134 => 72,  130 => 70,  127 => 69,  120 => 67,  114 => 65,  112 => 64,  105 => 62,  98 => 61,  94 => 60,  90 => 59,  86 => 58,  82 => 56,  78 => 55,  75 => 54,  73 => 53,  69 => 51,  63 => 49,  61 => 48,  57 => 47,  50 => 44,  48 => 42,  47 => 39,  41 => 37,  39 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig", "/Users/bradleywaye/Sites/local.cyberwatchsystems.com/web/modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 36, "set" => 39, "for" => 55);
        static $filters = array("escape" => 37, "clean_class" => 42);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'clean_class'],
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
