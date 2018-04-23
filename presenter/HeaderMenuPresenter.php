<?php namespace Themes\Artevents\Presenter;

use Nwidart\Menus\Presenters\Presenter;

class HeaderMenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL.'<ul class="menu">'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL.'</ul>'.PHP_EOL;
    }

    public function getCloseMegaTagWrapper()
    {
        return PHP_EOL.'</div>
                    </div>'.PHP_EOL;
    }

    public function getOpenMegaTagWrapper()
    {
        return PHP_EOL.'<div class="gfx-mega-content">
                            <div class="row">'.PHP_EOL;
    }

    public function getOpenMegaColumnTagWrapper()
    {
        return PHP_EOL.'<div class="col-lg-3 col-sm-3">
                            <ul class="mega-menu-list">'.PHP_EOL;
    }

    public function getCloseMegaColumnTagWrapper()
    {
        return PHP_EOL.'     </ul>
                         </div>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li'.$this->getActiveState($item).'><a href="'.$item->getUrl().'" '.$item->getAttributes().'>'.$item->getIcon().' '.$item->title.'</a></li>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class="current-menu-item"')
    {
        return \Request::is($item->getRequest()) ? $state : null;
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'current-menu-item')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getDividerWrapper()
    {
        return '';
    }

    /**
     * {@inheritdoc }.
     */
    public function getHeaderWrapper($item)
    {
        return '<li>'.$item->title.'</li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {
        return '<li class="'.$this->getActiveStateOnChild($item, ' current-menu-item').'">
		          <a href="'.$item->getUrl().'">
					'.$item->getIcon().' '.$item->title.' <span class="fa fa-caret-down"></span>
			      </a>
			      <ul class="sub-menu">
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }

    /**
     * @param $item
     * @return string
     */
    public function getMegaMenuWithDropDownWrapper($item)
    {
        return '<li class="'.$this->getActiveStateOnChild($item, ' current-menu-item').'">
		          <a href="#">
					'.$item->getIcon().' '.$item->title.'
			      </a>
			      <ul>
			        '.$this->getMegaMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }

    /**
     * @param \Nwidart\Menus\MenuItem $item
     * @return string
     */
    public function getMultiLevelDropdownWrapper($item)
    {
        return '<li class="'.$this->getActiveStateOnChild($item, ' current-menu-item').'">
		          <a href="'.$item->getUrl().'">
					'.$item->getIcon().' '.$item->title.' <span class="fa fa-caret-down"></span>
			      </a>
			      <ul class="sub-menu">
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }
}