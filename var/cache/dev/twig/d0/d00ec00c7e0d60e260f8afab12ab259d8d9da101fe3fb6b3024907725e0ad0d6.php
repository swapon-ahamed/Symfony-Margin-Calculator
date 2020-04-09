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

/* admin.nav.html.twig */
class __TwigTemplate_38c226d6e6134a3d61701753db2333994a715d7d4868445d9970af1ce61e32aa extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin.nav.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"\"><h2>Margin Calculator</h2></a>
        <div class=\"float-right\">
        <a href=\"\">Products</a> | 
        <a href=\"\">Purchases</a> | 
        <a href=\"\">Sales</a>

        </div>
    </div>
</nav>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin.nav.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"\"><h2>Margin Calculator</h2></a>
        <div class=\"float-right\">
        <a href=\"\">Products</a> | 
        <a href=\"\">Purchases</a> | 
        <a href=\"\">Sales</a>

        </div>
    </div>
</nav>", "admin.nav.html.twig", "/var/www/html/margin-calculator/templates/admin.nav.html.twig");
    }
}
