<?php
namespace App\Policies;

use Eminiarts\NovaPermissions\Policies\Policy;

class CoursePolicy extends Policy
{
    /**
     * The Permission key the Policy corresponds to.
     *
     * @var string
     */
    public static $key = 'courses';
}