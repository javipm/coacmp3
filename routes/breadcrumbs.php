<?php

// routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Str;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('home'));
});

// Home -> Search
Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Búsqueda', route('search'));
});

// Home > Author
Breadcrumbs::for('author', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('home');
    $trail->push('Autores');
    $trail->push($author->name, route('author', ['author' => $author->slug]));
});

// Home > Modality
Breadcrumbs::for('modality', function (BreadcrumbTrail $trail, $modality) {
    $trail->parent('home');
    $trail->push(Str::plural($modality->name), route('modality', ['modality' => $modality->slug]));
});

// Home > Modality > [Group]
Breadcrumbs::for('group', function (BreadcrumbTrail $trail, $group) {
    $trail->parent('home');
    $trail->push(Str::plural($group->modality->name), route('modality', ['modality' => $group->modality->slug]));
    $trail->push($group->name, route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]));
});
