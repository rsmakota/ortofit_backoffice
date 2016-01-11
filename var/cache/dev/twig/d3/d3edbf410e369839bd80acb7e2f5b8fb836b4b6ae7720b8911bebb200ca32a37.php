<?php

/* @OrtofitBackOffice/Appointment/index.html.twig */
class __TwigTemplate_5cc4a64dd3d77371b6915726bfe7a5cc104800a4b79f933c569c4f8a6c004057 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("OrtofitBackOfficeBundle:Layout:layout.html.twig", "@OrtofitBackOffice/Appointment/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OrtofitBackOfficeBundle:Layout:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bbba433aa551b95814bd4da05c450973d60ad643c4b292f6835c3226956d5522 = $this->env->getExtension("native_profiler");
        $__internal_bbba433aa551b95814bd4da05c450973d60ad643c4b292f6835c3226956d5522->enter($__internal_bbba433aa551b95814bd4da05c450973d60ad643c4b292f6835c3226956d5522_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@OrtofitBackOffice/Appointment/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bbba433aa551b95814bd4da05c450973d60ad643c4b292f6835c3226956d5522->leave($__internal_bbba433aa551b95814bd4da05c450973d60ad643c4b292f6835c3226956d5522_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_1cb398d387fa1b92fb3d6adadafb6c1bb713e54ecdfc38f77c527ab6860ef34d = $this->env->getExtension("native_profiler");
        $__internal_1cb398d387fa1b92fb3d6adadafb6c1bb713e54ecdfc38f77c527ab6860ef34d->enter($__internal_1cb398d387fa1b92fb3d6adadafb6c1bb713e54ecdfc38f77c527ab6860ef34d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <h1>
            Главная
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-calendar\"></i>Расписание</a></li>
        </ol>
    </section>


    <!-- content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <ul id=\"office_tabs\" class=\"nav nav-tabs\" data-tabs=\"tabs\">
                    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : $this->getContext($context, "offices")));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            // line 20
            echo "                        ";
            if (($this->getAttribute($context["office"], "id", array()) == (isset($context["activeOfficeId"]) ? $context["activeOfficeId"] : $this->getContext($context, "activeOfficeId")))) {
                // line 21
                echo "                            <li class=\"active\"><a href=\"#\" data-toggle=\"tab\" class=\"office_link\" office-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "name", array()), "html", null, true);
                echo "</a></li>
                        ";
            } else {
                // line 23
                echo "                            <li><a href=\"#\" data-toggle=\"tab\" class=\"office_link\" office-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "name", array()), "html", null, true);
                echo "</a></li>
                        ";
            }
            // line 25
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                </ul>
                <div class=\"box box-primary\">
                    <div class=\"box-body no-padding\">
                        <!-- THE CALENDAR -->
                        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : $this->getContext($context, "offices")));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            // line 31
            echo "                            ";
            if (($this->getAttribute($context["office"], "id", array()) == (isset($context["activeOfficeId"]) ? $context["activeOfficeId"] : $this->getContext($context, "activeOfficeId")))) {
                // line 32
                echo "                                <div id=\"calendar";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
                echo "\"></div>
                            ";
            } else {
                // line 34
                echo "                                <div id=\"calendar";
                echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
                echo "\" class=\"hidden\"></div>
                            ";
            }
            // line 36
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    <script>
        \$(function () {
            var officeIds = [];
            var calendar = BackOffice.Calendar;
            calendar.initWorkHours('";
        // line 47
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_work_hours");
        echo "');
            calendar.formUrl      = '";
        // line 48
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_get_form");
        echo "';
            calendar.eventsUrl    = '";
        // line 49
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_get_app");
        echo "';
            calendar.eventDataUrl = '";
        // line 50
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_pre_app");
        echo "';
            ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : $this->getContext($context, "offices")));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            // line 52
            echo "            officeIds.push(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
            echo ");
            calendar.init(";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["office"], "id", array()), "html", null, true);
            echo ");
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "
            \$('.office_link').click(function(){
                var officeId = \$(this).attr('office-id');
                var calendarId = null;
                for (var i=0; i<officeIds.length; i++ ) {
                    calendarId = '#calendar' + officeIds[i];
                    if (officeIds[i] == officeId) {
                        \$(calendarId).show();
                        \$(calendarId).removeClass('hidden');
                        \$(calendarId).fullCalendar('render');
                    } else {
                        \$(calendarId).hide();
                    }
                }
            });
        });

    </script>

";
        
        $__internal_1cb398d387fa1b92fb3d6adadafb6c1bb713e54ecdfc38f77c527ab6860ef34d->leave($__internal_1cb398d387fa1b92fb3d6adadafb6c1bb713e54ecdfc38f77c527ab6860ef34d_prof);

    }

    public function getTemplateName()
    {
        return "@OrtofitBackOffice/Appointment/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 55,  155 => 53,  150 => 52,  146 => 51,  142 => 50,  138 => 49,  134 => 48,  130 => 47,  118 => 37,  112 => 36,  106 => 34,  100 => 32,  97 => 31,  93 => 30,  87 => 26,  81 => 25,  73 => 23,  65 => 21,  62 => 20,  58 => 19,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'OrtofitBackOfficeBundle:Layout:layout.html.twig' %}*/
/* {% block body %}*/
/*     <!-- Content Header (Page header) -->*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Главная*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="#"><i class="fa fa-calendar"></i>Расписание</a></li>*/
/*         </ol>*/
/*     </section>*/
/* */
/* */
/*     <!-- content -->*/
/*     <section class="content">*/
/*         <div class="row">*/
/*             <div class="col-md-12">*/
/*                 <ul id="office_tabs" class="nav nav-tabs" data-tabs="tabs">*/
/*                     {% for office in offices %}*/
/*                         {% if office.id == activeOfficeId %}*/
/*                             <li class="active"><a href="#" data-toggle="tab" class="office_link" office-id="{{ office.id }}">{{ office.name }}</a></li>*/
/*                         {% else %}*/
/*                             <li><a href="#" data-toggle="tab" class="office_link" office-id="{{ office.id }}">{{ office.name }}</a></li>*/
/*                         {% endif %}*/
/*                     {% endfor %}*/
/*                 </ul>*/
/*                 <div class="box box-primary">*/
/*                     <div class="box-body no-padding">*/
/*                         <!-- THE CALENDAR -->*/
/*                         {% for office in offices %}*/
/*                             {% if office.id == activeOfficeId %}*/
/*                                 <div id="calendar{{ office.id }}"></div>*/
/*                             {% else %}*/
/*                                 <div id="calendar{{ office.id }}" class="hidden"></div>*/
/*                             {% endif  %}*/
/*                         {% endfor %}*/
/*                     </div><!-- /.box-body -->*/
/*                 </div><!-- /. box -->*/
/*             </div><!-- /.col -->*/
/*         </div><!-- /.row -->*/
/*     </section><!-- /.content -->*/
/* */
/*     <script>*/
/*         $(function () {*/
/*             var officeIds = [];*/
/*             var calendar = BackOffice.Calendar;*/
/*             calendar.initWorkHours('{{ url('backendoffice_appointment_work_hours')   }}');*/
/*             calendar.formUrl      = '{{ url('backendoffice_appointment_get_form') }}';*/
/*             calendar.eventsUrl    = '{{ url('backendoffice_appointment_get_app') }}';*/
/*             calendar.eventDataUrl = '{{ url('backendoffice_appointment_pre_app') }}';*/
/*             {% for office in offices %}*/
/*             officeIds.push({{ office.id }});*/
/*             calendar.init({{ office.id }});*/
/*             {% endfor %}*/
/* */
/*             $('.office_link').click(function(){*/
/*                 var officeId = $(this).attr('office-id');*/
/*                 var calendarId = null;*/
/*                 for (var i=0; i<officeIds.length; i++ ) {*/
/*                     calendarId = '#calendar' + officeIds[i];*/
/*                     if (officeIds[i] == officeId) {*/
/*                         $(calendarId).show();*/
/*                         $(calendarId).removeClass('hidden');*/
/*                         $(calendarId).fullCalendar('render');*/
/*                     } else {*/
/*                         $(calendarId).hide();*/
/*                     }*/
/*                 }*/
/*             });*/
/*         });*/
/* */
/*     </script>*/
/* */
/* {% endblock %}*/
