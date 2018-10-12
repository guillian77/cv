<?php

class Calendar{
    var $currentMonth;
    var $currentYear;
    var $currentDate;
    var $currentTime;
    var $prevTime;
    var $nextTime;
    var $weekDays;

    # func to initialise calendar
    function LoadCalendar($timeStamp){
        if(!empty($timeStamp)){
            $this->currentYear =  date('Y',$timeStamp);
            $this->currentMonth = date('m',$timeStamp); 
        }else{
            $this->currentYear =  date('Y');
            $this->currentMonth = date('m');
        }
        $this->currentDate = date('d');
        $this->currentTime = mktime(0, 0, 0, $this->currentMonth , 1 , $this->currentYear);
        $prevMonth = $this->currentMonth - 1;
        $nextMonth = $this->currentMonth + 1;
        $this->prevTime = mktime(0, 0, 0, $prevMonth , 1 , $this->currentYear);
        $this->nextTime = mktime(0, 0, 0, $nextMonth , 1 , $this->currentYear);
        $this->weekDays = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
    }

    # func to display calendar
    function DisplayCalendar($timeStamp="")
    {
    	global $events;

        $this->LoadCalendar($timeStamp);

        $currentTime = mktime(0, 0, 0, $this->currentMonth , 1 , $this->currentYear);
        $prevMonth = $this->currentMonth - 1;
        $nextMonth = $this->currentMonth + 1;
        $prevTime = mktime(0, 0, 0, $prevMonth , 1 , $this->currentYear);
        $nextTime = mktime(0, 0, 0, $nextMonth , 1 , $this->currentYear);

        $monthText = strftime("%B", $currentTime);
        $yearText = strftime("%Y", $currentTime);
        $dayText = strftime("%A", $currentTime);
        $dayTextNum = strftime("%e", $currentTime);

        $totalDays = date('t', $currentTime);
        $firstDay = date("D", $currentTime);
        $weekDays = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
        $listMonth = array();
	    $prevMonthText = strftime("%B %Y", $prevTime);
        $nextMonthText = strftime("%B %Y", $nextTime);

        $today = mktime();

        # to find the day of 1st day in a month
        $index = array_search($firstDay, $weekDays);

        # starts to print calender
        echo '
        <html>
        <head>
            <style>
            body{
                font-family: Tahoma, verdana, arial, sans-serif;
            }
            .header_tab{
                padding:10px 0 20px 0;
                font-size:18px;
                color:#5e5e5e;
            }

            .header_tab A{
                text-decoration:none;
                color:#0092e8;
            }

            .cal_tab{
                padding:0px;
                text-align:center;
                vertical-align:center;
            }
            
            .cal_tab td A{
                color:black;
                text-decoration:none;
            }
            
            .copy {
                width:950px;
                float:center;
                text-align:center;
                font-size:9px;
                color:#515151;                
                padding-top:4px;
                padding-right:50px;
            }         
            
            .copy a {
                font-family:Arial;
                font-size:9px;
                color:#7F7F7F;
                text-decoration:none;
                display:inline-block;
                padding:0 10px 0 10px;
            }
            </style>
        <head>
        <body>
        <table align="center" border="0" class="header_tab">
            <tr>
                <th style="padding-right:50px;"><a class="noBorder" href="?page=calendar&timeStamp='.$prevTime.'">'.$prevMonthText.'</a></td>
                <th><b>'.$monthText." ".$yearText.'</b></td>
                <th style="padding-left:50px;"><a class="noBorder" href="?page=calendar&timeStamp='.$nextTime.'">'.$nextMonthText.'</a></td>
            </tr>
        </table>
        <p>
        </p>
        <table align="center" cellpadding="0px" cellspacing="0px" border="1px" class="cal_tab">
        	<thead>
	            <tr>
	                <th>Dimanche</th>
	                <th>Lundi</th>
	                <th>Mardi</th>
	                <th>Mercredi</th>
	                <th>Jeudi</th>
	                <th>Vendredi</th>
	                <th>Samedi</th>
	            </tr>
             </thead>';
        $w = 0;
        for($m = 1; $m <= $totalDays ; ){
            $d = ($m == 1) ? $index : 0;
            for( ; $d <= 6 ; $d++){
                $listMonth[$w][$d] = $m;
                $m++;
                if($m > $totalDays){break;}
            }
            $w++;
        }

        # to get total details of a month
        foreach($listMonth as $styleIdx => $listWeek){
            echo "<tr>";
            for($i = 0 ; $i <= 6 ; $i++){
                if (isset($listWeek[$i])) {
                    $day = $listWeek[$i] < 10 ? "0".$listWeek[$i] : $listWeek[$i];
                    $month = $this->currentMonth;
                    $content = '<span class="date-title"><a href="">'.$day.'</a></span>';
                    // Recherche des events
                    foreach ($events as $event)
			        {
			        	$eventDaysNum = strftime("%e", $event['event_date']);
			        	$eventHour = strftime("%H", $event['event_date']);
			        	$eventMinutes = strftime("%M", $event['event_date']);
			        	echo $listWeek[$i];
			        }
                } else {
                    $content = "&nbsp;";
                }

                $style = ($styleIdx % 2) ? "background-color:#E6E6E6" : "";

                $description = NULL;
                if($listWeek[$i] == date('d')){ 
                    $style = "background-color:#313131";
                    $description = '<div class="cal-event"><p style="color=#fafafa"><b>Aujourd\'hui</b></p></div>';
                }

		        if($listWeek[$i] == 27)
				{ 
					$style = "background-color:#c22828";
					$description = '<div class="cal-event">
							<a href="?page=calendar&action=event&name=Capturer Jean-Michel Crapaud">Tournois 5 contre 5 LOL<span><i class="fa fa-clock-o"></i> '.$eventHour.'h'.$eventMinutes.'</span></a>
						</div>';
				}

                
                echo "<td width='200px' height='70px' style='$style'>{$content}{$description}</td>";
            }
            echo "</tr>";
        }
        echo '</table>
              </body>
              </html>';
            
    }

    # func to display calendar header
    function DisplayHeader($class="",$td_class=""){
        $tmp = "<tr id='col'>";
        foreach($this->weekDays as $day){
            $tmp .= "<td class='$td_class'>$day</td>";
        }
        $tmp .= "</tr>";
        return $tmp;
    }

}

# call calendar class to display calendar
// $calendar = New Calendar();
// $calendar->DisplayCalendar($_GET['timeStamp']);

?>