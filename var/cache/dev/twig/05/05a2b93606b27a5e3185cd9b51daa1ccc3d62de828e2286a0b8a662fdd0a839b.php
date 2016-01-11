<?php

/* @OrtofitBackOffice/Client/index.html.twig */
class __TwigTemplate_8e6d5f4b300fccc07d91b77e14ce4f4ea582ebc75be136b85bfbb4025fc0d0f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("OrtofitBackOfficeBundle:Layout:layout.html.twig", "@OrtofitBackOffice/Client/index.html.twig", 1);
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
        $__internal_6f035fd8c05b71beecf5b13b493909b14c37bebf931e90b7ec29c451dd991067 = $this->env->getExtension("native_profiler");
        $__internal_6f035fd8c05b71beecf5b13b493909b14c37bebf931e90b7ec29c451dd991067->enter($__internal_6f035fd8c05b71beecf5b13b493909b14c37bebf931e90b7ec29c451dd991067_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@OrtofitBackOffice/Client/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f035fd8c05b71beecf5b13b493909b14c37bebf931e90b7ec29c451dd991067->leave($__internal_6f035fd8c05b71beecf5b13b493909b14c37bebf931e90b7ec29c451dd991067_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_3f97fc067d5e7bf533c6d7c79a19769a35af7ec94f4ff12a287164d7dd22b5f4 = $this->env->getExtension("native_profiler");
        $__internal_3f97fc067d5e7bf533c6d7c79a19769a35af7ec94f4ff12a287164d7dd22b5f4->enter($__internal_3f97fc067d5e7bf533c6d7c79a19769a35af7ec94f4ff12a287164d7dd22b5f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <h1>
            Клиенты
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_clients");
        echo "\"><i class=\"fa fa-users\"></i>Список клиентов</a></li>
        </ol>
    </section>
    <!-- content -->
    <section class=\"content\">

        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">Список клиентов</h3>
                        <div class=\"box-tools\">
                            <div class=\"input-group\" style=\"width: 150px;\">
                                <input class=\"form-control input-sm pull-right\" type=\"text\" placeholder=\"Поиск\" name=\"table_search\">
                                <div class=\"input-group-btn\">
                                    <button class=\"btn btn-sm btn-default\">
                                        <i class=\"fa fa-search\"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"box-body no-padding\">
                        <table class=\"table table-striped table-hover\">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Пол</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Источник</th>
                                <th>Стал клиентом</th>
                                <th>Человек</th>
                                <th> - </th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : $this->getContext($context, "clients")));
        foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
            // line 47
            echo "                                <tr>
                                    <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "id", array()), "html", null, true);
            echo "</td>
                                    <td>
                                        ";
            // line 50
            if (($this->getAttribute($context["client"], "gender", array()) == "male")) {
                // line 51
                echo "                                            <i class=\"fa fa-mars\"></i>
                                        ";
            } elseif (($this->getAttribute(            // line 52
$context["client"], "gender", array()) == "female")) {
                // line 53
                echo "                                            <i class=\"fa fa-venus\"></i>
                                        ";
            } else {
                // line 55
                echo "                                            -
                                        ";
            }
            // line 57
            echo "                                    </td>
                                    <td><a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("backendoffice_person", array("clientId" => $this->getAttribute($context["client"], "id", array()))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["client"], "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["client"], "name", array()), "------")) : ("------")), "html", null, true);
            echo " </a></td>
                                    <td>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "msisdn", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 60
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["client"], "getClientDirection", array(), "method", false, true), "getName", array(), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["client"], "getClientDirection", array(), "method", false, true), "getName", array(), "method"), "------")) : ("------")), "html", null, true);
            echo "</td>
                                    <td>";
            // line 61
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["client"], "getCreated", array(), "method"), "d/m/Y"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["client"], "getPersons", array(), "method"), "count", array(), "method"), "html", null, true);
            echo "</td>
                                    <td><i class=\"fa fa-pencil edit\" style=\"cursor: pointer;\" client-id=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "id", array()), "html", null, true);
            echo "\"></i></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
                            </tbody>
                        </table>
                    </div>
                    <div class=\"box-footer\">
                        <div class=\"row\">
                            <div class=\"col-sm-5\">
                                <button type=\"button\" class=\"btn btn-primary\" id=\"newClient\">Новый клиент</button>
                            </div>
                            <div class=\"col-sm-7\">
                                <ul class=\"pagination\" style=\"margin: auto\">
                                    <li id=\"previous\" class=\"paginate_button previous ";
        // line 77
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "previous", array()) == null)) {
            echo "disabled";
        }
        echo "\">
                                        <a href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("backendoffice_appointment_clients", array("page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "previous", array()))), "html", null, true);
        echo "\" aria-controls=\"example2\" data-dt-idx=\"0\" tabindex=\"0\">Previous</a>
                                    </li>

                                    ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "count", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 82
            echo "                                        <li class=\"paginate_button ";
            if (($context["i"] == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "current", array()))) {
                echo " active ";
            }
            echo "\">
                                            <a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("backendoffice_appointment_clients", array("page" => $context["i"])), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "</a>
                                        </li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "
                                    <li id=\"next\" class=\"paginate_button next ";
        // line 87
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "next", array()) == null)) {
            echo "disabled";
        }
        echo "\">
                                        <a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("backendoffice_appointment_clients", array("page" => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : $this->getContext($context, "paginator")), "next", array()))), "html", null, true);
        echo "\" >Next</a>
                                    </li>
                                </ul>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        \$(document).ready(function() {
            \$('#newClient').click(function (e) {
                BackOffice.Modal.load('";
        // line 101
        echo $this->env->getExtension('routing')->getUrl("backendoffice_clients_form");
        echo "', {});
            });
            \$('.edit').click(function (){
                var clientId = \$(this).attr('client-id');
                BackOffice.Modal.load('";
        // line 105
        echo $this->env->getExtension('routing')->getUrl("backendoffice_clients_form");
        echo "', {id:clientId});
            });
        });
    </script>
";
        
        $__internal_3f97fc067d5e7bf533c6d7c79a19769a35af7ec94f4ff12a287164d7dd22b5f4->leave($__internal_3f97fc067d5e7bf533c6d7c79a19769a35af7ec94f4ff12a287164d7dd22b5f4_prof);

    }

    public function getTemplateName()
    {
        return "@OrtofitBackOffice/Client/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 105,  221 => 101,  205 => 88,  199 => 87,  196 => 86,  185 => 83,  178 => 82,  174 => 81,  168 => 78,  162 => 77,  149 => 66,  140 => 63,  136 => 62,  132 => 61,  128 => 60,  124 => 59,  118 => 58,  115 => 57,  111 => 55,  107 => 53,  105 => 52,  102 => 51,  100 => 50,  95 => 48,  92 => 47,  88 => 46,  48 => 9,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'OrtofitBackOfficeBundle:Layout:layout.html.twig' %}*/
/* {% block body %}*/
/*     <!-- Content Header (Page header) -->*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Клиенты*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="{{ url('backendoffice_appointment_clients') }}"><i class="fa fa-users"></i>Список клиентов</a></li>*/
/*         </ol>*/
/*     </section>*/
/*     <!-- content -->*/
/*     <section class="content">*/
/* */
/*         <div class="row">*/
/*             <div class="col-md-12">*/
/*                 <div class="box box-primary">*/
/*                     <div class="box-header">*/
/*                         <h3 class="box-title">Список клиентов</h3>*/
/*                         <div class="box-tools">*/
/*                             <div class="input-group" style="width: 150px;">*/
/*                                 <input class="form-control input-sm pull-right" type="text" placeholder="Поиск" name="table_search">*/
/*                                 <div class="input-group-btn">*/
/*                                     <button class="btn btn-sm btn-default">*/
/*                                         <i class="fa fa-search"></i>*/
/*                                     </button>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="box-body no-padding">*/
/*                         <table class="table table-striped table-hover">*/
/*                             <thead>*/
/*                             <tr>*/
/*                                 <th>#</th>*/
/*                                 <th>Пол</th>*/
/*                                 <th>Имя</th>*/
/*                                 <th>Телефон</th>*/
/*                                 <th>Источник</th>*/
/*                                 <th>Стал клиентом</th>*/
/*                                 <th>Человек</th>*/
/*                                 <th> - </th>*/
/*                             </tr>*/
/*                             </thead>*/
/*                             <tbody>*/
/*                             {% for client in clients %}*/
/*                                 <tr>*/
/*                                     <td>{{ client.id  }}</td>*/
/*                                     <td>*/
/*                                         {% if client.gender == 'male' %}*/
/*                                             <i class="fa fa-mars"></i>*/
/*                                         {% elseif client.gender == 'female' %}*/
/*                                             <i class="fa fa-venus"></i>*/
/*                                         {% else %}*/
/*                                             -*/
/*                                         {% endif %}*/
/*                                     </td>*/
/*                                     <td><a href="{{ url('backendoffice_person', {'clientId':client.id}) }}"> {{ client.name|default('------')  }} </a></td>*/
/*                                     <td>{{ client.msisdn  }}</td>*/
/*                                     <td>{{ client.getClientDirection().getName()|default('------')  }}</td>*/
/*                                     <td>{{ client.getCreated()|date('d/m/Y')  }}</td>*/
/*                                     <td>{{ client.getPersons().count()  }}</td>*/
/*                                     <td><i class="fa fa-pencil edit" style="cursor: pointer;" client-id="{{ client.id }}"></i></td>*/
/*                                 </tr>*/
/*                             {% endfor  %}*/
/* */
/*                             </tbody>*/
/*                         </table>*/
/*                     </div>*/
/*                     <div class="box-footer">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-5">*/
/*                                 <button type="button" class="btn btn-primary" id="newClient">Новый клиент</button>*/
/*                             </div>*/
/*                             <div class="col-sm-7">*/
/*                                 <ul class="pagination" style="margin: auto">*/
/*                                     <li id="previous" class="paginate_button previous {% if paginator.previous == null %}disabled{% endif %}">*/
/*                                         <a href="{{ url('backendoffice_appointment_clients',{'page':paginator.previous}) }}" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>*/
/*                                     </li>*/
/* */
/*                                     {% for i in 1..paginator.count %}*/
/*                                         <li class="paginate_button {% if i == paginator.current %} active {% endif %}">*/
/*                                             <a href="{{ url('backendoffice_appointment_clients',{'page':i}) }}" >{{ i }}</a>*/
/*                                         </li>*/
/*                                     {% endfor %}*/
/* */
/*                                     <li id="next" class="paginate_button next {% if paginator.next == null %}disabled{% endif %}">*/
/*                                         <a href="{{ url('backendoffice_appointment_clients',{'page':paginator.next}) }}" >Next</a>*/
/*                                     </li>*/
/*                                 </ul>*/
/*                             </div>*/
/* */
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/*     <script>*/
/*         $(document).ready(function() {*/
/*             $('#newClient').click(function (e) {*/
/*                 BackOffice.Modal.load('{{ url('backendoffice_clients_form') }}', {});*/
/*             });*/
/*             $('.edit').click(function (){*/
/*                 var clientId = $(this).attr('client-id');*/
/*                 BackOffice.Modal.load('{{ url('backendoffice_clients_form') }}', {id:clientId});*/
/*             });*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
