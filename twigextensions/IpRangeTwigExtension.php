<?php  
namespace Craft;

use Twig_Extension;  
use Twig_Filter_Method;

class IpRangeTwigExtension extends \Twig_Extension  
{
    public function getName()
    {
        return 'IPRange';
    }

    public function getFilters()
    {
        return array(
            'ipRange' => new Twig_Filter_Method($this, 'ipRange'),
        );
    }

    public function getIpAddress(){
        return craft()->request->getIpAddress();
    }

    public function ipRange($ip, $range ) {
        if ( strpos( $range, '/' ) == false ) {
            $range .= '/32';
        }

        // $range is in IP/CIDR format eg 127.0.0.1/24
        list( $range, $netmask ) = explode( '/', $range, 2 );
        $range_decimal = ip2long( $range );
        $ip_decimal = ip2long( $ip );
        $wildcard_decimal = pow( 2, ( 32 - $netmask ) ) - 1;
        $netmask_decimal = ~ $wildcard_decimal;
        return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
    }
}
