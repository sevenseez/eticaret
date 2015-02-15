<?php 

$commentator = Yii::app()->user->real_name($data['user_id']);
$date = explode(' ',$data['date']);
$comment = $data['comment'];
?>

<li><a href=""><i class="fa fa-user"></i><?php echo $commentator;?></a></li>
<li><a href=""><i class="fa fa-clock-o"></i><?php echo $date[1];?></a></li>
<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $date[0];?></a></li>


<p><?php echo $comment;?></p>
                                     