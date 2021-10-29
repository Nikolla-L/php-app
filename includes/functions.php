<?php 
    require_once('db.php');
    session_start();


    /* format arrays */
    function formatcode($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    /* select statement */
    function selectAll() {
        global $mysqli;
        $data = array();
        $stmt = $mysqli->prepare('SELECT * FROM emplyees');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0):
            $_SESSION['message'] = array('type' => 'danger', 'msg' => 'There are currently no records in the database');
        else:
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        endif;
        $stmt->close();
        return $data;
    }

    /* select single statement */
    function selectSingle($id = NULL) {
        global $mysqli;
        $stmt = $mysqli->prepare('SELECT * FROM emplyees WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    /* insert statement */
    function insert($fname = NULL, $lname = NULL, $phone = NULL) {
        global $mysqli;
        $stmt = $mysqli->prepare('INSERT INTO emplyees (fname, lname, phone) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $fname, $lname, $phone);
        $stmt->execute();
        $stmt->close();
        $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully added a new employee');
        header('Location: /');
        exit();
    }

    /* update statement */
    function update($fname = NULL, $lname = NULL, $phone = NULL, $id) {
        global $mysqli;
        $stmt = $mysqli->prepare('UPDATE emplyees set fname = ?, lname = ?, phone = ? where id = ?');
        $stmt->bind_param('sssi', $fname, $lname, $phone, $id);
        $stmt->execute();
        if ($stmt->affected_rows === 0):
            $_SESSION['message'] = array('type' => 'danger', 'msg' => 'You did not make any changes');
        else:
            $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully update the selected employee');
        endif;
        $stmt->close();
    }

    /* delete statement */
    function delete($id) {
        global $mysqli;
        $stmt = $mysqli->prepare('DELETE FROM emplyees WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully deleted the selected employee');
        header('Location: /');
        exit();
    }