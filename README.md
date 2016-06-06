#IP Range for Craft CMS

A simple twig filter to determine whether a given IP falls within a certain range. This is particuarly useful for providing extra feedback or features for users on an internal IP address within your company.

### Installation
1. Upload the `iprange` folder to your `craft/plugins/` folder.
2. Enable the plugin in the control panel.

### Usage
```
    {{craft.request.getIpAddress() | ipRange('38.111.4.0/24')}}
    
    {# where craft.request.getIpAddress is the client's IP #}
    {# and the parameter within the ipRange is the IP/CIDR netmask #} 
```

This will either return `true` or `false` based on the given criteria.


#### Sidenotes
This plugin was inspired by Luke Holders [Geo](https://github.com/lukeholder/craft-geo) plugin. If using this plugin as well, you can swap out ```craft.request.getIpAddress()``` with ```craft.geo.info.ip``` for a cached IP.

#### Releases
* 1.0.0 Initial Release of IP Range