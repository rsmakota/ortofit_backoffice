<?php

/* OrtofitBackOfficeBundle:Layout:layout.html.twig */
class __TwigTemplate_ab1246d149864ee5d36db7c5a24de83ffedf967df9d562f806df018df59201ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8e8378b1ed262a27143e3ee18e4489106772c3e8427249162a899065933cf970 = $this->env->getExtension("native_profiler");
        $__internal_8e8378b1ed262a27143e3ee18e4489106772c3e8427249162a899065933cf970->enter($__internal_8e8378b1ed262a27143e3ee18e4489106772c3e8427249162a899065933cf970_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "OrtofitBackOfficeBundle:Layout:layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 6
        echo "</title>
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <link href=\"";
        // line 8
        echo "../bundles/ortofitbackoffice/bootstrap/css/bootstrap.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 9
        echo "../bundles/ortofitbackoffice/dist/css/AdminLTE.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 10
        echo "../bundles/ortofitbackoffice/dist/css/skins/_all-skins.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 11
        echo "../bundles/ortofitbackoffice/plugins/iCheck/square/blue.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 12
        echo "../bundles/ortofitbackoffice/plugins/iCheck/all.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 13
        echo "../bundles/ortofitbackoffice/plugins/daterangepicker/daterangepicker-bs3.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 14
        echo "../bundles/ortofitbackoffice/plugins/colorpicker/bootstrap-colorpicker.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 15
        echo "../bundles/ortofitbackoffice/plugins/timepicker/bootstrap-timepicker.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 16
        echo "../bundles/ortofitbackoffice/plugins/datepicker/datepicker3.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 17
        echo "../bundles/ortofitbackoffice/plugins/select2/select2.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 18
        echo "../bundles/ortofitbackoffice/dist/css/AdminLTE.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 19
        echo "../bundles/ortofitbackoffice/dist/css/skins/_all-skins.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 20
        echo "../bundles/ortofitbackoffice/plugins/fullcalendar/fullcalendar.min.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 21
        echo "../bundles/ortofitbackoffice/plugins/fullcalendar/fullcalendar.print.css";
        echo "\" rel=\"stylesheet\" media=\"print\" type=\"text/css\" />


    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">

    <link href=\"";
        // line 27
        echo "../bundles/ortofitbackoffice/css/custom.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

    ";
        // line 36
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "8a8e187_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_0") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_jQuery-2.1.4.min_1.js");
            // line 64
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_1") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_bootstrap.min_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_2") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_bootstrap_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_3") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_fastclick.min_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_4") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_app.min_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_5") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_demo_6.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_6") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_moment.min_7.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_7") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_select2.full.min_8.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_8") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_jquery.inputmask_9.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_9") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_jquery.inputmask.date.extensions_10.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_10") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_jquery.inputmask.extensions_11.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_11") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_bootstrap-datepicker_12.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_12") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_bootstrap-colorpicker.min_13.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_13") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_bootstrap-timepicker.min_14.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_14") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_jquery.slimscroll.min_15.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_15") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_icheck.min_16.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_16") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_fullcalendar.min_18.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_17"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_17") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_fullcalendar_19.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_18"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_18") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Core_20.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_19"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_19") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Transport_21.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_20"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_20") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Modal_22.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_21"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_21") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_AppForm_23.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_22"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_22") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Calendar_24.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_23"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_23") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Diagnosis_25.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "8a8e187_24"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187_24") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187_Person_26.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "8a8e187"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8a8e187") : $this->env->getExtension('asset')->getAssetUrl("js/8a8e187.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 66
        echo "
    <script>
        \$(function () {
            \$('#appButton').click(function (e) {
                BackOffice.Modal.load('";
        // line 70
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_get_form");
        echo "', {});
            });
        });

    </script>

    <script src=\"https://code.jquery.com/ui/1.11.4/jquery-ui.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js\"></script>

</head>
<body class=\"hold-transition skin-blue sidebar-mini\">
<div class=\"wrapper\">

    <header class=\"main-header\">
        <!-- Logo -->
        <a href=\"../../index2.html\" class=\"logo\">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class=\"logo-mini\"><b>O</b>ft</span>
            <!-- logo for regular state and mobile devices -->
            <span class=\"logo-lg\"><b>Admin</b>Ortofit</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class=\"navbar navbar-static-top\" role=\"navigation\">
            <!-- Sidebar toggle button-->
            <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </a>
            <div class=\"navbar-custom-menu\">
                <ul class=\"nav navbar-nav\">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class=\"dropdown messages-menu\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-envelope-o\"></i>
                            ";
        // line 107
        echo "                        </a>
                        ";
        // line 109
        echo "                            ";
        // line 110
        echo "                            ";
        // line 111
        echo "                                ";
        // line 112
        echo "                                ";
        // line 113
        echo "                                    ";
        // line 114
        echo "                                        ";
        // line 115
        echo "                                            ";
        // line 116
        echo "                                                ";
        // line 117
        echo "                                            ";
        // line 118
        echo "                                            ";
        // line 119
        echo "                                                ";
        // line 120
        echo "                                                ";
        // line 121
        echo "                                            ";
        // line 122
        echo "                                            ";
        // line 123
        echo "                                        ";
        // line 124
        echo "                                    ";
        // line 125
        echo "                                    ";
        // line 126
        echo "                                        ";
        // line 127
        echo "                                            ";
        // line 128
        echo "                                                ";
        // line 129
        echo "                                            ";
        // line 130
        echo "                                            ";
        // line 131
        echo "                                                ";
        // line 132
        echo "                                                ";
        // line 133
        echo "                                            ";
        // line 134
        echo "                                            ";
        // line 135
        echo "                                        ";
        // line 136
        echo "                                    ";
        // line 137
        echo "                                    ";
        // line 138
        echo "                                        ";
        // line 139
        echo "                                            ";
        // line 140
        echo "                                                ";
        // line 141
        echo "                                            ";
        // line 142
        echo "                                            ";
        // line 143
        echo "                                                ";
        // line 144
        echo "                                                ";
        // line 145
        echo "                                            ";
        // line 146
        echo "                                            ";
        // line 147
        echo "                                        ";
        // line 148
        echo "                                    ";
        // line 149
        echo "                                    ";
        // line 150
        echo "                                        ";
        // line 151
        echo "                                            ";
        // line 152
        echo "                                                ";
        // line 153
        echo "                                            ";
        // line 154
        echo "                                            ";
        // line 155
        echo "                                                ";
        // line 156
        echo "                                                ";
        // line 157
        echo "                                            ";
        // line 158
        echo "                                            ";
        // line 159
        echo "                                        ";
        // line 160
        echo "                                    ";
        // line 161
        echo "                                    ";
        // line 162
        echo "                                        ";
        // line 163
        echo "                                            ";
        // line 164
        echo "                                                ";
        // line 165
        echo "                                            ";
        // line 166
        echo "                                            ";
        // line 167
        echo "                                                ";
        // line 168
        echo "                                                ";
        // line 169
        echo "                                            ";
        // line 170
        echo "                                            ";
        // line 171
        echo "                                        ";
        // line 172
        echo "                                    ";
        // line 173
        echo "                                ";
        // line 174
        echo "                            ";
        // line 175
        echo "                            ";
        // line 176
        echo "                        ";
        // line 177
        echo "                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class=\"dropdown notifications-menu\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-bell-o\"></i>
                            ";
        // line 183
        echo "                        </a>
                        ";
        // line 185
        echo "                            ";
        // line 186
        echo "                            ";
        // line 187
        echo "                                ";
        // line 188
        echo "                                ";
        // line 189
        echo "                                    ";
        // line 190
        echo "                                        ";
        // line 191
        echo "                                            ";
        // line 192
        echo "                                        ";
        // line 193
        echo "                                    ";
        // line 194
        echo "                                    ";
        // line 195
        echo "                                        ";
        // line 196
        echo "                                            ";
        // line 197
        echo "                                        ";
        // line 198
        echo "                                    ";
        // line 199
        echo "                                    ";
        // line 200
        echo "                                        ";
        // line 201
        echo "                                            ";
        // line 202
        echo "                                        ";
        // line 203
        echo "                                    ";
        // line 204
        echo "                                    ";
        // line 205
        echo "                                        ";
        // line 206
        echo "                                            ";
        // line 207
        echo "                                        ";
        // line 208
        echo "                                    ";
        // line 209
        echo "                                    ";
        // line 210
        echo "                                        ";
        // line 211
        echo "                                            ";
        // line 212
        echo "                                        ";
        // line 213
        echo "                                    ";
        // line 214
        echo "                                ";
        // line 215
        echo "                            ";
        // line 216
        echo "                            ";
        // line 217
        echo "                        ";
        // line 218
        echo "                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class=\"dropdown tasks-menu\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-flag-o\"></i>
                            ";
        // line 224
        echo "                        </a>
                        ";
        // line 226
        echo "                            ";
        // line 227
        echo "                            ";
        // line 228
        echo "                                ";
        // line 229
        echo "                                ";
        // line 230
        echo "                                    ";
        // line 231
        echo "                                        ";
        // line 232
        echo "                                            ";
        // line 233
        echo "                                                ";
        // line 234
        echo "                                                ";
        // line 235
        echo "                                            ";
        // line 236
        echo "                                            ";
        // line 237
        echo "                                                ";
        // line 238
        echo "                                                    ";
        // line 239
        echo "                                                ";
        // line 240
        echo "                                            ";
        // line 241
        echo "                                        ";
        // line 242
        echo "                                    ";
        // line 243
        echo "                                    ";
        // line 244
        echo "                                        ";
        // line 245
        echo "                                            ";
        // line 246
        echo "                                                ";
        // line 247
        echo "                                                ";
        // line 248
        echo "                                            ";
        // line 249
        echo "                                            ";
        // line 250
        echo "                                                ";
        // line 251
        echo "                                                    ";
        // line 252
        echo "                                                ";
        // line 253
        echo "                                            ";
        // line 254
        echo "                                        ";
        // line 255
        echo "                                    ";
        // line 256
        echo "                                    ";
        // line 257
        echo "                                        ";
        // line 258
        echo "                                            ";
        // line 259
        echo "                                                ";
        // line 260
        echo "                                                ";
        // line 261
        echo "                                            ";
        // line 262
        echo "                                            ";
        // line 263
        echo "                                                ";
        // line 264
        echo "                                                    ";
        // line 265
        echo "                                                ";
        // line 266
        echo "                                            ";
        // line 267
        echo "                                        ";
        // line 268
        echo "                                    ";
        // line 269
        echo "                                    ";
        // line 270
        echo "                                        ";
        // line 271
        echo "                                            ";
        // line 272
        echo "                                                ";
        // line 273
        echo "                                                ";
        // line 274
        echo "                                            ";
        // line 275
        echo "                                            ";
        // line 276
        echo "                                                ";
        // line 277
        echo "                                                    ";
        // line 278
        echo "                                                ";
        // line 279
        echo "                                            ";
        // line 280
        echo "                                        ";
        // line 281
        echo "                                    ";
        // line 282
        echo "                                ";
        // line 283
        echo "                            ";
        // line 284
        echo "                            ";
        // line 285
        echo "                                ";
        // line 286
        echo "                            ";
        // line 287
        echo "                        ";
        // line 288
        echo "                    </li>

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class=\"main-sidebar\">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class=\"sidebar\">
            <!-- Sidebar user panel -->
            <div class=\"user-panel\">
                <button class=\"btn btn-block btn-success\" id=\"appButton\"><i class=\"fa fa-fw fa-calendar-plus-o\"></i> <span>Запись</span></button>
            </div>



            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class=\"sidebar-menu\">
                <li class=\"header\">Главное Мею</li>
                <li class=\"treeview\">
                    <a href=\"";
        // line 313
        echo $this->env->getExtension('routing')->getUrl("admin_panel");
        echo "\">
                        <i class=\"fa fa-calendar\"></i> <span>Расписание</span>
                    </a>
                </li>
                <li class=\"treeview\">
                    <a href=\"";
        // line 318
        echo $this->env->getExtension('routing')->getUrl("backendoffice_appointment_clients");
        echo "\">
                        <i class=\"fa fa-users\"></i> <span>Клиенты</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class=\"content-wrapper\">
        ";
        // line 330
        $this->displayBlock('body', $context, $blocks);
        // line 333
        echo "    </div><!-- /.content-wrapper -->
    <footer class=\"main-footer\">
        <div class=\"pull-right hidden-xs\">
            <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2015 <a href=\"http://ortofit.com.ua\">Ortofit</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class=\"control-sidebar control-sidebar-dark\">
        <!-- Create the tabs -->
        <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
            <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
            <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class=\"tab-content\">
            <!-- Home tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">
                <h3 class=\"control-sidebar-heading\">Recent Activity</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript::;\">
                            <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>
                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <i class=\"menu-icon fa fa-user bg-yellow\"></i>
                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>
                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <i class=\"menu-icon fa fa-file-code-o bg-green\"></i>
                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript::;\">
                            <h4 class=\"control-sidebar-subheading\">
                                Custom Template Design
                                <span class=\"label label-danger pull-right\">70%</span>
                            </h4>
                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <h4 class=\"control-sidebar-subheading\">
                                Update Resume
                                <span class=\"label label-success pull-right\">95%</span>
                            </h4>
                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <h4 class=\"control-sidebar-subheading\">
                                Laravel Integration
                                <span class=\"label label-warning pull-right\">50%</span>
                            </h4>
                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=\"javascript::;\">
                            <h4 class=\"control-sidebar-subheading\">
                                Back End Framework
                                <span class=\"label label-primary pull-right\">68%</span>
                            </h4>
                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-stats-tab\">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
                <form method=\"post\">
                    <h3 class=\"control-sidebar-heading\">General Settings</h3>
                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Report panel usage
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Allow mail redirect
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div><!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Expose author name in posts
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div><!-- /.form-group -->

                    <h3 class=\"control-sidebar-heading\">Chat Settings</h3>

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Show me as online
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                    </div><!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Turn off notifications
                            <input type=\"checkbox\" class=\"pull-right\">
                        </label>
                    </div><!-- /.form-group -->

                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Delete chat history
                            <a href=\"javascript::;\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>
                        </label>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class=\"control-sidebar-bg\"></div>
</div><!-- ./wrapper -->

<div class=\"modal fade\" id=\"appointmentModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
";
        // line 510
        echo "</div>

</body>
</html>
";
        
        $__internal_8e8378b1ed262a27143e3ee18e4489106772c3e8427249162a899065933cf970->leave($__internal_8e8378b1ed262a27143e3ee18e4489106772c3e8427249162a899065933cf970_prof);

    }

    // line 330
    public function block_body($context, array $blocks = array())
    {
        $__internal_336edbe1e17b154dcc4bc92ebd583d7064cbd9a00e5132ef40e116a656f9bda7 = $this->env->getExtension("native_profiler");
        $__internal_336edbe1e17b154dcc4bc92ebd583d7064cbd9a00e5132ef40e116a656f9bda7->enter($__internal_336edbe1e17b154dcc4bc92ebd583d7064cbd9a00e5132ef40e116a656f9bda7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 331
        echo "
        ";
        
        $__internal_336edbe1e17b154dcc4bc92ebd583d7064cbd9a00e5132ef40e116a656f9bda7->leave($__internal_336edbe1e17b154dcc4bc92ebd583d7064cbd9a00e5132ef40e116a656f9bda7_prof);

    }

    public function getTemplateName()
    {
        return "OrtofitBackOfficeBundle:Layout:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  910 => 331,  904 => 330,  893 => 510,  715 => 333,  713 => 330,  698 => 318,  690 => 313,  663 => 288,  661 => 287,  659 => 286,  657 => 285,  655 => 284,  653 => 283,  651 => 282,  649 => 281,  647 => 280,  645 => 279,  643 => 278,  641 => 277,  639 => 276,  637 => 275,  635 => 274,  633 => 273,  631 => 272,  629 => 271,  627 => 270,  625 => 269,  623 => 268,  621 => 267,  619 => 266,  617 => 265,  615 => 264,  613 => 263,  611 => 262,  609 => 261,  607 => 260,  605 => 259,  603 => 258,  601 => 257,  599 => 256,  597 => 255,  595 => 254,  593 => 253,  591 => 252,  589 => 251,  587 => 250,  585 => 249,  583 => 248,  581 => 247,  579 => 246,  577 => 245,  575 => 244,  573 => 243,  571 => 242,  569 => 241,  567 => 240,  565 => 239,  563 => 238,  561 => 237,  559 => 236,  557 => 235,  555 => 234,  553 => 233,  551 => 232,  549 => 231,  547 => 230,  545 => 229,  543 => 228,  541 => 227,  539 => 226,  536 => 224,  529 => 218,  527 => 217,  525 => 216,  523 => 215,  521 => 214,  519 => 213,  517 => 212,  515 => 211,  513 => 210,  511 => 209,  509 => 208,  507 => 207,  505 => 206,  503 => 205,  501 => 204,  499 => 203,  497 => 202,  495 => 201,  493 => 200,  491 => 199,  489 => 198,  487 => 197,  485 => 196,  483 => 195,  481 => 194,  479 => 193,  477 => 192,  475 => 191,  473 => 190,  471 => 189,  469 => 188,  467 => 187,  465 => 186,  463 => 185,  460 => 183,  453 => 177,  451 => 176,  449 => 175,  447 => 174,  445 => 173,  443 => 172,  441 => 171,  439 => 170,  437 => 169,  435 => 168,  433 => 167,  431 => 166,  429 => 165,  427 => 164,  425 => 163,  423 => 162,  421 => 161,  419 => 160,  417 => 159,  415 => 158,  413 => 157,  411 => 156,  409 => 155,  407 => 154,  405 => 153,  403 => 152,  401 => 151,  399 => 150,  397 => 149,  395 => 148,  393 => 147,  391 => 146,  389 => 145,  387 => 144,  385 => 143,  383 => 142,  381 => 141,  379 => 140,  377 => 139,  375 => 138,  373 => 137,  371 => 136,  369 => 135,  367 => 134,  365 => 133,  363 => 132,  361 => 131,  359 => 130,  357 => 129,  355 => 128,  353 => 127,  351 => 126,  349 => 125,  347 => 124,  345 => 123,  343 => 122,  341 => 121,  339 => 120,  337 => 119,  335 => 118,  333 => 117,  331 => 116,  329 => 115,  327 => 114,  325 => 113,  323 => 112,  321 => 111,  319 => 110,  317 => 109,  314 => 107,  275 => 70,  269 => 66,  111 => 64,  107 => 36,  95 => 27,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  42 => 10,  38 => 9,  34 => 8,  30 => 6,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <title>{#{{ title }}#}</title>*/
/*     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">*/
/*     <link href="{{ '../bundles/ortofitbackoffice/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/dist/css/AdminLTE.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/dist/css/skins/_all-skins.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/iCheck/square/blue.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/iCheck/all.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/daterangepicker/daterangepicker-bs3.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/colorpicker/bootstrap-colorpicker.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/timepicker/bootstrap-timepicker.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/datepicker/datepicker3.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/select2/select2.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/dist/css/AdminLTE.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/dist/css/skins/_all-skins.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/fullcalendar/fullcalendar.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/fullcalendar/fullcalendar.print.css' }}" rel="stylesheet" media="print" type="text/css" />*/
/* */
/* */
/*     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/*     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">*/
/* */
/*     <link href="{{ '../bundles/ortofitbackoffice/css/custom.css' }}" rel="stylesheet" type="text/css" />*/
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/*     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/*     {% javascripts*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/jQuery/jQuery-2.1.4.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/bootstrap/js/bootstrap.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/bootstrap/js/bootstrap.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/fastclick/fastclick.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/dist/js/app.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/dist/js/demo.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/dist/js/moment.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/select2/select2.full.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/input-mask/jquery.inputmask.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/input-mask/jquery.inputmask.date.extensions.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/input-mask/jquery.inputmask.extensions.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/datepicker/bootstrap-datepicker.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/colorpicker/bootstrap-colorpicker.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/timepicker/bootstrap-timepicker.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/slimScroll/jquery.slimscroll.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/iCheck/icheck.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/fastclick/fastclick.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/fullcalendar/fullcalendar.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/fullcalendar/fullcalendar.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Core.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Transport.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Modal.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/AppForm.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Calendar.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Diagnosis.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/js/Person.js'*/
/*     %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/*     <script>*/
/*         $(function () {*/
/*             $('#appButton').click(function (e) {*/
/*                 BackOffice.Modal.load('{{ url('backendoffice_appointment_get_form') }}', {});*/
/*             });*/
/*         });*/
/* */
/*     </script>*/
/* */
/*     <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>*/
/*     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>*/
/* */
/* </head>*/
/* <body class="hold-transition skin-blue sidebar-mini">*/
/* <div class="wrapper">*/
/* */
/*     <header class="main-header">*/
/*         <!-- Logo -->*/
/*         <a href="../../index2.html" class="logo">*/
/*             <!-- mini logo for sidebar mini 50x50 pixels -->*/
/*             <span class="logo-mini"><b>O</b>ft</span>*/
/*             <!-- logo for regular state and mobile devices -->*/
/*             <span class="logo-lg"><b>Admin</b>Ortofit</span>*/
/*         </a>*/
/*         <!-- Header Navbar: style can be found in header.less -->*/
/*         <nav class="navbar navbar-static-top" role="navigation">*/
/*             <!-- Sidebar toggle button-->*/
/*             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">*/
/*                 <span class="sr-only">Toggle navigation</span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*             </a>*/
/*             <div class="navbar-custom-menu">*/
/*                 <ul class="nav navbar-nav">*/
/*                     <!-- Messages: style can be found in dropdown.less-->*/
/*                     <li class="dropdown messages-menu">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                             <i class="fa fa-envelope-o"></i>*/
/*                             {#<span class="label label-success">4</span>#}*/
/*                         </a>*/
/*                         {#<ul class="dropdown-menu">#}*/
/*                             {#<li class="header">You have 4 messages</li>#}*/
/*                             {#<li>#}*/
/*                                 {#<!-- inner menu: contains the actual data -->#}*/
/*                                 {#<ul class="menu">#}*/
/*                                     {#<li><!-- start message -->#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<div class="pull-left">#}*/
/*                                                 {#<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">#}*/
/*                                             {#</div>#}*/
/*                                             {#<h4>#}*/
/*                                                 {#Support Team#}*/
/*                                                 {#<small><i class="fa fa-clock-o"></i> 5 mins</small>#}*/
/*                                             {#</h4>#}*/
/*                                             {#<p>Why not buy a new awesome theme?</p>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li><!-- end message -->#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<div class="pull-left">#}*/
/*                                                 {#<img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">#}*/
/*                                             {#</div>#}*/
/*                                             {#<h4>#}*/
/*                                                 {#AdminLTE Design Team#}*/
/*                                                 {#<small><i class="fa fa-clock-o"></i> 2 hours</small>#}*/
/*                                             {#</h4>#}*/
/*                                             {#<p>Why not buy a new awesome theme?</p>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<div class="pull-left">#}*/
/*                                                 {#<img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">#}*/
/*                                             {#</div>#}*/
/*                                             {#<h4>#}*/
/*                                                 {#Developers#}*/
/*                                                 {#<small><i class="fa fa-clock-o"></i> Today</small>#}*/
/*                                             {#</h4>#}*/
/*                                             {#<p>Why not buy a new awesome theme?</p>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<div class="pull-left">#}*/
/*                                                 {#<img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">#}*/
/*                                             {#</div>#}*/
/*                                             {#<h4>#}*/
/*                                                 {#Sales Department#}*/
/*                                                 {#<small><i class="fa fa-clock-o"></i> Yesterday</small>#}*/
/*                                             {#</h4>#}*/
/*                                             {#<p>Why not buy a new awesome theme?</p>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<div class="pull-left">#}*/
/*                                                 {#<img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">#}*/
/*                                             {#</div>#}*/
/*                                             {#<h4>#}*/
/*                                                 {#Reviewers#}*/
/*                                                 {#<small><i class="fa fa-clock-o"></i> 2 days</small>#}*/
/*                                             {#</h4>#}*/
/*                                             {#<p>Why not buy a new awesome theme?</p>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                 {#</ul>#}*/
/*                             {#</li>#}*/
/*                             {#<li class="footer"><a href="#">See All Messages</a></li>#}*/
/*                         {#</ul>#}*/
/*                     </li>*/
/*                     <!-- Notifications: style can be found in dropdown.less -->*/
/*                     <li class="dropdown notifications-menu">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                             <i class="fa fa-bell-o"></i>*/
/*                             {#<span class="label label-warning">10</span>#}*/
/*                         </a>*/
/*                         {#<ul class="dropdown-menu">#}*/
/*                             {#<li class="header">You have 10 notifications</li>#}*/
/*                             {#<li>#}*/
/*                                 {#<!-- inner menu: contains the actual data -->#}*/
/*                                 {#<ul class="menu">#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<i class="fa fa-users text-aqua"></i> 5 new members joined today#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<i class="fa fa-users text-red"></i> 5 new members joined#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<i class="fa fa-shopping-cart text-green"></i> 25 sales made#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                     {#<li>#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<i class="fa fa-user text-red"></i> You changed your username#}*/
/*                                         {#</a>#}*/
/*                                     {#</li>#}*/
/*                                 {#</ul>#}*/
/*                             {#</li>#}*/
/*                             {#<li class="footer"><a href="#">View all</a></li>#}*/
/*                         {#</ul>#}*/
/*                     </li>*/
/*                     <!-- Tasks: style can be found in dropdown.less -->*/
/*                     <li class="dropdown tasks-menu">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                             <i class="fa fa-flag-o"></i>*/
/*                             {#<span class="label label-danger">9</span>#}*/
/*                         </a>*/
/*                         {#<ul class="dropdown-menu">#}*/
/*                             {#<li class="header">You have 9 tasks</li>#}*/
/*                             {#<li>#}*/
/*                                 {#<!-- inner menu: contains the actual data -->#}*/
/*                                 {#<ul class="menu">#}*/
/*                                     {#<li><!-- Task item -->#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<h3>#}*/
/*                                                 {#Design some buttons#}*/
/*                                                 {#<small class="pull-right">20%</small>#}*/
/*                                             {#</h3>#}*/
/*                                             {#<div class="progress xs">#}*/
/*                                                 {#<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">#}*/
/*                                                     {#<span class="sr-only">20% Complete</span>#}*/
/*                                                 {#</div>#}*/
/*                                             {#</div>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li><!-- end task item -->#}*/
/*                                     {#<li><!-- Task item -->#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<h3>#}*/
/*                                                 {#Create a nice theme#}*/
/*                                                 {#<small class="pull-right">40%</small>#}*/
/*                                             {#</h3>#}*/
/*                                             {#<div class="progress xs">#}*/
/*                                                 {#<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">#}*/
/*                                                     {#<span class="sr-only">40% Complete</span>#}*/
/*                                                 {#</div>#}*/
/*                                             {#</div>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li><!-- end task item -->#}*/
/*                                     {#<li><!-- Task item -->#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<h3>#}*/
/*                                                 {#Some task I need to do#}*/
/*                                                 {#<small class="pull-right">60%</small>#}*/
/*                                             {#</h3>#}*/
/*                                             {#<div class="progress xs">#}*/
/*                                                 {#<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">#}*/
/*                                                     {#<span class="sr-only">60% Complete</span>#}*/
/*                                                 {#</div>#}*/
/*                                             {#</div>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li><!-- end task item -->#}*/
/*                                     {#<li><!-- Task item -->#}*/
/*                                         {#<a href="#">#}*/
/*                                             {#<h3>#}*/
/*                                                 {#Make beautiful transitions#}*/
/*                                                 {#<small class="pull-right">80%</small>#}*/
/*                                             {#</h3>#}*/
/*                                             {#<div class="progress xs">#}*/
/*                                                 {#<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">#}*/
/*                                                     {#<span class="sr-only">80% Complete</span>#}*/
/*                                                 {#</div>#}*/
/*                                             {#</div>#}*/
/*                                         {#</a>#}*/
/*                                     {#</li><!-- end task item -->#}*/
/*                                 {#</ul>#}*/
/*                             {#</li>#}*/
/*                             {#<li class="footer">#}*/
/*                                 {#<a href="#">View all tasks</a>#}*/
/*                             {#</li>#}*/
/*                         {#</ul>#}*/
/*                     </li>*/
/* */
/*                     <!-- Control Sidebar Toggle Button -->*/
/*                     <li>*/
/*                         <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>*/
/*                     </li>*/
/*                 </ul>*/
/*             </div>*/
/*         </nav>*/
/*     </header>*/
/*     <!-- Left side column. contains the logo and sidebar -->*/
/*     <aside class="main-sidebar">*/
/*         <!-- sidebar: style can be found in sidebar.less -->*/
/*         <section class="sidebar">*/
/*             <!-- Sidebar user panel -->*/
/*             <div class="user-panel">*/
/*                 <button class="btn btn-block btn-success" id="appButton"><i class="fa fa-fw fa-calendar-plus-o"></i> <span>Запись</span></button>*/
/*             </div>*/
/* */
/* */
/* */
/*             <!-- sidebar menu: : style can be found in sidebar.less -->*/
/*             <ul class="sidebar-menu">*/
/*                 <li class="header">Главное Мею</li>*/
/*                 <li class="treeview">*/
/*                     <a href="{{ url('admin_panel') }}">*/
/*                         <i class="fa fa-calendar"></i> <span>Расписание</span>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="treeview">*/
/*                     <a href="{{ url('backendoffice_appointment_clients') }}">*/
/*                         <i class="fa fa-users"></i> <span>Клиенты</span>*/
/*                     </a>*/
/*                 </li>*/
/* */
/*             </ul>*/
/*         </section>*/
/*         <!-- /.sidebar -->*/
/*     </aside>*/
/* */
/*     <!-- Content Wrapper. Contains page content -->*/
/*     <div class="content-wrapper">*/
/*         {% block body %}*/
/* */
/*         {% endblock %}*/
/*     </div><!-- /.content-wrapper -->*/
/*     <footer class="main-footer">*/
/*         <div class="pull-right hidden-xs">*/
/*             <b>Version</b> 0.1*/
/*         </div>*/
/*         <strong>Copyright &copy; 2015 <a href="http://ortofit.com.ua">Ortofit</a>.</strong> All rights reserved.*/
/*     </footer>*/
/* */
/*     <!-- Control Sidebar -->*/
/*     <aside class="control-sidebar control-sidebar-dark">*/
/*         <!-- Create the tabs -->*/
/*         <ul class="nav nav-tabs nav-justified control-sidebar-tabs">*/
/*             <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>*/
/*             <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>*/
/*         </ul>*/
/*         <!-- Tab panes -->*/
/*         <div class="tab-content">*/
/*             <!-- Home tab content -->*/
/*             <div class="tab-pane" id="control-sidebar-home-tab">*/
/*                 <h3 class="control-sidebar-heading">Recent Activity</h3>*/
/*                 <ul class="control-sidebar-menu">*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <i class="menu-icon fa fa-birthday-cake bg-red"></i>*/
/*                             <div class="menu-info">*/
/*                                 <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>*/
/*                                 <p>Will be 23 on April 24th</p>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <i class="menu-icon fa fa-user bg-yellow"></i>*/
/*                             <div class="menu-info">*/
/*                                 <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>*/
/*                                 <p>New phone +1(800)555-1234</p>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>*/
/*                             <div class="menu-info">*/
/*                                 <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>*/
/*                                 <p>nora@example.com</p>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <i class="menu-icon fa fa-file-code-o bg-green"></i>*/
/*                             <div class="menu-info">*/
/*                                 <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>*/
/*                                 <p>Execution time 5 seconds</p>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                 </ul><!-- /.control-sidebar-menu -->*/
/* */
/*                 <h3 class="control-sidebar-heading">Tasks Progress</h3>*/
/*                 <ul class="control-sidebar-menu">*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <h4 class="control-sidebar-subheading">*/
/*                                 Custom Template Design*/
/*                                 <span class="label label-danger pull-right">70%</span>*/
/*                             </h4>*/
/*                             <div class="progress progress-xxs">*/
/*                                 <div class="progress-bar progress-bar-danger" style="width: 70%"></div>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <h4 class="control-sidebar-subheading">*/
/*                                 Update Resume*/
/*                                 <span class="label label-success pull-right">95%</span>*/
/*                             </h4>*/
/*                             <div class="progress progress-xxs">*/
/*                                 <div class="progress-bar progress-bar-success" style="width: 95%"></div>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <h4 class="control-sidebar-subheading">*/
/*                                 Laravel Integration*/
/*                                 <span class="label label-warning pull-right">50%</span>*/
/*                             </h4>*/
/*                             <div class="progress progress-xxs">*/
/*                                 <div class="progress-bar progress-bar-warning" style="width: 50%"></div>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="javascript::;">*/
/*                             <h4 class="control-sidebar-subheading">*/
/*                                 Back End Framework*/
/*                                 <span class="label label-primary pull-right">68%</span>*/
/*                             </h4>*/
/*                             <div class="progress progress-xxs">*/
/*                                 <div class="progress-bar progress-bar-primary" style="width: 68%"></div>*/
/*                             </div>*/
/*                         </a>*/
/*                     </li>*/
/*                 </ul><!-- /.control-sidebar-menu -->*/
/* */
/*             </div><!-- /.tab-pane -->*/
/*             <!-- Stats tab content -->*/
/*             <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->*/
/*             <!-- Settings tab content -->*/
/*             <div class="tab-pane" id="control-sidebar-settings-tab">*/
/*                 <form method="post">*/
/*                     <h3 class="control-sidebar-heading">General Settings</h3>*/
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Report panel usage*/
/*                             <input type="checkbox" class="pull-right" checked>*/
/*                         </label>*/
/*                         <p>*/
/*                             Some information about this general settings option*/
/*                         </p>*/
/*                     </div><!-- /.form-group -->*/
/* */
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Allow mail redirect*/
/*                             <input type="checkbox" class="pull-right" checked>*/
/*                         </label>*/
/*                         <p>*/
/*                             Other sets of options are available*/
/*                         </p>*/
/*                     </div><!-- /.form-group -->*/
/* */
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Expose author name in posts*/
/*                             <input type="checkbox" class="pull-right" checked>*/
/*                         </label>*/
/*                         <p>*/
/*                             Allow the user to show his name in blog posts*/
/*                         </p>*/
/*                     </div><!-- /.form-group -->*/
/* */
/*                     <h3 class="control-sidebar-heading">Chat Settings</h3>*/
/* */
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Show me as online*/
/*                             <input type="checkbox" class="pull-right" checked>*/
/*                         </label>*/
/*                     </div><!-- /.form-group -->*/
/* */
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Turn off notifications*/
/*                             <input type="checkbox" class="pull-right">*/
/*                         </label>*/
/*                     </div><!-- /.form-group -->*/
/* */
/*                     <div class="form-group">*/
/*                         <label class="control-sidebar-subheading">*/
/*                             Delete chat history*/
/*                             <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>*/
/*                         </label>*/
/*                     </div><!-- /.form-group -->*/
/*                 </form>*/
/*             </div><!-- /.tab-pane -->*/
/*         </div>*/
/*     </aside><!-- /.control-sidebar -->*/
/*     <!-- Add the sidebar's background. This div must be placed*/
/*          immediately after the control sidebar -->*/
/*     <div class="control-sidebar-bg"></div>*/
/* </div><!-- ./wrapper -->*/
/* */
/* <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">*/
/* {#{% include 'OrtofitBackOfficeBundle:Appointment:createForm.html.twig' %}#}*/
/* </div>*/
/* */
/* </body>*/
/* </html>*/
/* */
