<?php
function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $version= "";

    if(preg_match('/Maxthon/i',$u_agent)) 
    { 
        $bname = 'Maxthon'; 
        $ub = "Maxthon"; 
    } 
    elseif(preg_match('/SeaMonkey/i',$u_agent)) 
    { 
        $bname = 'SeaMonkey'; 
        $ub = "SeaMonkey"; 
    } 
    elseif(preg_match('/Vivaldi/i',$u_agent)) 
    { 
        $bname = 'Vivaldi'; 
        $ub = "Vivaldi"; 
    } 
    elseif(preg_match('/Arora/i',$u_agent)) 
    { 
        $bname = 'Arora'; 
        $ub = "Arora"; 
    } 
    elseif(preg_match('/Avant Browser/i',$u_agent)) 
    { 
        $bname = 'Avant Browser'; 
        $ub = "Avant Browser"; 
    } 
    elseif(preg_match('/Beamrise/i',$u_agent)) 
    { 
        $bname = 'Beamrise'; 
        $ub = "Beamrise"; 
    } 
    elseif(preg_match('/Epiphany/i',$u_agent)) 
    { 
        $bname = 'Epiphany'; 
        $ub = "Epiphany"; 
    } 
        elseif(preg_match('/Chromium/i',$u_agent)) 
    { 
        $bname = 'Chromium'; 
        $ub = "Chromium"; 
    } 
	    elseif(preg_match('/Iceweasel/i',$u_agent)) 
    { 
        $bname = 'Iceweasel'; 
        $ub = "Iceweasel"; 
    } 
	    elseif(preg_match('/Galeon/i',$u_agent)) 
    { 
        $bname = 'Galeon'; 
        $ub = "Galeon"; 
    } 
	    elseif(preg_match('/Edge/i',$u_agent)) 
    { 
        $bname = 'Microsoft Edge'; 
        $ub = "Edge"; 
    } 
	    elseif(preg_match('/Trident/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "Trident"; 
    } 
	    elseif(preg_match('/MSIE/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
	 elseif(preg_match('/Opera Mini/i',$u_agent)) 
    { 
        $bname = 'Opera Mini'; 
        $ub = "Opera Mini"; 
    } 
	 elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
	elseif(preg_match('/OPR/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "OPR"; 
    } 
	 elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
	 elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
	 elseif(preg_match('/Epiphany/i',$u_agent)) 
    { 
        $bname = 'Epiphany'; 
        $ub = "Epiphany"; 
    } 
	 elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Safari'; 
        $ub = "Safari"; 
    } 
	 elseif(preg_match('/iTunes/i',$u_agent)) 
    { 
        $bname = 'iTunes'; 
        $ub = "iTunes"; 
    }
		 elseif(preg_match('/Konqueror/i',$u_agent)) 
    { 
        $bname = 'Konqueror'; 
        $ub = "Konqueror"; 
    } 
	 elseif(preg_match('/Dillo/i',$u_agent)) 
    { 
        $bname = 'Dillo'; 
        $ub = "Dillo"; 
    } 
	 elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
	 elseif(preg_match('/Midori/i',$u_agent)) 
    { 
        $bname = 'Midori'; 
        $ub = "Midori"; 
    } 
	 elseif(preg_match('/ELinks/i',$u_agent)) 
    { 
        $bname = 'ELinks'; 
        $ub = "ELinks"; 
    } 
	 elseif(preg_match('/Links/i',$u_agent)) 
    { 
        $bname = 'Links'; 
        $ub = "Links"; 
    } 
	elseif(preg_match('/Lynx/i',$u_agent)) 
    { 
        $bname = 'Lynx'; 
        $ub = "Lynx"; 
    } 
	 elseif(preg_match('/w3m/i',$u_agent)) 
    { 
        $bname = 'w3m'; 
        $ub = "w3m"; 
    } 
	
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
     ')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }

    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'pattern'    => $pattern
    );
} 
$ua=getBrowser();
if ($ua==null || $ua==""){
$navegador='Desconocido';
}else{
$navegador=$ua['name'] . " / " . $ua['version'];}



	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	function getPlatform($user_agent){
		if(strpos($user_agent, 'Windows NT 10.0') !== FALSE)
			return "Windows 10";
		elseif(strpos($user_agent, 'Windows NT 6.3') !== FALSE)
			return "Windows 8.1";
		elseif(strpos($user_agent, 'Windows NT 6.2') !== FALSE)
			return "Windows 8";
		elseif(strpos($user_agent, 'Windows NT 6.1') !== FALSE)
			return "Windows 7";
		elseif(strpos($user_agent, 'Windows NT 6.0') !== FALSE)
			return "Windows Vista";
		elseif(strpos($user_agent, 'Windows NT 5.1') !== FALSE)
			return "Windows XP";
		elseif(strpos($user_agent, 'Windows NT 5.2') !== FALSE)
			return 'Windows 2003';
		elseif(strpos($user_agent, 'Windows NT 5.0') !== FALSE)
			return 'Windows 2000';
		elseif(strpos($user_agent, 'Windows Phone') !== FALSE)
			return 'Windows Phone';
		elseif(strpos($user_agent, 'Windows') !== FALSE)
			return 'Windows';
		elseif(strpos($user_agent, 'iPhone') !== FALSE)
			return 'iPhone';
		elseif(strpos($user_agent, 'iPad') !== FALSE)
			return 'iPad';
		elseif(strpos($user_agent, 'Debian') !== FALSE)
			return 'Debian';
		elseif(strpos($user_agent, 'Ubuntu') !== FALSE)
			return 'Ubuntu';
		elseif(strpos($user_agent, 'Slackware') !== FALSE)
			return 'Slackware';
		elseif(strpos($user_agent, 'Linux Mint') !== FALSE)
			return 'Linux Mint';
		elseif(strpos($user_agent, 'Gentoo') !== FALSE)
			return 'Gentoo';
		elseif(strpos($user_agent, 'Elementary OS') !== FALSE)
			return 'ELementary OS';
		elseif(strpos($user_agent, 'Fedora') !== FALSE)
			return 'Fedora';
		elseif(strpos($user_agent, 'Kubuntu') !== FALSE)
			return 'Kubuntu';
		elseif(strpos($user_agent, 'Linux') !== FALSE)
			return 'Android';
		elseif(strpos($user_agent, 'FreeBSD') !== FALSE)
			return 'FreeBSD';
		elseif(strpos($user_agent, 'OpenBSD') !== FALSE)
			return 'OpenBSD';
		elseif(strpos($user_agent, 'NetBSD') !== FALSE)
			return 'NetBSD';
		elseif(strpos($user_agent, 'SunOS') !== FALSE)
			return 'Solaris';
		elseif(strpos($user_agent, 'BlackBerry') !== FALSE)
			return 'BlackBerry';
		elseif(strpos($user_agent, 'Android') !== FALSE)
			return 'Android';
		elseif(strpos($user_agent, 'Mobile') !== FALSE)
			return 'Firefox OS';
		elseif(strpos($user_agent, 'Mac OS X+') || strpos($user_agent, 'CFNetwork+') !== FALSE)
			return 'Mac OS X';
		elseif(strpos($user_agent, 'Macintosh') !== FALSE)
			return 'Mac OS Classic';
		elseif(strpos($user_agent, 'OS/2') !== FALSE)
			return 'OS/2';
		elseif(strpos($user_agent, 'BeOS') !== FALSE)
			return 'BeOS';
		elseif(strpos($user_agent, 'Nintendo') !== FALSE)
			return 'Nintendo';
		else
			return 'Unknown Platform';
	}
	$plataforma = getPlatform($user_agent);
	
	

function getRealIP()
{
    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
		return $_SERVER["REMOTE_ADDR"];
    }
}
$id = getRealIP();

$hoy = date("Y-m-d g:ia");
?>