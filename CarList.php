<?php
//fuck windows
//windows要在php.ini把extension_dir改成絕對路徑
//source: https://gist.github.com/emad-elsaid/808796
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
$range = '192.168.1.1-192.168.1.150';
$range = explode('.', $range );

foreach( $range as $index=>$octet )
    $range[$index] = array_map( 'intval', explode('-',$octet) );
echo ("<pre>");
print_r ($range);
echo("</pre>");

// 4 for loops to generate the ip address 4 octets
for( $octet1=$range[0][0]; $octet1<=(($range[0][1])? $range[0][1]:$range[0][0]); $octet1++ )
    for( $octet2=$range[1][0]; $octet2<=(($range[1][1])? $range[1][1]:$range[1][0]); $octet2++ )
        for( $octet3=$range[2][0]; $octet3<=(($range[2][1])? $range[2][1]:$range[2][0]); $octet3++ )
            for( $octet4=$range[3][0]; $octet4<=(($range[3][1])? $range[3][1]:$range[3][0]); $octet4++ )
            {
                // assemble the IP address
                $ip = $octet1.".".$octet2.".".$octet3.".".$octet4.":9093";

                // initialise the URL
                $x = curl_init( $ip );
                curl_setopt($x,CURLOPT_CONNECTTIMEOUT_MS,1);
                // output buffer start becase it damn output the page HTML
                ob_start();
                // get page HTML
                curl_exec( $x );
                // get HTML from output buffer
                $buffer = ob_get_contents();
                // clean buffer
                ob_end_clean();

                // get the title position
                $title_start = strpos( $buffer, '<title>')+strlen('<title>');
                $title_end = strpos( $buffer, '</title>');

                // print the result for that IP address
                if( $title_end!==false ) { // if title tag exists
                    echo $ip . " : ";
                    echo trim(substr($buffer, $title_start, $title_end - $title_start)) . "\n"; // print title
                }
                else if( strlen($buffer)>0 ) // if there is a response
                    echo "Cannot get title<br />";
                else
                    echo "";
                    //echo "[Not a site]\n"; // if the isn't any response
            }
?>
