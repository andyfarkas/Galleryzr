<?php

/** @var \Symfony\Component\DependencyInjection\Container $container */
$container->setParameter('storageDirectory.images', dirname(dirname(__DIR__)) . '/data');