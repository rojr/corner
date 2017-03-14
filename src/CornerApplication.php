<?php

namespace Corner;

use Corner\Layouts\CornerHomeLayout;
use Corner\Leaves\Home\CornerIndexView;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use SuperCMS\Leaves\IndexView;
use SuperCMS\SuperCMS;

class CornerApplication extends Application
{
    protected function initialise()
    {
        parent::initialise();

        parent::initialise();

        if (file_exists(APPLICATION_ROOT_DIR . "/settings/site.config.php")) {
            include_once(APPLICATION_ROOT_DIR . "/settings/site.config.php");
        }

        $this->developerMode = true;

        Repository::setDefaultRepositoryClassName(MySql::class);

        LayoutModule::setLayoutClassName(CornerHomeLayout::class);

        $this->container()->registerClass(IndexView::class, CornerIndexView::class);
    }

    protected function getModules()
    {
        return [
            new SuperCMS($this->container())
        ];
    }


}