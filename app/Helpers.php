<?php


namespace App\Helpers;


class Helpers
{
    /**
     * Validate form against rules and redirect back on errors or return validated array of fields
     *
     * @param Request $request
     * @param array $rules
     * @param array $form_sections
     * @return array
     */
    public static function validateForm(Request $request, $rules, $form_sections = [])
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            session()->flash('alert', 'There has been errors in the form');

            $response = redirect()->back()->withInput()->withErrors($validator->errors())->with('form_sections', $form_sections);

            session()->driver()->save();

            $response->send();

            exit();
        }

        return $validator->valid();
    }
}
