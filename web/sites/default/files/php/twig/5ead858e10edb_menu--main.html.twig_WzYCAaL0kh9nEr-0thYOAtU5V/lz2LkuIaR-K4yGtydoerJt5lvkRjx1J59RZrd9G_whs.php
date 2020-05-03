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

/* themes/gavias_edupia/templates/navigation/menu--main.html.twig */
class __TwigTemplate_1db609d8e5ea057dde655d899cdf1b790296cb1a0408a96a69cfbb9f67e9d35e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["import" => 23, "macro" => 31, "if" => 33, "for" => 40, "set" => 41];
        $filters = ["escape" => 35, "join" => 47, "without" => 60, "trim" => 65];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape', 'join', 'without', 'trim'],
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
        // line 21
        echo "
<div class=\"gva-navigation\">
";
        // line 23
        $context["menus"] = $this;
        // line 24
        echo "
";
        // line 29
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links(($context["items"] ?? null), ($context["attributes"] ?? null), 0));
        echo "

";
        // line 83
        echo "</div>

";
    }

    // line 31
    public function getmenu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 32
            echo "  ";
            $context["menus"] = $this;
            // line 33
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 34
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 35
                    echo "      <ul ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "gva_menu gva_menu_main"], "method")), "html", null, true);
                    echo ">

    ";
                } else {
                    // line 38
                    echo "      <ul class=\"menu sub-menu\">
    ";
                }
                // line 40
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 41
                    echo "      ";
                    $context["class_mega_menu"] = "";
                    // line 42
                    echo "      ";
                    $context["class_columns"] = "";
                    // line 43
                    echo "      ";
                    if ((($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_layout", []) == "menu-block") && (($context["menu_level"] ?? null) == 0))) {
                        // line 44
                        echo "        ";
                        $context["class_mega_menu"] = "gva-mega-menu mega-menu-block";
                        // line 45
                        echo "      ";
                    } elseif ((($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_layout", []) == "menu-grid") && (($context["menu_level"] ?? null) == 0))) {
                        // line 46
                        echo "        ";
                        $context["class_mega_menu"] = "gva-mega-menu megamenu menu-grid";
                        // line 47
                        echo "        ";
                        $context["class_columns"] = twig_join_filter([0 => "menu-columns-", 1 => $this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_layout_columns", [])], "");
                        // line 48
                        echo "      ";
                    }
                    // line 49
                    echo "      ";
                    // line 50
                    $context["classes"] = [0 => "menu-item", 1 => (($this->getAttribute(                    // line 52
$context["item"], "is_expanded", [])) ? ("menu-item--expanded") : ("")), 2 => (($this->getAttribute(                    // line 53
$context["item"], "is_collapsed", [])) ? ("menu-item--collapsed") : ("")), 3 => (($this->getAttribute(                    // line 54
$context["item"], "in_active_trail", [])) ? ("menu-item--active-trail") : ("")), 4 => $this->getAttribute($this->getAttribute(                    // line 55
$context["item"], "attributes", []), "gva_class", []), 5 =>                     // line 56
($context["class_mega_menu"] ?? null), 6 =>                     // line 57
($context["class_columns"] ?? null)];
                    // line 60
                    echo "      <li ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "addClass", [0 => ($context["classes"] ?? null)], "method")), "gva_icon", "gva_class", "gva_layout_columns", "gva_block", "gva_layout"), "html", null, true);
                    echo ">
        <a href=\"";
                    // line 61
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), "html", null, true);
                    echo "\">
          ";
                    // line 62
                    if (($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_icon", []) != "")) {
                        // line 63
                        echo "            <i class=\"fa ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_icon", [])), "html", null, true);
                        echo "\"></i>
          ";
                    }
                    // line 65
                    echo "          ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", []))), "html", null, true);
                    echo "
          ";
                    // line 66
                    if (($this->getAttribute($context["item"], "below", []) || (($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_layout", []) == "menu-block") && (($context["menu_level"] ?? null) == 0)))) {
                        // line 67
                        echo "            <span class=\"icaret nav-plus gv-icon-161\"></span>
          ";
                    }
                    // line 69
                    echo "        </a>
        ";
                    // line 70
                    if ((($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "gva_layout", []) == "menu-block") && (($context["menu_level"] ?? null) == 0))) {
                        // line 71
                        echo "          <div class=\"sub-menu\">
            ";
                        // line 72
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "gva_block_content", []))), "html", null, true);
                        echo "
          </div>
        ";
                    }
                    // line 75
                    echo "        ";
                    if ($this->getAttribute($context["item"], "below", [])) {
                        // line 76
                        echo "          ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links($this->getAttribute($context["item"], "below", []), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)));
                        echo "
        ";
                    }
                    // line 78
                    echo "      </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "    </ul>
  ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/gavias_edupia/templates/navigation/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 80,  199 => 78,  193 => 76,  190 => 75,  184 => 72,  181 => 71,  179 => 70,  176 => 69,  172 => 67,  170 => 66,  165 => 65,  159 => 63,  157 => 62,  153 => 61,  148 => 60,  146 => 57,  145 => 56,  144 => 55,  143 => 54,  142 => 53,  141 => 52,  140 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 45,  123 => 44,  120 => 43,  117 => 42,  114 => 41,  109 => 40,  105 => 38,  98 => 35,  95 => 34,  92 => 33,  89 => 32,  75 => 31,  69 => 83,  64 => 29,  61 => 24,  59 => 23,  55 => 21,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/gavias_edupia/templates/navigation/menu--main.html.twig", "/Users/bradleywaye/Sites/local.cyberwatch.net/web/themes/gavias_edupia/templates/navigation/menu--main.html.twig");
    }
}
