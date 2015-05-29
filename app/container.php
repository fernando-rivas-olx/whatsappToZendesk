<?php

$c = new Pimple\Container();

$c['whatsapp.client'] = function() {
    return new \WaToZendApp\Command\WaToZendCommand();
};

$c['whatsapp.setprofilepicture'] = function() {
    return new \WaToZendApp\Command\SetProfilePictureCommand();
};

$c['commands'] = function($c) {
    return array(
        $c['whatsapp.client'],
        $c['whatsapp.setprofilepicture']
    );
};

$c['application'] = function($c) {
    $application = new \Symfony\Component\Console\Application();
    $application->addCommands($c['commands']);
    return $application;
};

return $c;