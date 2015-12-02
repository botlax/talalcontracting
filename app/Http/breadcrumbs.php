<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About Us', url('/about-us'));
});

// Home > Projects
Breadcrumbs::register('projects', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projects', url('/projects'));
});

// Home > Projects > Project
Breadcrumbs::register('project', function($breadcrumbs, $project) {
    $breadcrumbs->parent('projects');
    $breadcrumbs->push(substr($project->name, 0, 15).' . . .', url('/projects/'. $project->id));
});

// Home > contact Us 
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact Us', url('contact-us'));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('careers', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Careers', url('/careers'));
});

// Home > careers > careername
Breadcrumbs::register('career', function($breadcrumbs, $position) {
    $breadcrumbs->parent('careers');
    $breadcrumbs->push($position->position, url('/careers/'. $position->position_link));
});

// Home > careers > careername
Breadcrumbs::register('apply', function($breadcrumbs, $position) {
    $breadcrumbs->parent('career');
    $breadcrumbs->push('Application', url('/careers/'. $position->position_link.'/apply'));
});
