<!-- Left Column -->
<div class="w3-col m3">
    <!-- Profile -->
    <div class="w3-card w3-round w3-white">

        <div class="w3-container">
            <img src="image/eSweeperManagementSystem.png" style="height:auto;width:80%;margin-top: 20px;margin-left: auto">

            <hr>
            <b><p style="font-size: 25px">Current System Status</p></b>
            <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> On Duty Car Team: 2 / 2 </p>
            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> Unrecognized Object : 0 </p>
        </div>
    </div>
    <br>

    <!--&lt;!&ndash; Accordion &ndash;&gt;-->
    <!--<div class="w3-card w3-round">-->
        <!--<div class="w3-white">-->
            <!--<a href="profile?action=view" class="w3-button w3-block w3-theme-l1 w3-left-align"><i-->
                    <!--class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Handle Unrecognised Object </a>-->
            <!--<a class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> System Report</a>-->
        <!--</div>-->
    <!--</div>-->
    <!--<br>-->
    <?php
    phpinfo();
    ?>
    <?php

$range = '192.168.0.2-255';
$range = explode('.', $range );
foreach( $range as $index=>$octet )
    $range[$index] = array_map( 'intval', explode('-',$octet) );

    // 4 for loops to generate the ip address 4 octets
    for( $octet1=$range[0][0]; $octet1<=(($range[0][1])? $range[0][1]:$range[0][0]); $octet1++ )
    for( $octet2=$range[1][0]; $octet2<=(($range[1][1])? $range[1][1]:$range[1][0]); $octet2++ )
    for( $octet3=$range[2][0]; $octet3<=(($range[2][1])? $range[2][1]:$range[2][0]); $octet3++ )
    for( $octet4=$range[3][0]; $octet4<=(($range[3][1])? $range[3][1]:$range[3][0]); $octet4++ )
    {
    // assemble the IP address
    $ip = $octet1.".".$octet2.".".$octet3.".".$octet4;

    // initialise the URL
    $x = curl_init( $ip );

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
    echo $ip." : ";
    if( $title_end!==false ) // if title tag exists
    echo trim(substr( $buffer, $title_start, $title_end-$title_start ))."\n"; // print title
    else if( strlen($buffer)>0 ) // if there is a response
    echo "Cannot get title\n";
    else
    echo "[Not a site]\n"; // if the isn't any response
    }

?>


</div>