<?php   include_once "MYSQL.php";

    function view_all_video_games() {

        mysql_connect_db(&$mysql_handle); 

        $query = "SELECT video_game.name, esbr.rating, game_studio.name FROM video_game
            JOIN esbr ON video_game.esbr_eid = esbr.eid 
            JOIN video_game_has_game_studio ON video_game_has_game_studio.video_game_gid = video_game.gid 
            JOIN game_studio ON video_game_has_game_studio.game_studio_sid = game_studio.sid
            ORDER BY video_game.name";

        $result = mysql_query($mysql_handle, $query);

        if (!$result) {

            echo "Query Failed";
        }

        while ($record = $mysqli_fetch_array($result)) {

            echo "<tr>"
            echo "<td>".$record[0];
            echo "<td>".$record[1];
            echo "<td>".$record[2];
            echo "</tr>"
        }


        mysql_close(&$mysql_handle);

?>