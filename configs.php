<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51IusyRSBrdQxcnD0QibDmH1YovRYcDRH7Ax0XUavbXOGSUIcDBB84Ybaloh5KrW7KFbwKmHK0NLhSxIiOlp52MmI00xxDiO1ua";

$secretKey="sk_test_51IusyRSBrdQxcnD0v0KmMTQJCcWady4LZWEqhYdYDmZYKPp4WlNE8ZEJX1RbUFOCvZWpFjAQcCj1UuOIiYi7hAIK00v0cZ1ycl";

\Stripe\Stripe::setApiKey($secretKey);
?>