<?php

/* UsuarioBundle:Default:cajaLogin.html.twig */
class __TwigTemplate_fd3778dee24469e108b6fcf7a19907cb49acafe3be6742821e50758259a54c42 extends Twig_Template
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
";
        // line 2
        if ($this->env->getExtension('security')->isGranted("ROLE_USUARIO")) {
            // line 3
            echo "
    ";
            // line 4
            $this->env->loadTemplate("PaqueteBundle:Default:includes/flashes.html.twig")->display($context);
            // line 5
            echo "
    <p>Conectado como: <strong>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "html", null, true);
            echo "</strong></p>
    
    <a href=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_perfil"), "html", null, true);
            echo "\">Ver mi perfil</a>
    <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_logout"), "html", null, true);
            echo "\">Cerrar Sesion</a>
";
        } else {
            // line 11
            echo "    
    ";
            // line 13
            echo "    ";
            // line 14
            echo "    ";
            // line 15
            echo "    
    <h2>Accede a tu cuenta</h2>

    <form action=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login_check"), "html", null, true);
            echo "\" method=\"post\"> 
        <label for=\"login_user\">Email: </label>
        <input type=\"text\" id=\"login_user\" name=\"_username\"
               value=\"";
            // line 21
            echo twig_escape_filter($this->env, ((array_key_exists("last_username", $context)) ? (_twig_default_filter((isset($context["last_username"]) ? $context["last_username"] : null), "")) : ("")), "html", null, true);
            echo "\" />

        <label for=\"login_pass\">Contraseña: </label>
        <input type=\"password\" id=\"login_pass\" name=\"_password\" />

        <input type=\"submit\" value=\"Entrar\" />

        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked />
        <label for=\"remember_me\">";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("No cerrar sesión"), "html", null, true);
            echo "</label>
    </form>
        
";
        }
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Default:cajaLogin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 29,  58 => 18,  53 => 15,  51 => 14,  49 => 13,  46 => 11,  41 => 9,  37 => 8,  32 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,  1188 => 330,  1182 => 329,  1176 => 328,  1170 => 327,  1164 => 326,  1158 => 325,  1152 => 324,  1146 => 323,  1140 => 322,  1124 => 316,  1117 => 315,  1115 => 314,  1112 => 313,  1089 => 309,  1064 => 308,  1062 => 307,  1059 => 306,  1047 => 301,  1042 => 300,  1040 => 299,  1037 => 298,  1028 => 292,  1022 => 290,  1019 => 289,  1014 => 288,  1012 => 287,  1009 => 286,  1002 => 281,  993 => 279,  989 => 278,  986 => 277,  983 => 276,  981 => 275,  978 => 274,  970 => 270,  968 => 269,  965 => 268,  958 => 263,  955 => 262,  947 => 257,  943 => 256,  939 => 255,  936 => 254,  934 => 253,  931 => 252,  923 => 248,  921 => 244,  919 => 243,  916 => 242,  894 => 235,  891 => 234,  888 => 233,  885 => 232,  882 => 231,  879 => 230,  876 => 229,  873 => 228,  870 => 227,  867 => 226,  864 => 225,  862 => 224,  859 => 223,  851 => 217,  848 => 216,  846 => 215,  843 => 214,  835 => 210,  832 => 209,  830 => 208,  827 => 207,  819 => 203,  816 => 202,  814 => 201,  811 => 200,  803 => 196,  800 => 195,  798 => 194,  795 => 193,  787 => 189,  784 => 188,  782 => 187,  779 => 186,  771 => 182,  768 => 181,  766 => 180,  763 => 179,  755 => 175,  753 => 174,  750 => 173,  742 => 169,  739 => 168,  737 => 167,  734 => 166,  726 => 162,  723 => 161,  721 => 160,  719 => 159,  716 => 158,  709 => 153,  699 => 152,  694 => 151,  691 => 150,  685 => 148,  682 => 147,  680 => 146,  677 => 145,  669 => 139,  667 => 138,  666 => 137,  665 => 136,  664 => 135,  659 => 134,  653 => 132,  650 => 131,  648 => 130,  645 => 129,  636 => 123,  632 => 122,  628 => 121,  624 => 120,  619 => 119,  613 => 117,  610 => 116,  608 => 115,  605 => 114,  589 => 110,  587 => 109,  584 => 108,  568 => 104,  566 => 103,  563 => 102,  546 => 98,  534 => 96,  527 => 93,  525 => 92,  520 => 91,  517 => 90,  499 => 89,  497 => 88,  494 => 87,  485 => 82,  482 => 81,  479 => 80,  473 => 78,  471 => 77,  466 => 76,  463 => 75,  460 => 74,  450 => 72,  448 => 71,  440 => 70,  438 => 69,  435 => 68,  429 => 64,  421 => 62,  416 => 61,  412 => 60,  407 => 59,  405 => 58,  402 => 57,  393 => 52,  387 => 50,  384 => 49,  382 => 48,  379 => 47,  369 => 43,  367 => 42,  364 => 41,  356 => 37,  353 => 36,  350 => 35,  347 => 34,  345 => 33,  342 => 32,  334 => 27,  329 => 26,  323 => 24,  321 => 23,  316 => 22,  314 => 21,  311 => 20,  295 => 16,  292 => 15,  290 => 14,  287 => 13,  278 => 8,  272 => 6,  269 => 5,  267 => 4,  264 => 3,  260 => 330,  258 => 329,  256 => 328,  254 => 327,  252 => 326,  250 => 325,  248 => 324,  246 => 323,  244 => 322,  241 => 321,  238 => 319,  236 => 313,  233 => 312,  231 => 306,  228 => 305,  226 => 298,  223 => 297,  220 => 295,  218 => 286,  215 => 285,  213 => 274,  210 => 273,  208 => 268,  205 => 267,  202 => 265,  200 => 262,  197 => 261,  195 => 252,  192 => 251,  190 => 242,  187 => 241,  184 => 239,  182 => 223,  179 => 222,  176 => 220,  174 => 214,  171 => 213,  169 => 207,  166 => 206,  164 => 200,  161 => 199,  159 => 193,  156 => 192,  154 => 186,  151 => 185,  149 => 179,  146 => 178,  144 => 173,  141 => 172,  139 => 166,  136 => 165,  134 => 158,  131 => 157,  129 => 145,  126 => 144,  124 => 129,  121 => 128,  119 => 114,  114 => 108,  111 => 107,  109 => 102,  106 => 101,  101 => 86,  96 => 67,  94 => 57,  91 => 56,  89 => 47,  86 => 46,  84 => 41,  81 => 40,  76 => 31,  74 => 20,  71 => 19,  69 => 13,  66 => 12,  61 => 2,  128 => 68,  116 => 113,  104 => 87,  99 => 68,  87 => 30,  83 => 29,  79 => 32,  68 => 20,  64 => 21,  60 => 18,  54 => 14,  48 => 12,  42 => 9,  38 => 7,  35 => 6,  29 => 5,);
    }
}
