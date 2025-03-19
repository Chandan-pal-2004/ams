<?php
require 'db.php';

function webSetting($columnName)
{
    $setting = getById('settings', 1);
    if ($setting['status'] == 200) {
        return $setting['data'][$columnName];
    }
}

function getById($tableName, $id)
{
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1 ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'Fetched Data ',
                'data' => $row
            ];
            return $response;
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong'
        ];
        return $response;
    }


}

function validate($inputData)
{
    global $conn;

    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);

}

function redirect($url, $status)
{
    $_SESSION['status'] = "$status";
    header('Location:' . $url);
    exit;
}
?>