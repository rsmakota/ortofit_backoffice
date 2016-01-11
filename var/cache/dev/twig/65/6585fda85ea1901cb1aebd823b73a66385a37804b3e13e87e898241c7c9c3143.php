<?php

/* @OrtofitBackOffice/Login/login.html.twig */
class __TwigTemplate_ff2748929d7965b76e59b905bb5f0f3ce8127a69e48d8af448c3aec6535911ea extends Twig_Template
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
        $__internal_7f474d490a1e28838147ccd6c376ce5eb790ec61ed932b723e5c93433639f0b0 = $this->env->getExtension("native_profiler");
        $__internal_7f474d490a1e28838147ccd6c376ce5eb790ec61ed932b723e5c93433639f0b0->enter($__internal_7f474d490a1e28838147ccd6c376ce5eb790ec61ed932b723e5c93433639f0b0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@OrtofitBackOffice/Login/login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Admin Ortofit | Log in</title>
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
        echo "../bundles/ortofitbackoffice/plugins/iCheck/square/blue.css";
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
    <!-- Ionicons -->
    <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">

    ";
        // line 16
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "345d74c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_345d74c_0") : $this->env->getExtension('asset')->getAssetUrl("js/345d74c_jQuery-2.1.4.min_1.js");
            // line 21
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "345d74c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_345d74c_1") : $this->env->getExtension('asset')->getAssetUrl("js/345d74c_bootstrap.min_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "345d74c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_345d74c_2") : $this->env->getExtension('asset')->getAssetUrl("js/345d74c_icheck.min_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "345d74c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_345d74c") : $this->env->getExtension('asset')->getAssetUrl("js/345d74c.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 23
        echo "
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
        <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
  <body class=\"hold-transition login-page\">
    <div class=\"login-box\">
      <div class=\"login-logo\">
        <a href=\"\"><b>Admin</b>Ortofit</a>
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
        <p class=\"login-box-msg\">Sign in to start your session</p>
        <form action=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
          <div class=\"form-group has-feedback\">
            <input id=\"username\" name=\"_username\" class=\"form-control\" placeholder=\"Login\">
            <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
          </div>
          <div class=\"form-group has-feedback\">
            <input type=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"Password\">
            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
          </div>
          <div class=\"row\">
            <div class=\"col-xs-8\">
              <div class=\"checkbox icheck\">
                <label>
                  <input type=\"checkbox\"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class=\"col-xs-4\">
              <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class=\"text-center\">
          ";
        // line 60
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 61
            echo "            <div class=\"text-danger\">
              ";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 65
        echo "        </div>

        <a href=\"#\">I forgot my password</a><br>
        <a href=\"#\" class=\"text-center\">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script>
      \$(function () {
        \$('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
";
        
        $__internal_7f474d490a1e28838147ccd6c376ce5eb790ec61ed932b723e5c93433639f0b0->leave($__internal_7f474d490a1e28838147ccd6c376ce5eb790ec61ed932b723e5c93433639f0b0_prof);

    }

    public function getTemplateName()
    {
        return "@OrtofitBackOffice/Login/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 65,  125 => 62,  122 => 61,  120 => 60,  93 => 36,  78 => 23,  52 => 21,  48 => 16,  39 => 10,  35 => 9,  31 => 8,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <title>Admin Ortofit | Log in</title>*/
/*     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">*/
/*     <link href="{{ '../bundles/ortofitbackoffice/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/dist/css/AdminLTE.min.css' }}" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ '../bundles/ortofitbackoffice/plugins/iCheck/square/blue.css' }}" rel="stylesheet" type="text/css" />*/
/*     <!-- Font Awesome -->*/
/*     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/*     <!-- Ionicons -->*/
/*     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">*/
/* */
/*     {% javascripts*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/jQuery/jQuery-2.1.4.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/bootstrap/js/bootstrap.min.js'*/
/*     '@OrtofitBackOfficeBundle/Resources/public/plugins/iCheck/icheck.min.js'*/
/*     %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/*     <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/*         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/*   </head>*/
/*   <body class="hold-transition login-page">*/
/*     <div class="login-box">*/
/*       <div class="login-logo">*/
/*         <a href=""><b>Admin</b>Ortofit</a>*/
/*       </div><!-- /.login-logo -->*/
/*       <div class="login-box-body">*/
/*         <p class="login-box-msg">Sign in to start your session</p>*/
/*         <form action="{{ path('login_check') }}" method="post">*/
/*           <div class="form-group has-feedback">*/
/*             <input id="username" name="_username" class="form-control" placeholder="Login">*/
/*             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>*/
/*           </div>*/
/*           <div class="form-group has-feedback">*/
/*             <input type="password" name="_password" class="form-control" placeholder="Password">*/
/*             <span class="glyphicon glyphicon-lock form-control-feedback"></span>*/
/*           </div>*/
/*           <div class="row">*/
/*             <div class="col-xs-8">*/
/*               <div class="checkbox icheck">*/
/*                 <label>*/
/*                   <input type="checkbox"> Remember Me*/
/*                 </label>*/
/*               </div>*/
/*             </div><!-- /.col -->*/
/*             <div class="col-xs-4">*/
/*               <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>*/
/*             </div><!-- /.col -->*/
/*           </div>*/
/*         </form>*/
/* */
/*         <div class="text-center">*/
/*           {% if error %}*/
/*             <div class="text-danger">*/
/*               {{ error.message }}*/
/*             </div>*/
/*           {% endif %}*/
/*         </div>*/
/* */
/*         <a href="#">I forgot my password</a><br>*/
/*         <a href="#" class="text-center">Register a new membership</a>*/
/* */
/*       </div><!-- /.login-box-body -->*/
/*     </div><!-- /.login-box -->*/
/* */
/*     <script>*/
/*       $(function () {*/
/*         $('input').iCheck({*/
/*           checkboxClass: 'icheckbox_square-blue',*/
/*           radioClass: 'iradio_square-blue',*/
/*           increaseArea: '20%' // optional*/
/*         });*/
/*       });*/
/*     </script>*/
/*   </body>*/
/* </html>*/
/* */
