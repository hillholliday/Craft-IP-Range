<?php
namespace Craft;

class IpRangePlugin extends BasePlugin
{
    public function getName()
    {
        return 'IP Range';
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Hill Holliday';
    }

    public function getDeveloperUrl()
    {
        return 'http://hhcc.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()  
    {
        Craft::import('plugins.iprange.twigextensions.IpRangeTwigExtension');

        return new IpRangeTwigExtension();
    }
}
