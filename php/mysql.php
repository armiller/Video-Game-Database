<?php  include_once('database.php');

    function db_query($query) {

        $mysql_handle = connect_db();

        $query_result = mysql_query($query);

        if (!$query_result) {
            echo "<div class='container'>";
            echo "<div class='alert alert-error'>";
            echo "Invalid query : ".$query. "<br><br> " . mysql_error($mysql_handle);
            echo "</div></div>";
            die();
        }

        return $query_result;
    }

    function view_all_video_games() {

        $query = "SELECT DISTINCT vg.name, vg.year_released, e.rating, gs.name FROM video_game vg
            JOIN esbr e ON vg.esbr_eid = e.eid 
            JOIN video_game_has_game_studio vs_gs ON vs_gs.video_game_gid = vg.gid 
            JOIN game_studio gs ON vs_gs.game_studio_sid = gs.sid
            GROUP BY vg.name";

        $result = db_query($query);

        while ($record = mysql_fetch_array($result)) {

            echo "<tr>";
            echo "<td><a href='videodetail.php?name=".$record[0]."'>".$record[0]."</a></td>";
            echo "<td>".$record[1]."</td>";
            echo "<td>".$record[2]."</td>";
            echo "<td>".$record[3]."</td>";
            echo "</tr>\n";
        }

        mysql_free_result($result);

        close_db();
    }

    function search($input) {

        $query = "SELECT name FROM video_game WHERE name like '%".$input."%'";

        $result = db_query($query);

        close_db();

        return $result;


    }

    function build_game_studio_options() {

        $query = "SELECT sid, name FROM game_studio ORDER BY name";

        $result = db_query($query);

        while($record = mysql_fetch_array($result)) {

            echo "<option value='".$record[0]."'>".$record[1]."</option>";
        }

        mysql_free_result($result);

        close_db();
    }

    function build_video_game_options() {

        $query = "SELECT gid, name FROM video_game ORDER BY name";

        $result = db_query($query);

        while($record = mysql_fetch_array($result)) {

            echo "<option value='".$record[0].",".$record[1]."'>".$record[1]."</option>";
        }

        mysql_free_result($result);

        close_db();
    }

    function insert_new_video_game($name, $year, $esbr, $studio, $devices, $url) {

        if ($url == null) {

            $url = "http://cbhighcountry.com/wp-content/themes/CB/images/no_image.jpg";
        }
        $insert_vg = "INSERT INTO video_game(name, year_released, img, esbr_eid) 
                    VALUES ('".$name."', '".$year."', '".$url."', ".$esbr.")";
        
        $insert_vg_studio = "INSERT INTO video_game_has_game_studio VALUES (LAST_INSERT_ID(), ".$studio.")";
        
        db_query("START TRANSACTION");
        db_query($insert_vg);
        db_query($insert_vg_studio);

        if($devices != null) {

            foreach($devices as $device) {

                $insert_device = "INSERT INTO video_game_has_device VALUES (LAST_INSERT_ID(), ".$device.")";
                db_query($insert_device);
            }
        }

        db_query("COMMIT"); 

        close_db();

        return true;

    }

    function delete_video_game($id) {

        $query = "DELETE FROM video_game WHERE gid = '".$id."'";

        db_query($query);

        close_db();

        return true;

    }

    function get_next_previous($name) {

        $results = array();

        $last = "SELECT vg.name FROM video_game vg WHERE vg.name < '".$name."' ORDER BY vg.name DESC LIMIT 1";
        $next = "SELECT vg.name FROM video_game vg WHERE vg.name > '".$name."' ORDER BY vg.name ASC LIMIT 1";

        $last_result = db_query($last);
        $next_result = db_query($next);

        $last_name = mysql_fetch_array($last_result);
        $next_name = mysql_fetch_array($next_result);

        array_push($results, $last_name[0]);
        array_push($results, $next_name[0]);

        close_db();

        return $results;

    }

    function select_video_game($name) {

        $query = "SELECT vg.name, e.rating, gs.name, vg.img, vg.gid, vg.year_released FROM video_game vg
            JOIN esbr e ON vg.esbr_eid = e.eid 
            JOIN video_game_has_game_studio vs_gs ON vs_gs.video_game_gid = vg.gid 
            JOIN game_studio gs ON vs_gs.game_studio_sid = gs.sid
            LEFT OUTER JOIN review_site_has_video_game rs_vg ON rs_vg.video_game_gid = vg.gid
            WHERE vg.name = '".$name."'";

        $result = db_query($query);

        $query_result = mysql_fetch_array($result);

        close_db();

        return $query_result;
    }

    function update_video_game($id, $name, $year, $url, $rating, $studio, $devices) {

        $get_devices = "SELECT d.name FROM device d 
                        LEFT JOIN video_game_has_device vd ON d.did = vd.device_did 
                        LEFT JOIN video_game vg ON vd.video_game_gid = vg.gid WHERE vg.gid = ".$id."";
        $device_results = db_query($get_devices);
        $vg_devices = mysql_fetch_array($device_results);

        db_query("START TRANSACTION");

        if($name != null && $year != null && $url != null && $rating != 0) {

            $name_year = "UPDATE video_game SET name = '".$name."' 
            AND year_released = '".$year."' 
            AND img = '".$url."' AND esbr_eid = ".$rating." WHERE gid = ".$id."";
            db_query($name_year);
            
        } elseif ($name != null) {

            $video_query = "UPDATE video_game SET name = '".$name."' WHERE gid = ".$id."";
            db_query($video_query);

        } elseif ($year != null) {

            $year_query = "UPDATE video_game SET year_released = ".$year." WHERE gid = ".$id."";
            db_query($year_query);

        } elseif($rating != 0) {

            $rating_query = "UPDATE video_game SET esbr_eid = ".$rating." WHERE gid = ".$id."";
            db_query($rating_query);
        }

        if($studio != null) {

            $studio_query = "UPDATE video_game_has_game_studio SET game_studio_sid = ".$studio." WHERE video_game_gid = ".$id."";
            db_query($studio_query);
        } 

        if($devices != null) {

            $delete_old_devices = "DELETE FROM video_game_has_device WHERE video_game_has_device.video_game_gid = ".$id."";
            db_query($delete_old_devices);
            foreach($devices as $newdevice) {

                $insert_new_device = "INSERT INTO video_game_has_device VALUES (".$id.", $newdevice)";
                db_query($insert_new_device);
            }
        }

        $result = db_query("COMMIT");

        close_db();

        return $result;
    }

    function build_device_options() {

        $query = "SELECT did, name FROM device";

        $result = db_query($query);

        while($row = mysql_fetch_array($result)) {

            echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }

        mysql_free_result($result);

        close_db();

        return true;
    }

    function get_supported_devices($id) {

        $query = "SELECT d.name, d.release_date, m.name FROM device d 
                LEFT JOIN video_game_has_device vd ON d.did = vd.device_did 
                LEFT JOIN video_game vg ON vd.video_game_gid = vg.gid 
                JOIN manufacturer m ON m.mid = d.manufacturer_mid
                WHERE vg.gid = ".$id."";

        $result = db_query($query);

        while($row = mysql_fetch_array($result)) {

            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
        }

        close_db();

        return true;
    }

?>