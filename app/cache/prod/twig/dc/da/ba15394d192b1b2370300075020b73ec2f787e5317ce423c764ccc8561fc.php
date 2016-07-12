<?php

/* UsuarioBundle:Default:login.html.twig */
class __TwigTemplate_dcdaba15394d192b1b2370300075020b73ec2f787e5317ce423c764ccc8561fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
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
        echo "Inicio de Sesion";
    }

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "login";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "<section id=\"entrar\">
    <h1>";
        // line 8
        echo "Inicio de Sesion";
        echo "</h1>
    
    ";
        // line 10
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 11
            echo "        <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message"), "html", null, true);
            echo "</div>
    ";
        }
        // line 13
        echo "
    <form action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login_check"), "html", null, true);
        echo "\" method=\"post\">
        <label for=\"username\">Email: </label>
        <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />

        <label for=\"password\">Contraseña: </label>
        <input type=\"password\" id=\"password\" name=\"_password\" />
        
        <input type=\"checkbox\" id=\"no_cerrar\" name=\"_remember_me\" checked />
        <label for=\"no_cerrar\">No cerrar Sesión</label>

        <input type=\"submit\" name=\"login\" value=\"Iniciar\" />
    </form>
</section>
<section id=\"registrar\">
    <a class=\"boton\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_registro"), "html", null, true);
        echo "\">";
        echo "Nuevo Vendedor";
        echo "</a>
</section>
";
    }

    // line 32
    public function block_aside($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 32,  85 => 28,  70 => 16,  65 => 14,  62 => 13,  56 => 11,  54 => 10,  49 => 8,  46 => 7,  43 => 6,  37 => 4,  31 => 3,);
    }
}
