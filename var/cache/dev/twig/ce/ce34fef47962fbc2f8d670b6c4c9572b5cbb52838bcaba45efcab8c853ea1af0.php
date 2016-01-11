<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_ee7eecd479c930235accfcff5a483761339844e1bd22c1da5cde25b12b032cd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_aaf5ed7ee4bec58a403971ae36745c3adb15e43b813cf24c2238a9b1626d34e1 = $this->env->getExtension("native_profiler");
        $__internal_aaf5ed7ee4bec58a403971ae36745c3adb15e43b813cf24c2238a9b1626d34e1->enter($__internal_aaf5ed7ee4bec58a403971ae36745c3adb15e43b813cf24c2238a9b1626d34e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aaf5ed7ee4bec58a403971ae36745c3adb15e43b813cf24c2238a9b1626d34e1->leave($__internal_aaf5ed7ee4bec58a403971ae36745c3adb15e43b813cf24c2238a9b1626d34e1_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_b96232d6b2670bc050628e61f792a6fcaf603e170eaf9e81307e78762a0b1f1e = $this->env->getExtension("native_profiler");
        $__internal_b96232d6b2670bc050628e61f792a6fcaf603e170eaf9e81307e78762a0b1f1e->enter($__internal_b96232d6b2670bc050628e61f792a6fcaf603e170eaf9e81307e78762a0b1f1e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_b96232d6b2670bc050628e61f792a6fcaf603e170eaf9e81307e78762a0b1f1e->leave($__internal_b96232d6b2670bc050628e61f792a6fcaf603e170eaf9e81307e78762a0b1f1e_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_a0de9bafb654b82001c912186f7659828d4671875ff692902f37831c4ab00519 = $this->env->getExtension("native_profiler");
        $__internal_a0de9bafb654b82001c912186f7659828d4671875ff692902f37831c4ab00519->enter($__internal_a0de9bafb654b82001c912186f7659828d4671875ff692902f37831c4ab00519_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_a0de9bafb654b82001c912186f7659828d4671875ff692902f37831c4ab00519->leave($__internal_a0de9bafb654b82001c912186f7659828d4671875ff692902f37831c4ab00519_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_27478d548158a559f3868f667595d7080e1e97f468addd230f47111533ee29e3 = $this->env->getExtension("native_profiler");
        $__internal_27478d548158a559f3868f667595d7080e1e97f468addd230f47111533ee29e3->enter($__internal_27478d548158a559f3868f667595d7080e1e97f468addd230f47111533ee29e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_27478d548158a559f3868f667595d7080e1e97f468addd230f47111533ee29e3->leave($__internal_27478d548158a559f3868f667595d7080e1e97f468addd230f47111533ee29e3_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
