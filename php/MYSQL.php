<?php  include_once('database.php');

    function db_query($query) {

        connect_db($mysql_handle);

        $query_result = mysql_query($query);

        if (!$query_result) {
            die('Invalid query : '.$query. '<br>' . mysqli_error($mysql_handle));
        }

        return $query_result;
    }

    function view_all_video_games() {

        $query = "SELECT DISTINCT vg.name, e.rating, gs.name, rs_vg.rating FROM video_game vg
            JOIN esbr e ON vg.esbr_eid = e.eid 
            JOIN video_game_has_game_studio vs_gs ON vs_gs.video_game_gid = vg.gid 
            JOIN game_studio gs ON vs_gs.game_studio_sid = gs.sid
            LEFT OUTER JOIN review_site_has_video_game rs_vg ON rs_vg.video_game_gid = vg.gid
            GROUP BY vg.name";

        $result = db_query($query);

        while ($record = mysql_fetch_array($result)) {

            echo "<tr>";
            echo "<td>".$record[0]."</td>";
            echo "<td>".$record[1]."</td>";
            echo "<td>".$record[2]."</td>";
            echo "<td>".$record[3]."</td>";
            echo "</tr>\n";
        }

        close_db();
    }

    function build_insert_options() {

        $query = ""
    }
?>