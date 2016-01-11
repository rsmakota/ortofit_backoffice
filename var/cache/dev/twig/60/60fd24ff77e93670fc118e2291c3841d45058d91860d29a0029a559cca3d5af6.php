<?php

/* @WebProfiler/Profiler/header.html.twig */
class __TwigTemplate_d612d5a496b7916ef12093d77447fadf6534a582f3684b12f3004f06304c6491 extends Twig_Template
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
        $__internal_2bf103a5269bdf4a3a01bfc06c698b01d7dc84a95df91a3478ad5d9f2726cbcf = $this->env->getExtension("native_profiler");
        $__internal_2bf103a5269bdf4a3a01bfc06c698b01d7dc84a95df91a3478ad5d9f2726cbcf->enter($__internal_2bf103a5269bdf4a3a01bfc06c698b01d7dc84a95df91a3478ad5d9f2726cbcf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/header.html.twig"));

        // line 1
        echo "<div id=\"header\">
    <div class=\"container\">
        <h1>";
        // line 3
        echo twig_include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
        echo " Symfony <span>Profiler</span></h1>

        <div class=\"search\">
            <form method=\"get\" action=\"https://symfony.com/search\" target=\"_blank\">
                <div class=\"form-row\">
                    <input name=\"q\" id=\"search-id\" type=\"search\" placeholder=\"search on symfony.com\">
                    <button type=\"submit\" class=\"btn\">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
";
        
        $__internal_2bf103a5269bdf4a3a01bfc06c698b01d7dc84a95df91a3478ad5d9f2726cbcf->leave($__internal_2bf103a5269bdf4a3a01bfc06c698b01d7dc84a95df91a3478ad5d9f2726cbcf_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  22 => 1,);
    }
}
/* <div id="header">*/
/*     <div class="container">*/
/*         <h1>{{ include('@WebProfiler/Icon/symfony.svg') }} Symfony <span>Profiler</span></h1>*/
/* */
/*         <div class="search">*/
/*             <form method="get" action="https://symfony.com/search" target="_blank">*/
/*                 <div class="form-row">*/
/*                     <input name="q" id="search-id" type="search" placeholder="search on symfony.com">*/
/*                     <button type="submit" class="btn">Search</button>*/
/*                 </div>*/
/*            </form>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
