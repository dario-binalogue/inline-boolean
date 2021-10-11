<?php


namespace DarioBinalogue\InlineBoolean;

use Laravel\Nova\Http\Requests\NovaRequest;


trait DisableRulesForInline
{

    public static function rulesForUpdate(NovaRequest $request, $resource = null)
    {
        return [];
    }
}
