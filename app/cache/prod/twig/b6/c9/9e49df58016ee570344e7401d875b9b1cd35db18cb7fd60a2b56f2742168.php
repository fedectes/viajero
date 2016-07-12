<?php

/* PaqueteBundle:Default:includes/paquete.html.twig */
class __TwigTemplate_b6c99e49df58016ee570344e7401d875b9b1cd35db18cb7fd60a2b56f2742168 extends Twig_Template
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
        echo "<h1>Paquetes de Viajes</h1>
<table class=\"records_list\" border=1>
    <thead>
        <tr>
            <th>Pasaje</th>
            <th>Publicado</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Temporada</th>
            <th>Fecha Partida</th>
            <th>Hora Partida</th>
            <th>Fecha Llegada</th>
            <th>Hora Llegada</th>
            <th>Dias</th>
            <th>Cant.</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 21
            echo "        <tr>

            <td><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("paquete_ver", array("slug" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nombre"), "html", null, true);
            echo "</a></td>
            <td>";
            // line 24
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "creado")) {
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "creado"), "medium", "none"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "origen"), "html", null, true);
            echo "</td>
            <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "destino"), "html", null, true);
            echo "</td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "temporada"), "html", null, true);
            echo "</td>
            <td>";
            // line 28
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechapartida")) {
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechapartida"), "long", "none"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 29
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horapartida")) {
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horapartida"), "none", "short"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 30
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechallegada")) {
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechallegada"), "long", "none"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 31
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horallegada")) {
                echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "horallegada"), "none", "short"), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "dias"), "html", null, true);
            echo "</td>
            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "disponibilidad"), "html", null, true);
            echo "</td>
            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "precio"), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "PaqueteBundle:Default:includes/paquete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 37,  104 => 34,  100 => 33,  96 => 32,  90 => 31,  84 => 30,  78 => 29,  72 => 28,  68 => 27,  64 => 26,  60 => 25,  54 => 24,  44 => 21,  40 => 20,  19 => 1,  55 => 12,  50 => 9,  48 => 23,  45 => 7,  42 => 6,  36 => 4,  30 => 3,);
    }
}
