<?php

// routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Str;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('home'));
});

// Home > Modality
Breadcrumbs::for('modality', function (BreadcrumbTrail $trail, $modality) {
    $trail->parent('home');
    $trail->push($modality->name, route('modality', ['modality' => $modality->slug]));
});

// Home > Modality > [Group]
Breadcrumbs::for('group', function (BreadcrumbTrail $trail, $group) {
    $trail->parent('home');
    $trail->push(Str::plural($group->modality->name), route('modality', ['modality' => $group->modality->slug]));
    $trail->push($group->name, route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]));
});
