<?php

/* ::frontend.html.twig */
class __TwigTemplate_bbb9f766d85f51d964133f8ba3d8a732254de25e917995d5821a001fd5fe297b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/paquete/css/normalizar.css"), "html", null, true);
        echo "\"
        rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/paquete/css/comun.css"), "html", null, true);
        echo "\"
        rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/paquete/css/frontend.css"), "html", null, true);
        echo "\"
        rel=\"stylesheet\" type=\"text/css\" />
    
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo "<header>
    <h1><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inicio"), "html", null, true);
        echo "\">VIAJERO</a></h1>
    <nav>
        <ul>
            <li><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cliente"), "html", null, true);
        echo "\">Clientes</a></li>
            <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("paquete"), "html", null, true);
        echo "\">Paquetes</a></li>
            <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ventas"), "html", null, true);
        echo "\">Ventas</a></li>
            <li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("venta_nueva"), "html", null, true);
        echo "\">Nueva Venta</a></li>
        </ul>
    </nav>
</header>

<article ";
        // line 27
        echo ((twig_in_filter($this->renderBlock("id", $context, $blocks), array(0 => "portada", 1 => "oferta"))) ? (" class=\"oferta\"") : (""));
        echo ">
    ";
        // line 28
        $this->displayBlock('article', $context, $blocks);
        // line 29
        echo "</article>

<aside>
";
        // line 32
        $this->displayBlock('aside', $context, $blocks);
        // line 37
        echo "</aside>

";
    }

    // line 28
    public function block_article($context, array $blocks = array())
    {
    }

    // line 32
    public function block_aside($context, array $blocks = array())
    {
        // line 33
        echo "    <section id=\"login\">
        ";
        // line 34
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("UsuarioBundle:Default:cajaLogin", array("id" => $this->renderBlock("id", $context, $blocks))), array());
        // line 35
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "::frontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 35,  115 => 34,  112 => 33,  109 => 32,  104 => 28,  98 => 37,  96 => 32,  91 => 29,  89 => 28,  77 => 22,  73 => 21,  69 => 20,  59 => 16,  53 => 14,  45 => 9,  40 => 7,  34 => 5,  94 => 32,  85 => 27,  70 => 16,  65 => 19,  62 => 13,  56 => 15,  54 => 10,  49 => 8,  46 => 7,  43 => 6,  37 => 4,  31 => 4,);
    }
}
