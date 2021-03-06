<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'VeeamTest\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'veeam-test' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/veeam-test',
                    'defaults' => array(
                        '__NAMESPACE__' => 'VeeamTest\Controller',
                        'controller'    => 'Jobs',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        'factories' => array(
            'veeam-test-navigation' => 'VeeamTest\Navigation\Service\VeeamTestNavigationFactory'
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'VeeamTest\Controller\Index' => 'VeeamTest\Controller\IndexController',
            'VeeamTest\Controller\Jobs' => 'VeeamTest\Controller\JobsController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'veeam-test/index/index' => __DIR__ . '/../view/veeam-test/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'navigation' => array(
        'veeam-test' => array(
            'home' => array(
                'label' => 'Home',
                'route' => 'home'
            ),
            'job-list' => array(
                'label' => 'Job List',
                'route' => 'veeam-test'
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'veeam_test_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/VeeamTest/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'VeeamTest\Entity' => 'veeam_test_entities'
                )
            )
        )
    )
);
