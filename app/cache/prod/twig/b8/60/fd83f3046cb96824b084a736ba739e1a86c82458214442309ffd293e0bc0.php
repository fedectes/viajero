<?php

/* ClienteBundle:Default:muestrac.html.twig */
class __TwigTemplate_b860fd83f3046cb96824b084a736ba739e1a86c82458214442309ffd293e0bc0 extends Twig_Template
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
        echo "<table class=\"record_properties\" border=2>
    <tbody>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Fecha de Nacimiento</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "dni"), "html", null, true);
        echo "</td>
            <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nombrec"), "html", null, true);
        echo "</td>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "apellidoc"), "html", null, true);
        echo "</td>
            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "direccion"), "html", null, true);
        echo "</td>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "telefono"), "html", null, true);
        echo "</td>
            <td>";
        // line 18
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechanacim"), "long", "none"), "html", null, true);
        echo "</td>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "ClienteBundle:Default:muestrac.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 19,  53 => 18,  49 => 17,  45 => 16,  41 => 15,  37 => 14,  33 => 13,  19 => 1,);
    }
}
