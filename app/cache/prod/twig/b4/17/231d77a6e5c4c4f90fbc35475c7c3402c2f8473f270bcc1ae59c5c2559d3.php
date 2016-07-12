<?php

/* PaqueteBundle:Default:portada.html.twig */
class __TwigTemplate_b417231d77a6e5c4c4f90fbc35475c7c3402c2f8473f270bcc1ae59c5c2559d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'article' => array($this, 'block_article'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio";
    }

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "
    ";
        // line 8
        $this->env->loadTemplate("PaqueteBundle:Default:includes/paquete.html.twig")->display($context);
        // line 9
        echo "    
<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("paquete"), "html", null, true);
        echo "\">Ir a Lista</a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "PaqueteBundle:Default:portada.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 12,  50 => 9,  48 => 8,  45 => 7,  42 => 6,  36 => 4,  30 => 3,);
    }
}
