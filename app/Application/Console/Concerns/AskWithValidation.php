<?php


namespace Application\Console\Concerns;


use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Support\Facades\Validator;

/**
 * @mixin InteractsWithIO
 */
trait AskWithValidation
{
    /**
     * @param  string  $question
     * @param  string  $field
     * @param  array  $rules
     * @param  string|null  $default
     * @return null
     */
    public function askWithValidation($question, $field, $rules = [], $default = null)
    {
        $value = $this->ask($question, $default);
        $validator = Validator::make([$field => $value], [$field => $rules]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return $this->askWithValidation($question, $field, $rules, $default);
        }
        return $value;
    }
}