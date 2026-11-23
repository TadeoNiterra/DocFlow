<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/dashboard/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/password-reset/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.auth.password-reset.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/password-reset/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.auth.password-reset.reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.auth.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.pages.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/auditorias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.auditorias.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/auditorias/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.auditorias.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/checklist-equipos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.checklist-equipos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/checklist-equipos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.checklist-equipos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/colaboradors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.colaboradors.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/colaboradors/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.colaboradors.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/cursos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.cursos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/cursos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.cursos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/dispositivos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.dispositivos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/dispositivos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.dispositivos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/document-versions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.document-versions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/document-versions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.document-versions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/documents' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.documents.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/documents/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.documents.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/estructura-organizacionals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.estructura-organizacionals.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it02-categorias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it02-categorias.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it02-permisos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it02-permisos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it02-rols' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it02-rols.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it04s' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it04s.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it04s/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it04s.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it09-proyectos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it09-proyectos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it09-proyectos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it09-proyectos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it11-reportes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it11-reportes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it11-reportes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it11-reportes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it13-evidencias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it13-evidencias.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it14-soportes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it14-soportes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it18-plans' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it18-plans.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it18-plans/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it18-plans.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it22-evaluations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it22-evaluations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-it22-evaluations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it22-evaluations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-log01s' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-log01s.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/formato-log01s/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-log01s.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/modelo-equipos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.modelo-equipos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/modelo-equipos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.modelo-equipos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/proveedors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.proveedors.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/proveedors/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.proveedors.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/recertificacions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.recertificacions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/recertificacions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.recertificacions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/risk-registers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.risk-registers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/risk-registers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.risk-registers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/software-lists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.software-lists.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/software-lists/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.software-lists.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/user-deletion-controls' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.user-deletion-controls.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/user-deletion-controls/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.user-deletion-controls.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/vda-controls' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.vda-controls.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/vda-controls/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.vda-controls.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-a31e093b/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'default-livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-a31e093b/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CW8nWVJYpvrMsDMz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-a31e093b/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4DIB3zax7Lb3Y6CS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-a31e093b/livewire.csp.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l7OrgAoH2f4eeEkT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-a31e093b/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gwp9d4GWasuN4pKy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::byizNKEwSSNydKNG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/checklists-bulk-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checklists.pdf.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/formatos/f-it-02/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it02.pdf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/f(?|ilament/(?|exports/([^/]++)/download(*:48)|imports/([^/]++)/failed\\-rows/download(*:93))|ormatos/f(?|\\-it\\-(?|0(?|4/([^/]++)/preview(*:144)|9/(?|([^/]++)/preview(*:173)|evidencia/([^/]++)(*:199)))|1(?|1/([^/]++)/preview(*:231)|8/([^/]++)/preview(*:257))|22/([^/]++)/preview(*:285))|ormato\\-log01/([^/]++)/pdf(*:320)))|/d(?|ashboard/(?|auditorias/([^/]++)/edit(*:371)|c(?|hecklist\\-equipos/([^/]++)/edit(*:414)|olaboradors/([^/]++)/edit(*:447)|ursos/([^/]++)/edit(*:474))|d(?|ispositivos/([^/]++)/edit(*:512)|ocument(?|\\-versions/([^/]++)/edit(*:554)|s/([^/]++)/edit(*:577)))|formato\\-(?|it(?|0(?|4s/([^/]++)/edit(*:624)|9\\-proyectos/([^/]++)/edit(*:658))|1(?|1\\-reportes/([^/]++)/edit(*:696)|8\\-plans/([^/]++)/edit(*:726))|22\\-evaluations/([^/]++)/edit(*:764))|log01s/([^/]++)/edit(*:793))|modelo\\-equipos/([^/]++)/edit(*:831)|proveedors/([^/]++)(?|(*:861)|/edit(*:874))|r(?|ecertificacions/([^/]++)/edit(*:916)|isk\\-registers/([^/]++)(?|(*:950)|/edit(*:963)))|software\\-lists/([^/]++)/edit(*:1002)|user(?|\\-deletion\\-controls/([^/]++)/edit(*:1052)|s/([^/]++)/edit(*:1076))|vda\\-controls/([^/]++)/edit(*:1113))|ocumentos/([^/]++)/view\\-pdf(*:1151))|/livewire\\-a31e093b/(?|preview\\-file/([^/]++)(*:1206)|js/([^/\\.]++)\\.js(*:1232)|css/([^/\\.]++)\\.(?|css(*:1263)|global\\.css(*:1283)))|/c(?|hecklists/([^/]++)/pdf(*:1321)|olaboradores/([^/]++)/responsiva(*:1362)|ursos\\-evidencias/([^/]++)(*:1397))|/vda/evidence/([^/]++)/file(*:1434)|/auditorias/evidencias/([^/]++)(*:1474)|/storage/(?|auditorias/evidencias/([^/]++)(*:1525)|(.*)(?|(*:1541)))|/proveedores/([^/]++)/descargar\\-expediente(*:1595))/?$}sDu',
    ),
    3 => 
    array (
      48 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.exports.download',
          ),
          1 => 
          array (
            0 => 'export',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      93 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.imports.failed-rows.download',
          ),
          1 => 
          array (
            0 => 'import',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      144 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it04.preview-pdf',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it09.preview-pdf',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it09.download-evidencia',
          ),
          1 => 
          array (
            0 => 'evidencia',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it11.preview-pdf',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-it18.preview-pdf',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      285 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'evaluaciones-proveedor.pdf',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formato-log01.pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.auditorias.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.checklist-equipos.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.colaboradors.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.cursos.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      512 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.dispositivos.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.document-versions.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.documents.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it04s.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      658 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it09-proyectos.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it11-reportes.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      726 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it18-plans.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      764 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-it22-evaluations.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.formato-log01s.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      831 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.modelo-equipos.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.proveedors.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.proveedors.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      916 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.recertificacions.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.risk-registers.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      963 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.risk-registers.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1002 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.software-lists.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1052 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.user-deletion-controls.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.users.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.dashboard.resources.vda-controls.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'documentos.ver-pdf',
          ),
          1 => 
          array (
            0 => 'version',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1232 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::anKDKTpNibjIHddD',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k1326oKIlykMmVDz',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1283 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pdZPaUDfbTpVetmm',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checklists.pdf.download',
          ),
          1 => 
          array (
            0 => 'checklist',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'colaboradores.responsiva.pdf',
          ),
          1 => 
          array (
            0 => 'colaborador',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cursos.evidencia.descargar',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vda.evidence.file',
          ),
          1 => 
          array (
            0 => 'evidence',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auditorias.evidencia.ver',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0xK46XtGMaCnajWA',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1541 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local.upload',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proveedores.descargar-expediente',
          ),
          1 => 
          array (
            0 => 'proveedor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'filament.exports.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/exports/{export}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
        'uses' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport@__invoke',
        'controller' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport',
        'as' => 'filament.exports.download',
        'namespace' => NULL,
        'prefix' => 'filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.imports.failed-rows.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/imports/{import}/failed-rows/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
        'uses' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv@__invoke',
        'controller' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv',
        'as' => 'filament.imports.failed-rows.download',
        'namespace' => NULL,
        'prefix' => 'filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/login',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
        ),
        'uses' => 'App\\Filament\\Pages\\Auth\\CustomLogin@__invoke',
        'controller' => 'App\\Filament\\Pages\\Auth\\CustomLogin',
        'as' => 'filament.dashboard.auth.login',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.auth.password-reset.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/password-reset/request',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
        ),
        'uses' => 'Filament\\Auth\\Pages\\PasswordReset\\RequestPasswordReset@__invoke',
        'controller' => 'Filament\\Auth\\Pages\\PasswordReset\\RequestPasswordReset',
        'as' => 'filament.dashboard.auth.password-reset.request',
        'namespace' => NULL,
        'prefix' => 'dashboard/password-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.auth.password-reset.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/password-reset/reset',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'signed',
        ),
        'uses' => 'Filament\\Auth\\Pages\\PasswordReset\\ResetPassword@__invoke',
        'controller' => 'Filament\\Auth\\Pages\\PasswordReset\\ResetPassword',
        'as' => 'filament.dashboard.auth.password-reset.reset',
        'namespace' => NULL,
        'prefix' => 'dashboard/password-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/logout',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'Filament\\Auth\\Http\\Controllers\\LogoutController@__invoke',
        'controller' => 'Filament\\Auth\\Http\\Controllers\\LogoutController',
        'as' => 'filament.dashboard.auth.logout',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.auth.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/profile',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'Filament\\Auth\\Pages\\EditProfile@__invoke',
        'controller' => 'Filament\\Auth\\Pages\\EditProfile',
        'as' => 'filament.dashboard.auth.profile',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.pages.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'Filament\\Pages\\Dashboard@__invoke',
        'controller' => 'Filament\\Pages\\Dashboard',
        'as' => 'filament.dashboard.pages.dashboard',
        'namespace' => NULL,
        'prefix' => 'dashboard/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.auditorias.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/auditorias',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Auditorias\\Pages\\ListAuditorias@__invoke',
        'controller' => 'App\\Filament\\Resources\\Auditorias\\Pages\\ListAuditorias',
        'as' => 'filament.dashboard.resources.auditorias.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/auditorias',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.auditorias.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/auditorias/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Auditorias\\Pages\\CreateAuditoria@__invoke',
        'controller' => 'App\\Filament\\Resources\\Auditorias\\Pages\\CreateAuditoria',
        'as' => 'filament.dashboard.resources.auditorias.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/auditorias',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.auditorias.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/auditorias/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Auditorias\\Pages\\EditAuditoria@__invoke',
        'controller' => 'App\\Filament\\Resources\\Auditorias\\Pages\\EditAuditoria',
        'as' => 'filament.dashboard.resources.auditorias.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/auditorias',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.checklist-equipos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/checklist-equipos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\ListChecklistEquipos@__invoke',
        'controller' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\ListChecklistEquipos',
        'as' => 'filament.dashboard.resources.checklist-equipos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/checklist-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.checklist-equipos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/checklist-equipos/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\CreateChecklistEquipo@__invoke',
        'controller' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\CreateChecklistEquipo',
        'as' => 'filament.dashboard.resources.checklist-equipos.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/checklist-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.checklist-equipos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/checklist-equipos/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\EditChecklistEquipo@__invoke',
        'controller' => 'App\\Filament\\Resources\\ChecklistEquipos\\Pages\\EditChecklistEquipo',
        'as' => 'filament.dashboard.resources.checklist-equipos.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/checklist-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.colaboradors.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/colaboradors',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\ListColaboradors@__invoke',
        'controller' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\ListColaboradors',
        'as' => 'filament.dashboard.resources.colaboradors.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/colaboradors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.colaboradors.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/colaboradors/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\CreateColaborador@__invoke',
        'controller' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\CreateColaborador',
        'as' => 'filament.dashboard.resources.colaboradors.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/colaboradors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.colaboradors.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/colaboradors/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\EditColaborador@__invoke',
        'controller' => 'App\\Filament\\Resources\\Colaboradors\\Pages\\EditColaborador',
        'as' => 'filament.dashboard.resources.colaboradors.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/colaboradors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.cursos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/cursos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Cursos\\Pages\\ListCursos@__invoke',
        'controller' => 'App\\Filament\\Resources\\Cursos\\Pages\\ListCursos',
        'as' => 'filament.dashboard.resources.cursos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/cursos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.cursos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/cursos/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Cursos\\Pages\\CreateCurso@__invoke',
        'controller' => 'App\\Filament\\Resources\\Cursos\\Pages\\CreateCurso',
        'as' => 'filament.dashboard.resources.cursos.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/cursos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.cursos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/cursos/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Cursos\\Pages\\EditCurso@__invoke',
        'controller' => 'App\\Filament\\Resources\\Cursos\\Pages\\EditCurso',
        'as' => 'filament.dashboard.resources.cursos.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/cursos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.dispositivos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/dispositivos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\ListDispositivos@__invoke',
        'controller' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\ListDispositivos',
        'as' => 'filament.dashboard.resources.dispositivos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/dispositivos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.dispositivos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/dispositivos/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\CreateDispositivo@__invoke',
        'controller' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\CreateDispositivo',
        'as' => 'filament.dashboard.resources.dispositivos.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/dispositivos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.dispositivos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/dispositivos/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\EditDispositivo@__invoke',
        'controller' => 'App\\Filament\\Resources\\Dispositivos\\Pages\\EditDispositivo',
        'as' => 'filament.dashboard.resources.dispositivos.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/dispositivos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.document-versions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/document-versions',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\ListDocumentVersions@__invoke',
        'controller' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\ListDocumentVersions',
        'as' => 'filament.dashboard.resources.document-versions.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/document-versions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.document-versions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/document-versions/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\CreateDocumentVersion@__invoke',
        'controller' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\CreateDocumentVersion',
        'as' => 'filament.dashboard.resources.document-versions.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/document-versions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.document-versions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/document-versions/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\EditDocumentVersion@__invoke',
        'controller' => 'App\\Filament\\Resources\\DocumentVersions\\Pages\\EditDocumentVersion',
        'as' => 'filament.dashboard.resources.document-versions.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/document-versions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.documents.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/documents',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Documents\\Pages\\ListDocuments@__invoke',
        'controller' => 'App\\Filament\\Resources\\Documents\\Pages\\ListDocuments',
        'as' => 'filament.dashboard.resources.documents.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/documents',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.documents.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/documents/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Documents\\Pages\\CreateDocument@__invoke',
        'controller' => 'App\\Filament\\Resources\\Documents\\Pages\\CreateDocument',
        'as' => 'filament.dashboard.resources.documents.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/documents',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.documents.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/documents/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Documents\\Pages\\EditDocument@__invoke',
        'controller' => 'App\\Filament\\Resources\\Documents\\Pages\\EditDocument',
        'as' => 'filament.dashboard.resources.documents.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/documents',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.estructura-organizacionals.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/estructura-organizacionals',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\EstructuraOrganizacionals\\Pages\\ManageEstructuraOrganizacionals@__invoke',
        'controller' => 'App\\Filament\\Resources\\EstructuraOrganizacionals\\Pages\\ManageEstructuraOrganizacionals',
        'as' => 'filament.dashboard.resources.estructura-organizacionals.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/estructura-organizacionals',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it02-categorias.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it02-categorias',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt02Categorias\\Pages\\ListFormatoIt02Categorias@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt02Categorias\\Pages\\ListFormatoIt02Categorias',
        'as' => 'filament.dashboard.resources.formato-it02-categorias.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it02-categorias',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it02-permisos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it02-permisos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt02Permisos\\Pages\\ListFormatoIt02Permisos@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt02Permisos\\Pages\\ListFormatoIt02Permisos',
        'as' => 'filament.dashboard.resources.formato-it02-permisos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it02-permisos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it02-rols.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it02-rols',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt02Rols\\Pages\\ListFormatoIt02Rols@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt02Rols\\Pages\\ListFormatoIt02Rols',
        'as' => 'filament.dashboard.resources.formato-it02-rols.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it02-rols',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it04s.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it04s',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\ListFormatoIt04s@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\ListFormatoIt04s',
        'as' => 'filament.dashboard.resources.formato-it04s.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it04s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it04s.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it04s/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\CreateFormatoIt04@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\CreateFormatoIt04',
        'as' => 'filament.dashboard.resources.formato-it04s.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it04s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it04s.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it04s/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\EditFormatoIt04@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt04s\\Pages\\EditFormatoIt04',
        'as' => 'filament.dashboard.resources.formato-it04s.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it04s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it09-proyectos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it09-proyectos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\ListFormatoIt09Proyectos@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\ListFormatoIt09Proyectos',
        'as' => 'filament.dashboard.resources.formato-it09-proyectos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it09-proyectos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it09-proyectos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it09-proyectos/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\CreateFormatoIt09Proyecto@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\CreateFormatoIt09Proyecto',
        'as' => 'filament.dashboard.resources.formato-it09-proyectos.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it09-proyectos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it09-proyectos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it09-proyectos/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\EditFormatoIt09Proyecto@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt09Proyectos\\Pages\\EditFormatoIt09Proyecto',
        'as' => 'filament.dashboard.resources.formato-it09-proyectos.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it09-proyectos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it11-reportes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it11-reportes',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\ListFormatoIt11Reportes@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\ListFormatoIt11Reportes',
        'as' => 'filament.dashboard.resources.formato-it11-reportes.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it11-reportes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it11-reportes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it11-reportes/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\CreateFormatoIt11Reporte@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\CreateFormatoIt11Reporte',
        'as' => 'filament.dashboard.resources.formato-it11-reportes.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it11-reportes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it11-reportes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it11-reportes/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\EditFormatoIt11Reporte@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt11Reportes\\Pages\\EditFormatoIt11Reporte',
        'as' => 'filament.dashboard.resources.formato-it11-reportes.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it11-reportes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it13-evidencias.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it13-evidencias',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt13Evidencias\\Pages\\ListFormatoIt13Evidencias@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt13Evidencias\\Pages\\ListFormatoIt13Evidencias',
        'as' => 'filament.dashboard.resources.formato-it13-evidencias.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it13-evidencias',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it14-soportes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it14-soportes',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt14Soportes\\Pages\\ListFormatoIt14Soportes@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt14Soportes\\Pages\\ListFormatoIt14Soportes',
        'as' => 'filament.dashboard.resources.formato-it14-soportes.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it14-soportes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it18-plans.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it18-plans',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\ListFormatoIt18Plans@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\ListFormatoIt18Plans',
        'as' => 'filament.dashboard.resources.formato-it18-plans.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it18-plans',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it18-plans.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it18-plans/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\CreateFormatoIt18Plan@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\CreateFormatoIt18Plan',
        'as' => 'filament.dashboard.resources.formato-it18-plans.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it18-plans',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it18-plans.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it18-plans/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\EditFormatoIt18Plan@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt18Plans\\Pages\\EditFormatoIt18Plan',
        'as' => 'filament.dashboard.resources.formato-it18-plans.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it18-plans',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it22-evaluations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it22-evaluations',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\ListFormatoIt22Evaluations@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\ListFormatoIt22Evaluations',
        'as' => 'filament.dashboard.resources.formato-it22-evaluations.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it22-evaluations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it22-evaluations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it22-evaluations/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\CreateFormatoIt22Evaluation@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\CreateFormatoIt22Evaluation',
        'as' => 'filament.dashboard.resources.formato-it22-evaluations.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it22-evaluations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-it22-evaluations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-it22-evaluations/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\EditFormatoIt22Evaluation@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoIt22Evaluations\\Pages\\EditFormatoIt22Evaluation',
        'as' => 'filament.dashboard.resources.formato-it22-evaluations.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-it22-evaluations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-log01s.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-log01s',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\ListFormatoLog01s@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\ListFormatoLog01s',
        'as' => 'filament.dashboard.resources.formato-log01s.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-log01s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-log01s.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-log01s/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\CreateFormatoLog01@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\CreateFormatoLog01',
        'as' => 'filament.dashboard.resources.formato-log01s.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-log01s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.formato-log01s.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/formato-log01s/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\EditFormatoLog01@__invoke',
        'controller' => 'App\\Filament\\Resources\\FormatoLog01s\\Pages\\EditFormatoLog01',
        'as' => 'filament.dashboard.resources.formato-log01s.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/formato-log01s',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.modelo-equipos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/modelo-equipos',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\ListModeloEquipos@__invoke',
        'controller' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\ListModeloEquipos',
        'as' => 'filament.dashboard.resources.modelo-equipos.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/modelo-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.modelo-equipos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/modelo-equipos/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\CreateModeloEquipo@__invoke',
        'controller' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\CreateModeloEquipo',
        'as' => 'filament.dashboard.resources.modelo-equipos.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/modelo-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.modelo-equipos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/modelo-equipos/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\EditModeloEquipo@__invoke',
        'controller' => 'App\\Filament\\Resources\\ModeloEquipos\\Pages\\EditModeloEquipo',
        'as' => 'filament.dashboard.resources.modelo-equipos.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/modelo-equipos',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.proveedors.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/proveedors',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Proveedors\\Pages\\ListProveedors@__invoke',
        'controller' => 'App\\Filament\\Resources\\Proveedors\\Pages\\ListProveedors',
        'as' => 'filament.dashboard.resources.proveedors.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/proveedors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.proveedors.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/proveedors/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Proveedors\\Pages\\CreateProveedor@__invoke',
        'controller' => 'App\\Filament\\Resources\\Proveedors\\Pages\\CreateProveedor',
        'as' => 'filament.dashboard.resources.proveedors.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/proveedors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.proveedors.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/proveedors/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Proveedors\\Pages\\ViewProveedor@__invoke',
        'controller' => 'App\\Filament\\Resources\\Proveedors\\Pages\\ViewProveedor',
        'as' => 'filament.dashboard.resources.proveedors.view',
        'namespace' => NULL,
        'prefix' => 'dashboard/proveedors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.proveedors.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/proveedors/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Proveedors\\Pages\\EditProveedor@__invoke',
        'controller' => 'App\\Filament\\Resources\\Proveedors\\Pages\\EditProveedor',
        'as' => 'filament.dashboard.resources.proveedors.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/proveedors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.recertificacions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/recertificacions',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\ListRecertificacions@__invoke',
        'controller' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\ListRecertificacions',
        'as' => 'filament.dashboard.resources.recertificacions.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/recertificacions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.recertificacions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/recertificacions/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\CreateRecertificacion@__invoke',
        'controller' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\CreateRecertificacion',
        'as' => 'filament.dashboard.resources.recertificacions.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/recertificacions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.recertificacions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/recertificacions/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\EditRecertificacion@__invoke',
        'controller' => 'App\\Filament\\Resources\\Recertificacions\\Pages\\EditRecertificacion',
        'as' => 'filament.dashboard.resources.recertificacions.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/recertificacions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.risk-registers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/risk-registers',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\ListRiskRegisters@__invoke',
        'controller' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\ListRiskRegisters',
        'as' => 'filament.dashboard.resources.risk-registers.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/risk-registers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.risk-registers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/risk-registers/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\CreateRiskRegister@__invoke',
        'controller' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\CreateRiskRegister',
        'as' => 'filament.dashboard.resources.risk-registers.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/risk-registers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.risk-registers.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/risk-registers/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\ViewRiskRegister@__invoke',
        'controller' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\ViewRiskRegister',
        'as' => 'filament.dashboard.resources.risk-registers.view',
        'namespace' => NULL,
        'prefix' => 'dashboard/risk-registers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.risk-registers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/risk-registers/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\EditRiskRegister@__invoke',
        'controller' => 'App\\Filament\\Resources\\RiskRegisters\\Pages\\EditRiskRegister',
        'as' => 'filament.dashboard.resources.risk-registers.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/risk-registers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.software-lists.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/software-lists',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\ListSoftwareLists@__invoke',
        'controller' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\ListSoftwareLists',
        'as' => 'filament.dashboard.resources.software-lists.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/software-lists',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.software-lists.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/software-lists/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\CreateSoftwareList@__invoke',
        'controller' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\CreateSoftwareList',
        'as' => 'filament.dashboard.resources.software-lists.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/software-lists',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.software-lists.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/software-lists/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\EditSoftwareList@__invoke',
        'controller' => 'App\\Filament\\Resources\\SoftwareLists\\Pages\\EditSoftwareList',
        'as' => 'filament.dashboard.resources.software-lists.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/software-lists',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.user-deletion-controls.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/user-deletion-controls',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\ListUserDeletionControls@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\ListUserDeletionControls',
        'as' => 'filament.dashboard.resources.user-deletion-controls.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/user-deletion-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.user-deletion-controls.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/user-deletion-controls/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\CreateUserDeletionControl@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\CreateUserDeletionControl',
        'as' => 'filament.dashboard.resources.user-deletion-controls.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/user-deletion-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.user-deletion-controls.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/user-deletion-controls/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\EditUserDeletionControl@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserDeletionControls\\Pages\\EditUserDeletionControl',
        'as' => 'filament.dashboard.resources.user-deletion-controls.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/user-deletion-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/users',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Users\\Pages\\ListUsers@__invoke',
        'controller' => 'App\\Filament\\Resources\\Users\\Pages\\ListUsers',
        'as' => 'filament.dashboard.resources.users.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/users/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Users\\Pages\\CreateUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\Users\\Pages\\CreateUser',
        'as' => 'filament.dashboard.resources.users.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/users/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\Users\\Pages\\EditUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\Users\\Pages\\EditUser',
        'as' => 'filament.dashboard.resources.users.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.vda-controls.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/vda-controls',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\VdaControls\\Pages\\ListVdaControls@__invoke',
        'controller' => 'App\\Filament\\Resources\\VdaControls\\Pages\\ListVdaControls',
        'as' => 'filament.dashboard.resources.vda-controls.index',
        'namespace' => NULL,
        'prefix' => 'dashboard/vda-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.vda-controls.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/vda-controls/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\VdaControls\\Pages\\CreateVdaControl@__invoke',
        'controller' => 'App\\Filament\\Resources\\VdaControls\\Pages\\CreateVdaControl',
        'as' => 'filament.dashboard.resources.vda-controls.create',
        'namespace' => NULL,
        'prefix' => 'dashboard/vda-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.dashboard.resources.vda-controls.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/vda-controls/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:dashboard',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Filament\\Http\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\PreventRequestForgery',
          7 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          8 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          9 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          10 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\VdaControls\\Pages\\EditVdaControl@__invoke',
        'controller' => 'App\\Filament\\Resources\\VdaControls\\Pages\\EditVdaControl',
        'as' => 'filament.dashboard.resources.vda-controls.edit',
        'namespace' => NULL,
        'prefix' => 'dashboard/vda-controls',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'default-livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire-a31e093b/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'Livewire\\Mechanisms\\HandleRequests\\RequireLivewireHeaders',
          2 => 'Livewire\\Mechanisms\\HandleRequests\\RequireLivewireHeaders',
        ),
        'as' => 'default-livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CW8nWVJYpvrMsDMz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::CW8nWVJYpvrMsDMz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4DIB3zax7Lb3Y6CS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::4DIB3zax7Lb3Y6CS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l7OrgAoH2f4eeEkT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/livewire.csp.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@cspMaps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@cspMaps',
        'as' => 'generated::l7OrgAoH2f4eeEkT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire-a31e093b/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::anKDKTpNibjIHddD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/js/{component}.js',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:905:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'scriptModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a script source.\');
            }

            $path = $instance->scriptModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Script file not found: \'.$path);
            }

            $source = file_get_contents($path);

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $source,
                $filemtime,
                $component.\'.js\',
            );
        }";s:5:"scope";s:51:"Livewire\\Features\\SupportJsModules\\SupportJsModules";s:4:"this";N;s:4:"self";s:32:"0000000000000f2f0000000000000000";}}',
        'as' => 'generated::anKDKTpNibjIHddD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k1326oKIlykMmVDz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/css/{component}.css',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1074:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'styleModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a style source.\');
            }

            $path = $instance->styleModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Style file not found: \'.$path);
            }

            $css = file_get_contents($path);

            // Wrap in component selector for scoping
            $wrappedCss = "[wire\\\\:name=\\"{$component}\\"] {\\n{$css}\\n}";

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $wrappedCss,
                $filemtime,
                $component.\'.css\',
                \'text/css; charset=utf-8\',
            );
        }";s:5:"scope";s:53:"Livewire\\Features\\SupportCssModules\\SupportCssModules";s:4:"this";N;s:4:"self";s:32:"0000000000000f310000000000000000";}}',
        'as' => 'generated::k1326oKIlykMmVDz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pdZPaUDfbTpVetmm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-a31e093b/css/{component}.global.css',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:972:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'globalStyleModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a global style source.\');
            }

            $path = $instance->globalStyleModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Global style file not found: \'.$path);
            }

            $css = file_get_contents($path);

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $css,
                $filemtime,
                $component.\'.global.css\',
                \'text/css; charset=utf-8\',
            );
        }";s:5:"scope";s:53:"Livewire\\Features\\SupportCssModules\\SupportCssModules";s:4:"this";N;s:4:"self";s:32:"0000000000000f330000000000000000";}}',
        'as' => 'generated::pdZPaUDfbTpVetmm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gwp9d4GWasuN4pKy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1132:"function (\\Illuminate\\Http\\Request $request) {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    $status = $exception ? 500 : 200;

                    if ($request->expectsJson()) {
                        return response()->json([
                            \'status\' => $exception ? \'down\' : \'up\',
                        ], $status);
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'C:\\\\inetpub\\\\wwwroot\\\\DocFlow\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $status);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"00000000000011750000000000000000";}}',
        'as' => 'generated::Gwp9d4GWasuN4pKy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::byizNKEwSSNydKNG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\RedirectController@__invoke',
        'controller' => '\\Illuminate\\Routing\\RedirectController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::byizNKEwSSNydKNG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'destination' => '/dashboard',
        'status' => 302,
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checklists.pdf.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'checklists/{checklist}/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ChecklistPdfController@download',
        'controller' => 'App\\Http\\Controllers\\ChecklistPdfController@download',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checklists.pdf.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checklists.pdf.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'checklists-bulk-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ChecklistPdfController@bulkDownload',
        'controller' => 'App\\Http\\Controllers\\ChecklistPdfController@bulkDownload',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checklists.pdf.bulk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'colaboradores.responsiva.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'colaboradores/{colaborador}/responsiva',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ResponsivaController@stream',
        'controller' => 'App\\Http\\Controllers\\ResponsivaController@stream',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'colaboradores.responsiva.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'documentos.ver-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'documentos/{version}/view-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1378:"function (\\App\\Models\\DocumentVersion $version, \\Illuminate\\Http\\Request $request) {
        if (!$version->file_path) {
            \\abort(404, \'Ruta de archivo no registrada en el sistema.\');
        }

        $disk = \\Illuminate\\Support\\Facades\\Storage::disk(\'local\');

        if (!$disk->exists($version->file_path)) {
            \\abort(404, "El archivo en resguardo privado no existe: {$version->file_path}");
        }

        $absolutePath = $disk->path($version->file_path);
        $ext = \\strtolower(\\pathinfo($version->file_path, PATHINFO_EXTENSION));
        $fileName = $version->file_name ?? \\basename($version->file_path);

        // 1. Entrega binaria directa (streaming)
        if ($request->has(\'raw\') || $ext === \'pdf\') {
            return \\response()->file($absolutePath, [
                \'Content-Type\' => ($ext === \'pdf\') ? \'application/pdf\' : \'application/octet-stream\',
                \'Content-Disposition\' => \'inline; filename="\' . $fileName . \'"\',
                \'Cache-Control\' => \'no-store, no-cache, must-revalidate, private\',
            ]);
        }

        // 2. Visor interactivo para archivos Word / Excel
        return \\view(\'documentos.visor\', [
            \'fileUrl\' => \\route(\'documentos.ver-pdf\', [\'version\' => $version->id, \'raw\' => 1]),
            \'extension\' => $ext,
            \'fileName\' => $fileName,
        ]);
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000116b0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'documentos.ver-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vda.evidence.file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vda/evidence/{evidence}/file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1075:"function (\\Illuminate\\Http\\Request $request, \\App\\Models\\VdaEvidence $evidence) {
        $disk = \\Illuminate\\Support\\Facades\\Storage::disk(\'local\');

        if ($evidence->type === \'docflow_version\' || $request->has(\'version_id\')) {
            $versionId = $request->query(\'version_id\');
            $version = $versionId
                ? \\App\\Models\\DocumentVersion::find($versionId)
                : \\App\\Models\\DocumentVersion::where(\'document_id\', $evidence->document_id)
                    ->whereIn(\'status\', [\'aprobado\', \'aprobado / firmado\'])
                    ->latest()
                    ->first();

            if ($version?->file_path && $disk->exists($version->file_path)) {
                return $disk->response($version->file_path);
            }
            \\abort(404, \'No se encontró versión aprobada del documento.\');
        }

        if ($evidence->file_path && $disk->exists($evidence->file_path)) {
            return $disk->response($evidence->file_path);
        }

        \\abort(404, \'El archivo binario solicitado no existe.\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011690000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'vda.evidence.file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cursos.evidencia.descargar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cursos-evidencias/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1044:"function ($id) {
        $evidencia = \\Illuminate\\Support\\Facades\\DB::table(\'curso_evidencias\')->where(\'id\', $id)->first()
            ?? \\Illuminate\\Support\\Facades\\DB::table(\'evidencias\')->where(\'id\', $id)->first()
            ?? \\Illuminate\\Support\\Facades\\DB::table(\'cursos_evidencias\')->where(\'id\', $id)->first();

        if (!$evidencia || empty($evidencia->archivo_path)) {
            \\abort(404, \'Registro de evidencia no encontrado.\');
        }

        $disk = \\Illuminate\\Support\\Facades\\Storage::disk(\'public\');

        if (!$disk->exists($evidencia->archivo_path)) {
            \\abort(404, \'El archivo físico no se encuentra en el almacenamiento.\');
        }

        $pathFisico = $disk->path($evidencia->archivo_path);
        $mimeType = $disk->mimeType($evidencia->archivo_path) ?? \'application/octet-stream\';

        return \\response()->file($pathFisico, [
            \'Content-Type\' => $mimeType,
            \'Content-Disposition\' => \'inline; filename="\' . \\basename($evidencia->archivo_path) . \'"\',
        ]);
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011670000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cursos.evidencia.descargar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auditorias.evidencia.ver' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auditorias/evidencias/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1022:"function (string $filename) {
        $safeName = \\basename($filename);

        $posiblesRutas = [
            \\public_path(\'storage/uploads/auditorias/evidencias/\' . $safeName),
            \\public_path(\'storage/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/public/uploads/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/public/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/private/uploads/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/private/auditorias/evidencias/\' . $safeName),
        ];

        foreach ($posiblesRutas as $ruta) {
            if (\\file_exists($ruta)) {
                return \\response()->file($ruta, [
                    \'Content-Type\' => \\mime_content_type($ruta) ?: \'application/octet-stream\',
                    \'Content-Disposition\' => \'inline; filename="\' . $safeName . \'"\',
                ]);
            }
        }

        \\abort(404, \'El archivo de evidencia de auditoría no existe.\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011650000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auditorias.evidencia.ver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0xK46XtGMaCnajWA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/auditorias/evidencias/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1022:"function (string $filename) {
        $safeName = \\basename($filename);

        $posiblesRutas = [
            \\public_path(\'storage/uploads/auditorias/evidencias/\' . $safeName),
            \\public_path(\'storage/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/public/uploads/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/public/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/private/uploads/auditorias/evidencias/\' . $safeName),
            \\storage_path(\'app/private/auditorias/evidencias/\' . $safeName),
        ];

        foreach ($posiblesRutas as $ruta) {
            if (\\file_exists($ruta)) {
                return \\response()->file($ruta, [
                    \'Content-Type\' => \\mime_content_type($ruta) ?: \'application/octet-stream\',
                    \'Content-Disposition\' => \'inline; filename="\' . $safeName . \'"\',
                ]);
            }
        }

        \\abort(404, \'El archivo de evidencia de auditoría no existe.\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011650000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0xK46XtGMaCnajWA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proveedores.descargar-expediente' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proveedores/{proveedor}/descargar-expediente',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1495:"function (\\App\\Models\\Proveedor $proveedor) {
        $slug = \\Illuminate\\Support\\Str::slug($proveedor->nombre);
        $folderPath = \\storage_path("app/private/proveedores/{$slug}");

        // Verificar si existe la carpeta física
        if (!\\file_exists($folderPath)) {
            \\abort(404, \'El proveedor no cuenta con archivos cargados en su expediente.\');
        }

        $zipFileName = "Expediente_{$slug}.zip";
        $zipPath = \\storage_path("app/private/temp_{$zipFileName}");

        // 👈 Usamos \\ZipArchive directamente
        $zip = new \\ZipArchive();
        if ($zip->open($zipPath, \\ZipArchive::CREATE | \\ZipArchive::OVERWRITE) === true) {
            $files = new \\RecursiveIteratorIterator(
                new \\RecursiveDirectoryIterator($folderPath),
                \\RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = \\substr($filePath, \\strlen($folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        } else {
            \\abort(500, \'No se pudo crear el archivo comprimido.\');
        }

        // Descargar el ZIP y eliminarlo del servidor tras enviarlo
        return \\response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011610000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'proveedores.descargar-expediente',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it02.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-02/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PdfReportController@formatoIt02',
        'controller' => 'App\\Http\\Controllers\\PdfReportController@formatoIt02',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it02.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it04.preview-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-04/{record}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PdfReportController@formatoIt04',
        'controller' => 'App\\Http\\Controllers\\PdfReportController@formatoIt04',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it04.preview-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it09.preview-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-09/{record}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PdfReportController@formatoIt09',
        'controller' => 'App\\Http\\Controllers\\PdfReportController@formatoIt09',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it09.preview-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it11.preview-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-11/{record}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PdfReportController@formatoIt11',
        'controller' => 'App\\Http\\Controllers\\PdfReportController@formatoIt11',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it11.preview-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it18.preview-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-18/{record}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PdfReportController@formatoIt18',
        'controller' => 'App\\Http\\Controllers\\PdfReportController@formatoIt18',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it18.preview-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'evaluaciones-proveedor.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-22/{record}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SupplierEvaluationPdfController@download',
        'controller' => 'App\\Http\\Controllers\\SupplierEvaluationPdfController@download',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'evaluaciones-proveedor.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-log01.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/formato-log01/{id}/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormatoLog01PdfController@download',
        'controller' => 'App\\Http\\Controllers\\FormatoLog01PdfController@download',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-log01.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formato-it09.download-evidencia' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formatos/f-it-09/evidencia/{evidencia}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:315:"function (\\App\\Models\\FormatoIt09Evidencia $evidencia) {
        $disk = \\Illuminate\\Support\\Facades\\Storage::disk(\'local\');
        if (!$disk->exists($evidencia->ruta_archivo)) {
            \\abort(404);
        }

        return $disk->download($evidencia->ruta_archivo, $evidencia->nombre_archivo);
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011580000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '/formatos',
        'where' => 
        array (
        ),
        'as' => 'formato-it09.download-evidencia',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:46:"C:\\inetpub\\wwwroot\\DocFlow\\storage\\app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:323:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ServeFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000011620000000000000000";}}',
        'as' => 'storage.local',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local.upload' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:46:"C:\\inetpub\\wwwroot\\DocFlow\\storage\\app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:325:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ReceiveFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000011550000000000000000";}}',
        'as' => 'storage.local.upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
