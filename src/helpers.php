<?php

use Uniform\Guards\RecaptchaGuard;
use Uniform\Exceptions\Exception as UniformException;

if (!function_exists('recaptchaField')) {
    /**
     * Generate a reCAPTCHA form field
     *
     * @return string
     */
    function recaptchaField()
    {
        $siteKey = option('expl0it3r.uniform-recaptcha.siteKey');

        if (empty($siteKey)) {
            throw new UniformException('The reCAPTCHA sitekey for Uniform is not configured');
        }

        return '<div class="g-recaptcha" data-sitekey="'.$siteKey.'"></div>';
    }
}

if (!function_exists('recaptchaButton')) {
    /**
     * Generate a reCAPTCHA form button and form submission callback
     *
     * @param string $text   The button text
     * @param string $class  Any additional CSS class entries
     * @param string $formId HTML ID of the to be submitted form
     * 
     * @return string
     */
    function recaptchaButton($text, $class, $formId)
    {
        $siteKey = option('expl0it3r.uniform-recaptcha.siteKey');

        if (empty($siteKey)) {
            throw new UniformException('The reCAPTCHA sitekey for Uniform is not configured');
        }

        return '<script>function onRecaptchaFormSubmit(token) { document.getElementById("'.$formId.'").submit(); }</script>
        <button class="g-recaptcha '.$class.'" data-sitekey="'.$siteKey.'" data-callback="onRecaptchaFormSubmit" data-action="UniformAction">'.$text.'</button>';
    }
}

if (!function_exists('recaptchaScript')) {
    /**
     * Generate script tag that includes the reCAPTCHA JavaScript file
     *
     * @return string
     */
    function recaptchaScript()
    {
        return '<script src="https://www.google.com/recaptcha/api.js"></script>';
    }
}
