<?php

/*
 * This file is part of the WhiteOctoberAdminBundle package.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WhiteOctober\AdminBundle\DataManager\Doctrine\ORM\Action;

use WhiteOctober\AdminBundle\DataManager\Base\Action\EditAction as BaseEditAction;

class EditAction extends BaseEditAction
{
    protected function configure()
    {
        parent::configure();

        $this
            ->setName('doctrine.orm.edit')
        ;
    }
}
