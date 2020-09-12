<?php
require('header.php');
require('User.php');
require('friend.php');
require('Message.php');
$id=$_GET['id'];
$user= User::GetUser($id);

$messages=[];
$messages=Message::getmessages();

$receivedmessages=Message::getreceivedmessage($id);
// foreach ($sentmessages as $sentmessage ) {
//     array_push($messages,$sentmessage);
// }
// foreach ($receivedmessages as $receivedmessage) {
//     array_push($messages,$receivedmessage);
// }
// print_r(asort($messages));
if($user['id']==$id){
    $user_chat=$user;
}

if (isset($_POST['send'])) {
    $postmessage= new Message($_POST['message']);
     $postmessage->messageValidation($id);
}
?>
<div>
<div class="contact">
    <div class='name'>
        <h4><?php echo $user['username']; ?></h4>
        <img src="<?php echo $user['image']; ?>" alt="" class="profilep">
    </div>
   
    <div class="list">
        <?php foreach($messages as $message){ ?>
            <?php if($message['sender_id']==$_SESSION['id']){?>
                <div class='sent'>
                    <?php echo $message['message']; ?>
                </div></br>
            <?php } else{?>
                <div class='recieve'>
                    <?php echo $message['message']; ?>
                </div></br>
            <?php } ?>
        <?php } ?>
    </div>
    <form action="" method="post">
           <center> <textarea name="message" id="" cols="30" rows="2" class='texe'></textarea>
            <button type="submit" name='send'>Send</button></center>
        </form>
</div>

</div>