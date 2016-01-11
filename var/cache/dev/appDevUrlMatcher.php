<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // admin_panel
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::indexAction',  '_route' => 'admin_panel',);
        }

        // login_route
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\LoginController::loginAction',  '_route' => 'login_route',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                // logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'OrtofitBackOfficeBundle:Login::logout',  '_route' => 'logout',);
                }

                // login_check
                if ($pathinfo === '/admin/login_check') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\LoginController::securityCheckAction',  '_route' => 'login_check',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/clients')) {
                // backendoffice_appointment_clients
                if ($pathinfo === '/admin/clients') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\ClientController::indexAction',  '_route' => 'backendoffice_appointment_clients',);
                }

                // backendoffice_clients_form
                if ($pathinfo === '/admin/clients/form') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\ClientController::formAction',  '_route' => 'backendoffice_clients_form',);
                }

                // backendoffice_clients_update
                if ($pathinfo === '/admin/clients/update') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\ClientController::updateAction',  '_route' => 'backendoffice_clients_update',);
                }

                // backendoffice_clients_create
                if ($pathinfo === '/admin/clients/create') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\ClientController::createAction',  '_route' => 'backendoffice_clients_create',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/person')) {
                // backendoffice_person
                if ($pathinfo === '/admin/person') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\PersonController::indexAction',  '_route' => 'backendoffice_person',);
                }

                // backendoffice_person_form
                if ($pathinfo === '/admin/person/form') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\PersonController::formAction',  '_route' => 'backendoffice_person_form',);
                }

                // backendoffice_person_create
                if ($pathinfo === '/admin/person/create') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\PersonController::createAction',  '_route' => 'backendoffice_person_create',);
                }

                // backendoffice_person_update
                if ($pathinfo === '/admin/person/update') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\PersonController::updateAction',  '_route' => 'backendoffice_person_update',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/diagnosis')) {
                // backendoffice_diagnosis_form
                if ($pathinfo === '/admin/diagnosis/form') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\DiagnosisController::formAction',  '_route' => 'backendoffice_diagnosis_form',);
                }

                // backendoffice_diagnosis_create
                if ($pathinfo === '/admin/diagnosis/create') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\DiagnosisController::createAction',  '_route' => 'backendoffice_diagnosis_create',);
                }

                // backendoffice_diagnosis_update
                if ($pathinfo === '/admin/diagnosis/update') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\DiagnosisController::updateAction',  '_route' => 'backendoffice_diagnosis_update',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/app')) {
                // backendoffice_appointment_get_form
                if ($pathinfo === '/admin/app/form') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::formAction',  '_route' => 'backendoffice_appointment_get_form',);
                }

                // backendoffice_appointment_create
                if ($pathinfo === '/admin/app/create') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::createAction',  '_route' => 'backendoffice_appointment_create',);
                }

                // backendoffice_appointment_update
                if ($pathinfo === '/admin/app/update') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::updateAction',  '_route' => 'backendoffice_appointment_update',);
                }

                // backendoffice_appointment_delete
                if ($pathinfo === '/admin/app/delete') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::deleteAction',  '_route' => 'backendoffice_appointment_delete',);
                }

                // backendoffice_appointment_get_app
                if ($pathinfo === '/admin/app/get') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::getAppAction',  '_route' => 'backendoffice_appointment_get_app',);
                }

                // backendoffice_appointment_pre_app
                if ($pathinfo === '/admin/app/pre') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::preOrderAction',  '_route' => 'backendoffice_appointment_pre_app',);
                }

                // backendoffice_appointment_work_hours
                if ($pathinfo === '/admin/app/work_hours') {
                    return array (  '_controller' => 'Ortofit\\Bundle\\BackOfficeBundle\\Controller\\AppointmentController::workHoursAction',  '_route' => 'backendoffice_appointment_work_hours',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/sing_up')) {
            // ortofit_sing_up_index
            if (0 === strpos($pathinfo, '/sing_up/index') && preg_match('#^/sing_up/index/(?P<appId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ortofit_sing_up_index')), array (  '_controller' => 'Ortofit\\Bundle\\SingUpBundle\\Controller\\SingUpController::indexAction',));
            }

            // ortofit_sing_up_process
            if ($pathinfo === '/sing_up/process') {
                return array (  '_controller' => 'Ortofit\\Bundle\\SingUpBundle\\Controller\\SingUpController::processAction',  '_route' => 'ortofit_sing_up_process',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
