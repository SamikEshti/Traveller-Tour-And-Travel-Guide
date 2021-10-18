<?php
include_once 'db/config.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    throw new Exception("Cannot connect to database");
}
function getErrorMessage($error = 0)
{
    $errors = [
        '0' => '',
        '1' => 'Duplicate email addresss',
        '2' => 'User or Pass word empty',
        '3' => 'User created successfully',
        '4' => 'User and password didn\'t match',
        '5' => 'This user doesn\'t exist',
    ];
    return $errors[$error];
}

function getWords($_user_id, $searchText=null)
{
    global $connection;

    if($searchText){
        $query = "SELECT * FROM words WHERE user_id='{$_user_id}' AND word LIKE '{$searchText}%' order by word DESC";
    }
    else{
        $query = "SELECT * FROM words WHERE user_id='{$_user_id}' order by word DESC";
    }
    $result = mysqli_query($connection, $query);
    while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td class="word_search"><?php echo $data['word']; ?></td>
            <td><?php echo $data['meaning']; ?></td>
            <td><a href="update_word.php?edit=<?php echo $data['id']; ?>">Edit</a></td>
        </tr>
        <?php
    }
}








//
//function getWords($_user_id)
//{
//    global $connection;
//    $query = "SELECT * FROM words WHERE user_id='{$_user_id}'";
//    $result = mysqli_query($connection, $query);
//    $data=[];
//    while ($_data=mysqli_fetch_assoc($result)){
//        array_push($data, $_data);
//    }
//    return $data;
//}
