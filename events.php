<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml-lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Events</title>
    <link rel="stylesheet" href="cfa.css" />
</head>

<body>
    <div class="container">

        <?php include('common/header.php');?>
        <?php include('common/menu.php');?>
        <?php include('common/sidebar.php');?>
        
        <div class="info">
        <button><span><a href="new_event.php" class="fill"><b>Add Event</b></a></span></button>
            <div class = "calendar">

                <h2>November 2019</h2>

                <div class="day">
                    <div>Sunday</div> 
                    <div>Monday</div>
                    <div>Tuesday</div>
                    <div>Wednesday</div>
                    <div>Thursday</div>
                    <div>Friday</div>
                    <div>Saturday</div>
                </div>

                <div class="dates">
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                    <span>6</span>
                    <span>7</span>
                    <span>8</span>
                    <span>9</span>
                    <span>10</span>
                    <span>11</span>
                    <span>12</span>
                    <span>13</span>
                    <span>14</span>
                    <span>15</span>
                    <span>16</span>
                    <span>17</span>
                    <span>18</span>
                    <span>19</span>
                    <span>20</span>
                    <span>21</span>
                    <span>22</span>
                    <span>23</span>
                    <span>24</span>
                    <span>25</span>
                    <span>26</span>
                    <span>27</span>
                    <span>28</span>
                    <span>29</span>
                    <span>30</span>
                </div>
            </div>
            
        <?php 
        // $fileData = file_get_contents('events.txt');
        // $eventArray = explode('|', $fileData, -1);

        // for ($i=0; $i<count($eventArray); $i++){
        //     $eventArray[$i] = json_decode($eventArray[$i], TRUE);
        // }

    $db = new SQLite3('cfa.db') or die('Unable to open database');
    $query = <<<QUERY
    SELECT *
    FROM event
QUERY;
    $eventArray = array();
    $result = $db->query($query) or die('Query failed');
    while($row = $result->fetchArray()){
        array_push($eventArray, $row);
    }
    $db->close();

        function date_sort($a, $b) {
            return strtotime($a['eventDate']) - strtotime($b['eventDate']);
        }
        usort($eventArray, "date_sort");

        foreach ($eventArray as $event){
            echo "<hr>
            <div class = \"content\">
            <h3>".$event["eventName"]."</h3>
            <p><strong>Date: </strong>".$event["eventDate"]." at ".$event["eventTime"]."<br>
            <strong>Sponsor: </strong>".$event["sponsor"]."<br>
            <strong>Where: </strong>".$event["location"]."<br>
            <strong>Description: </strong>".$event["description"]."</p>
            </div>";
        }
        ?>
        <hr>
        <div id="large">
            <br>
            <p>
                All fishing event require general fishing license. 
                Anglers wishing to fish in our trout events are also 
                required to have a trout license. Proceeds from all 
                fishing tournaments support association objectives.
                More information about the Charlottesville Fishing Association
                and its objectives can be found <a href="about.php">here</a>.
            </p>
            <br>
        </div>

        </div>
    </div>

    <?php include('common/footer.php'); ?>

</body>

</html>