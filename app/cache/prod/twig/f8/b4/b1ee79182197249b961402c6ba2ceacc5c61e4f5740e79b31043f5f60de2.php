<?php

/* ::base.html.twig */
class __TwigTemplate_f8b4b1ee79182197249b961402c6ba2ceacc5c61e4f5740e79b31043f5f60de2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'id' => array($this, 'block_id'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " | Viajero</title>
    ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "    <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/paquete/images/logo.ico"), "html", null, true);
        echo "\" />
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.7.2.min.js"), "html", null, true);
        echo "\"></script>    
</head>

";
        // line 12
        $this->displayBlock('javascripts', $context, $blocks);
        // line 13
        echo "<body id=\"";
        $this->displayBlock('id', $context, $blocks);
        echo "\">
    <div id=\"contenedor\">
    ";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 16
        echo "            
    <footer>
        &copy; ";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - Viajero
        <a href=\"#\">Ayuda</a>
        <a href=\"#\">Contacto</a>
        <a href=\"#\">Privacidad</a>
        <a href=\"#\">Sobre nosotros</a>
        
        ";
        // line 24
        $context["locale"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "locale");
        // line 25
        echo "        <section id=\"idioma\">
        ";
        // line 26
        if (((isset($context["locale"]) ? $context["locale"] : null) == "es")) {
            // line 27
            echo "            <span>Español</span> -<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inicio", array("_locale" => "en")), "html", null, true);
            echo "\">English</a>
        ";
        } elseif (((isset($context["locale"]) ? $context["locale"] : null) == "en")) {
            // line 29
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inicio", array("_locale" => "es")), "html", null, true);
            echo "\">Español</a> - <span>English</span>
        ";
        }
        // line 31
        echo "        </section>
    </footer>
            
    </div>
</body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 13
    public function block_id($context, array $blocks = array())
    {
        echo "";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 15,  110 => 12,  105 => 7,  100 => 6,  90 => 31,  84 => 29,  78 => 27,  76 => 26,  71 => 24,  58 => 16,  50 => 13,  48 => 12,  42 => 9,  35 => 7,  24 => 1,  117 => 35,  115 => 13,  112 => 33,  109 => 32,  104 => 28,  98 => 37,  96 => 32,  91 => 29,  89 => 28,  77 => 22,  73 => 25,  69 => 20,  59 => 16,  53 => 14,  45 => 9,  40 => 7,  34 => 5,  94 => 32,  85 => 27,  70 => 16,  65 => 19,  62 => 18,  56 => 15,  54 => 10,  49 => 8,  46 => 7,  43 => 6,  37 => 8,  31 => 6,);
    }
}
