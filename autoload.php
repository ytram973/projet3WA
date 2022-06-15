<?php

const ALIASES = [
    'Projet' => 'lib',
    'App' => 'src'
];

spl_autoload_register(function (string $class): void {
    $namespaceParts = explode('\\', $class);

    if (in_array($namespaceParts[0], array_keys(ALIASES))) {
        $namespaceParts[0] = ALIASES[$namespaceParts[0]];
    } else {
        throw new Exception('Invalid namespace "' . $namespaceParts[0] . '". Expecting "Projet" or "App"');
    }
    $filepath = implode(DIRECTORY_SEPARATOR, $namespaceParts) . '.php';
    if (!file_exists($filepath)) {
        throw new Exception("Could not find file " . $filepath . " for class " . $class . ". Check your file's path, class name or namespace.");
    }

    require $filepath;
});