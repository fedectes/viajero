<?php

/* PaqueteBundle:Venta:nueva.html.twig */
class __TwigTemplate_12c8e84fb82b73f25079224bb98faaa3227670afb7a740fb5baf711ac30ba83c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Venta";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "    <h1>Nueva Venta</h1>
    
    ";
        // line 9
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        echo "
    
    <br></br>
    <form action=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("venta_nueva"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
        ";
        // line 14
        echo "            <h2>Datos Venta</h2>
            
            <h3>Paquete</h3>
            <div>
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "paquete"), 'label', array("label" => "Paquete de Viaje"));
        echo "
                ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "paquete"), 'widget');
        echo "
                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "paquete"), 'errors');
        echo "
            </div>
            <div id=\"paquete\" style=\"border-color: salmon\"></div>
            
            <hr>
            
            <h3>Cliente</h3>
            <div>
                ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cliente"), 'label', array("label" => "Dni de Cliente"));
        echo "
                ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cliente"), 'widget');
        echo "
                ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cliente"), 'errors');
        echo "
            </div>
            <div id=\"cliente\" style=\"border-color: salmon\"></div>
            <br></br>
   
        <p>
            <button type=\"submit\">Guardar</button>
        </p>
    </form>
";
        // line 47
        echo "    
<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ventas"), "html", null, true);
        echo "\">Volver a Lista</a>
    </li>
</ul> 
    
<script type=\"text/javascript\">
    \$(document).ready(function(){
        \$(\"#sistema_paquetebundle_ventatype_paquete\").click(function(evento){
            evento.preventDefault();
            var valor = \$(this).val();
            var url = '";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("paquete_muestra", array("id" => "id")), "html", null, true);
        echo "';
            url = url.replace(\"id\", valor);
            \$('#paquete').load(url);
            //alert(url);
        });
            
        \$(\"#sistema_paquetebundle_ventatype_cliente\").click(function(evento){
            evento.preventDefault();
            var valor2 = \$(this).val();
            var url2 = '";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cliente_muestra", array("id" => "id")), "html", null, true);
        echo "';           
            url2 = url2.replace(\"id\", valor2);
            \$('#cliente').load(url2);
            //alert(url2);
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "PaqueteBundle:Venta:nueva.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 68,  116 => 59,  104 => 50,  99 => 47,  87 => 30,  83 => 29,  79 => 28,  68 => 20,  64 => 19,  60 => 18,  54 => 14,  48 => 12,  42 => 9,  38 => 7,  35 => 6,  29 => 3,);
    }
}
