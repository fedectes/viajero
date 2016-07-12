<?php

/* PaqueteBundle:Default:muestra.html.twig */
class __TwigTemplate_3114385cc11ec7f0a88c27eff2cc86147d3bf97ddb5501ac4d2f4c1c6243d3ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<table class=\"record_properties\" border=2>
    <tbody>
        <tr>
            <th>Nombre</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Temporada</th>
            <th>Fecha Partida</th>
            <th>Hora Partida</th>
            <th>Fecha Llegada</th>
            <th>Hora Llegada</th>
            <th>Disponibilidad</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nombre"), "html", null, true);
        echo "</td>
            <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "origen"), "html", null, true);
        echo "</td>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "destino"), "html", null, true);
        echo "</td>
            <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "temporada"), "html", null, true);
        echo "</td>
            <td>";
        // line 21
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechapartida"), "long", "none"), "html", null, true);
        echo "</td>
            <td>";
        // line 22
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horapartida"), "none", "short"), "html", null, true);
        echo "</td>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechallegada"), "long", "none"), "html", null, true);
        echo "</td>
            <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horallegada"), "none", "short"), "html", null, true);
        echo "</td>
            <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "disponibilidad"), "html", null, true);
        echo "</td>
            <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "precio"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "PaqueteBundle:Default:muestra.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 26,  69 => 25,  65 => 24,  61 => 23,  57 => 22,  53 => 21,  49 => 20,  45 => 19,  41 => 18,  37 => 17,  19 => 1,);
    }
}
