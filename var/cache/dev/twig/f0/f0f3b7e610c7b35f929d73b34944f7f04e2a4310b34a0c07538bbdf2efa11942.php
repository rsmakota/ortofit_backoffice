<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_cad95581b79e6889f9b1628a8465e49ed6774167d658b03f47937133ff5a3f87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e4f78926ab9cc05044fef81372d10e793ef0e15acd15511132457d087f22dad3 = $this->env->getExtension("native_profiler");
        $__internal_e4f78926ab9cc05044fef81372d10e793ef0e15acd15511132457d087f22dad3->enter($__internal_e4f78926ab9cc05044fef81372d10e793ef0e15acd15511132457d087f22dad3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e4f78926ab9cc05044fef81372d10e793ef0e15acd15511132457d087f22dad3->leave($__internal_e4f78926ab9cc05044fef81372d10e793ef0e15acd15511132457d087f22dad3_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_45a07b96da3cfaf378db31050eab4aab2e7794d253a8ee4cb42229c156ffb03a = $this->env->getExtension("native_profiler");
        $__internal_45a07b96da3cfaf378db31050eab4aab2e7794d253a8ee4cb42229c156ffb03a->enter($__internal_45a07b96da3cfaf378db31050eab4aab2e7794d253a8ee4cb42229c156ffb03a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_45a07b96da3cfaf378db31050eab4aab2e7794d253a8ee4cb42229c156ffb03a->leave($__internal_45a07b96da3cfaf378db31050eab4aab2e7794d253a8ee4cb42229c156ffb03a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8e2fb7682adb1b192d409a6791a95be8c470f9d407ecf55519acb02fc8ce3e05 = $this->env->getExtension("native_profiler");
        $__internal_8e2fb7682adb1b192d409a6791a95be8c470f9d407ecf55519acb02fc8ce3e05->enter($__internal_8e2fb7682adb1b192d409a6791a95be8c470f9d407ecf55519acb02fc8ce3e05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8e2fb7682adb1b192d409a6791a95be8c470f9d407ecf55519acb02fc8ce3e05->leave($__internal_8e2fb7682adb1b192d409a6791a95be8c470f9d407ecf55519acb02fc8ce3e05_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_09caf196822b63c8d5a54f8b0d7ae991b2bcd22eb62518573ced6e2da3ceaef9 = $this->env->getExtension("native_profiler");
        $__internal_09caf196822b63c8d5a54f8b0d7ae991b2bcd22eb62518573ced6e2da3ceaef9->enter($__internal_09caf196822b63c8d5a54f8b0d7ae991b2bcd22eb62518573ced6e2da3ceaef9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_09caf196822b63c8d5a54f8b0d7ae991b2bcd22eb62518573ced6e2da3ceaef9->leave($__internal_09caf196822b63c8d5a54f8b0d7ae991b2bcd22eb62518573ced6e2da3ceaef9_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
