<?php

/*
 * This file is part of the WhiteOctoberAdminBundle package.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WhiteOctober\AdminBundle\DataManager\Propel\Guesser;

use WhiteOctober\AdminBundle\Guesser\FieldGuesserInterface;
use WhiteOctober\AdminBundle\Guesser\FieldOptionGuess;
use Propel\Metadata;

/**
 * PropelFieldGuesser class
 *
 * @author William DURAND <william.durand1@gmail.com>
 */
class PropelFieldGuesser implements FieldGuesserInterface
{
    public function __construct()
    {
    }

    public function guessOptions($class, $fieldName)
    {
        $peerClass = $class.'Peer';
        $tableMap  = $peerClass::getTableMap();

        $options = array();

        // fields
        if ($tableMap->hasColumn($fieldName)) {
            switch (strtolower($tableMap->getColumn($property)->getType())) {
                case 'array':
                    break;
                case 'boolean':
                    $options[] = new FieldOptionGuess(
                        'template',
                        'WhiteOctoberAdminBundle::fields/boolean.html.twig',
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_type',
                        'checkbox',
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_options',
                        array('required' => false),
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    break;
                case 'date':
                    $options[] = new FieldOptionGuess(
                        'template',
                        'WhiteOctoberAdminBundle::fields/date_time.html.twig',
                        FieldOptionGuess::MEDIUM_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_type',
                        'datetime',
                        FieldOptionGuess::MEDIUM_CONFIDENCE
                    );
                    break;
                case 'decimal':
                    $options[] = new FieldOptionGuess(
                        'template',
                        'WhiteOctoberAdminBundle::fields/float.html.twig',
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_type',
                        'number',
                        FieldOptionGuess::MEDIUM_CONFIDENCE
                    );
                    break;
                case 'integer':
                    $options[] = new FieldOptionGuess(
                        'template',
                        'WhiteOctoberAdminBundle::fields/integer.html.twig',
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_type',
                        'number',
                        FieldOptionGuess::MEDIUM_CONFIDENCE
                    );
                    break;
                case 'varchar':
                    $options[] = new FieldOptionGuess(
                        'template',
                        'WhiteOctoberAdminBundle::fields/text.html.twig',
                        FieldOptionGuess::HIGH_CONFIDENCE
                    );
                    $options[] = new FieldOptionGuess(
                        'form_type',
                        'text',
                        FieldOptionGuess::MEDIUM_CONFIDENCE
                    );
                    break;
            }
        }

        return $options;
    }
}
