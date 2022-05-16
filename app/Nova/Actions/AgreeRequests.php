<?php

namespace App\Nova\Actions;

use App\Request;
use App\CoursePay;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use \Laravel\Nova\Fields\ActionFields;

class AgreeRequests extends Action 
{
    use InteractsWithQueue, Queueable;

    public function handle(ActionFields $fields, Collection $models)
  {
    foreach ($models as $model) {
      $cp = new CoursePay(["user_id" => $model->user_id, "course_id" => $model->course_id]);
      $cp->save();
    }
  }

  /**
   * Get the fields available on the action.
   *
   * @return array
   */
  public function fields()
  {
    return [];
  }
}
