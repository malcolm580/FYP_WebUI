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
    Car List:<br />
    <?php
   include "CarList.php";
    ?>


</div>