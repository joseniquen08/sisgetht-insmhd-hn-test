<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('trabajador', ['filter' => 'group:worker'], static function ($routes) {
  $routes->get('registrar', 'Worker::registerHoursView');
  $routes->post('registrar', 'Worker::saveTask');
});

$routes->group('secretaria', ['filter' => 'group:secretary'], static function ($routes) {
  $routes->get('gestionar', 'Secretary::manageTasksView');
});

$routes->group('jefe', ['filter' => 'group:boss'], static function ($routes) {
  $routes->get('progreso', 'Boss::workerProgressView');
  $routes->get('progreso/trabajador/(:num)', 'Boss::workerProgressByIdView/$1');
  $routes->get('resumen', 'Boss::taskSummaryView');
});

$routes->group('api', static function ($routes) {
  $routes->get('procesos', 'Api::getProcesses');
  $routes->get('actividades/(:num)', 'Api::getActivitiesByProcessId/$1');
  $routes->get('tareas/(:num)', 'Api::getTasksByActivityId/$1');
  $routes->group('proceso', static function ($routes) {
    $routes->post('add', 'Api::addProcess');
    $routes->post('edit', 'Api::editProcessById');
  });
  $routes->group('actividad', static function ($routes) {
    $routes->post('add', 'Api::addActivity');
    $routes->post('edit', 'Api::editActivityById');
  });
  $routes->group('tarea', static function ($routes) {
    $routes->post('add', 'Api::addTask');
    $routes->post('edit', 'Api::editTaskById');
  });
});

service('auth')->routes($routes);
