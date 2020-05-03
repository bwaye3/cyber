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

/* modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig */
class __TwigTemplate_c137fb4f0cadc78a69db6e95e007ab9fe4589e6484ff7572b142f7ecc931f5a6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 37, "set" => 40, "for" => 56];
        $filters = ["escape" => 38, "join" => 43, "replace" => 43];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'join', 'replace'],
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
        // line 37
        if (($context["privacy_settings_tab_label"] ?? null)) {
            // line 38
            echo "  <button type=\"button\" class=\"eu-cookie-withdraw-tab\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["privacy_settings_tab_label"] ?? null)), "html", null, true);
            echo "</button>
";
        }
        // line 40
        $context["classes"] = [0 => "eu-cookie-compliance-banner", 1 => "eu-cookie-compliance-banner-info", 2 => twig_join_filter([0 => "eu-cookie-compliance-banner--", 1 => twig_replace_filter($this->sandbox->ensureToStringAllowed(        // line 43
($context["method"] ?? null)), "_", "-")])];
        // line 45
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
  <div class=\"popup-content info eu-cookie-compliance-content\">
    <div id=\"popup-text\" class=\"eu-cookie-compliance-message\">
      ";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null)), "html", null, true);
        echo "
      ";
        // line 49
        if (($context["disagree_button"] ?? null)) {
            // line 50
            echo "        <button type=\"button\" class=\"find-more-button eu-cookie-compliance-more-button\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["disagree_button"] ?? null)), "html", null, true);
            echo "</button>
      ";
        }
        // line 52
        echo "    </div>

    ";
        // line 54
        if (($context["cookie_categories"] ?? null)) {
            // line 55
            echo "      <div id=\"eu-cookie-compliance-categories\" class=\"eu-cookie-compliance-categories\">
        ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cookie_categories"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["category"]) {
                // line 57
                echo "          <div class=\"eu-cookie-compliance-category\">
            <div>
              <input type=\"checkbox\" name=\"cookie-categories\" id=\"cookie-category-";
                // line 59
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                echo "\"
                     value=\"";
                // line 60
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                echo "\" ";
                if ((($context["fix_first_cookie_category"] ?? null) && $this->getAttribute($context["loop"], "first", []))) {
                    echo " checked disabled";
                }
                echo ">
              <label for=\"cookie-category-";
                // line 61
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["category"], "label", [])), "html", null, true);
                echo "</label>
            </div>
            ";
                // line 63
                if ($this->getAttribute($context["category"], "description", [])) {
                    // line 64
                    echo "              <div class=\"eu-cookie-compliance-category-description\">";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["category"], "description", [])), "html", null, true);
                    echo "</div>
            ";
                }
                // line 66
                echo "          </div>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "        ";
            if (($context["save_preferences_button_label"] ?? null)) {
                // line 69
                echo "          <div class=\"eu-cookie-compliance-categories-buttons\">
            <button type=\"button\"
                    class=\"eu-cookie-compliance-save-preferences-button\">";
                // line 71
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["save_preferences_button_label"] ?? null)), "html", null, true);
                echo "</button>
          </div>
        ";
            }
            // line 74
            echo "      </div>
    ";
        }
        // line 76
        echo "
    <div id=\"popup-buttons\" class=\"eu-cookie-compliance-buttons";
        // line 77
        if (($context["cookie_categories"] ?? null)) {
            echo " eu-cookie-compliance-has-categories";
        }
        echo "\">
      <button type=\"button\" class=\"";
        // line 78
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary_button_class"] ?? null)), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["agree_button"] ?? null)), "html", null, true);
        echo "</button>
      ";
        // line 79
        if (($context["secondary_button_label"] ?? null)) {
            // line 80
            echo "        <button type=\"button\" class=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_class"] ?? null)), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary_button_label"] ?? null)), "html", null, true);
            echo "</button>
      ";
        }
        // line 82
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
        return array (  199 => 82,  191 => 80,  189 => 79,  183 => 78,  177 => 77,  174 => 76,  170 => 74,  164 => 71,  160 => 69,  157 => 68,  142 => 66,  136 => 64,  134 => 63,  127 => 61,  119 => 60,  115 => 59,  111 => 57,  94 => 56,  91 => 55,  89 => 54,  85 => 52,  79 => 50,  77 => 49,  73 => 48,  66 => 45,  64 => 43,  63 => 40,  57 => 38,  55 => 37,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig", "/Users/bradleywaye/Sites/local.cyberwatch.net/web/modules/contrib/eu_cookie_compliance/templates/eu_cookie_compliance_popup_info.html.twig");
    }
}
