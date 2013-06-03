<?php  include_once('DATABASE.php');

    function db_query($query) {

        connect_db($mysql_handle);

        $query_result = mysql_query($query);

        if (!$query_result) {

            die('Invalid query : '.$query. '<br>' . mysqli_error($mysql_handle));
        }

        return $query_result;
    }




    function view_all_video_games() {

        $query = "SELECT video_game.name, esbr.rating, game_studio.name FROM video_game 
            JOIN esbr ON video_game.esbr_eid = esbr.eid 
            JOIN video_game_has_game_studio ON video_game_has_game_studio.video_game_gid = video_game.gid 
            JOIN game_studio ON video_game_has_game_studio.game_studio_sid = game_studio.sid 
            ORDER BY video_game.name";

        $result = db_query($query);

        while ($record = mysql_fetch_array($result)) {

            echo "<tr>";
            echo "<td>".$record[0]."</td>";
            echo "<td>".$record[1]."</td>";
            echo "<td>".$record[2]."</td>";
            echo "</tr>\n";
        }


        close_db();
    }
?>