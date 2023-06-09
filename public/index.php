<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\RedirectResponse;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

//only redirect from success page when the request comes from the url
if ($_SERVER['REQUEST_URI'] === '/success' && !isset($_SERVER['HTTP_REFERER'])) {
    header('Location: /');
    exit;
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
