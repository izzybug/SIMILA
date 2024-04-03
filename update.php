<?php
  include('includes/config.php');
  
  $email="mahasiswa@gmail.com";

  if(isset($_SESSION['key']))
  {
    if(@$_GET['demail']) 
    {
      $demail=@$_GET['demail'];
      $r1 = mysqli_query($conn,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      $r2 = mysqli_query($conn,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($conn,"DELETE FROM user WHERE email='$demail' ") or die('Error');
      header("location:dashboard.php?q=1");
    }
  }

  if(@$_GET['q']== 'rmquiz') 
    {
      $eid=@$_GET['eid'];
      $result = mysqli_query($conn,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
      while($row = mysqli_fetch_array($result)) 
      {
        $qid = $row['qid'];
        $r1 = mysqli_query($conn,"DELETE FROM options WHERE qid='$qid'") or die('Error');
        $r2 = mysqli_query($conn,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
      }
      $r3 = mysqli_query($conn,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
      $r4 = mysqli_query($conn,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
      $r4 = mysqli_query($conn,"DELETE FROM history WHERE eid='$eid' ") or die('Error');
      header("location:list_kuis.php");
    }

  if(@$_GET['q']== 'addquiz') 
    {
      $name = $_POST['name'];
      $name= ucwords(strtolower($name));
      $total = $_POST['total'];
      $sahi = $_POST['right'];
      $wrong = $_POST['wrong'];
      $id=uniqid();
      $q3=mysqli_query($conn,"INSERT INTO quiz (`eid`, `title`, `sahi`, `wrong`, `total`) VALUES  ('$id','$name' , '$sahi' , '$wrong','$total')");
      header("location:tambah_kuis.php?q=4&step=2&eid=$id&n=$total");
    }

    if(@$_GET['q']== 'addqns') 
    {
      $n=@$_GET['n'];
      $eid=@$_GET['eid'];
      $ch=@$_GET['ch'];
      for($i=1;$i<=$n;$i++)
      {
        $qid=uniqid();
        $qns=$_POST['qns'.$i];
        $q3=mysqli_query($conn,"INSERT INTO questions (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
        $oaid=uniqid();
        $obid=uniqid();
        $ocid=uniqid();
        $odid=uniqid();
        $oeid=uniqid();
        $a=$_POST[$i.'1'];
        $b=$_POST[$i.'2'];
        $c=$_POST[$i.'3'];
        $d=$_POST[$i.'4'];
        $e=$_POST[$i.'5'];
        $qa=mysqli_query($conn,"INSERT INTO options (`qid`, `option`, `optionid`) VALUES  ('$qid','$a','$oaid')") or die('Error61');
        $qb=mysqli_query($conn,"INSERT INTO options (`qid`, `option`, `optionid`) VALUES  ('$qid','$b','$obid')") or die('Error62');
        $qc=mysqli_query($conn,"INSERT INTO options (`qid`, `option`, `optionid`) VALUES  ('$qid','$c','$ocid')") or die('Error63');
        $qd=mysqli_query($conn,"INSERT INTO options (`qid`, `option`, `optionid`) VALUES  ('$qid','$d','$odid')") or die('Error64');
        $qe=mysqli_query($conn,"INSERT INTO options (`qid`, `option`, `optionid`) VALUES  ('$qid','$e','$oeid')") or die('Error65');
        $e=$_POST['ans'.$i];
        switch($e)
        {
          case 'a': $ansid=$oaid; break;
          case 'b': $ansid=$obid; break;
          case 'c': $ansid=$ocid; break;
          case 'd': $ansid=$odid; break;
          case 'e': $ansid=$oeid; break;
          default: $ansid=$oaid;
        }
        $qans=mysqli_query($conn,"INSERT INTO answer (`qid`, `ansid`) VALUES  ('$qid','$ansid')");
      }
      header("location:list_kuis.php");
    }

    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {

      $total=@$_GET['t'];
      $eid=@$_GET['eid'];
      $username=$_POST['username'];
      $q = mysqli_query($conn, "INSERT INTO users_kuis (`username`, `eid`) VALUES ('$username', '$eid')");
      $q = mysqli_query($conn, "SELECT * FROM users_kuis WHERE username='$username'" );
      $row=mysqli_fetch_array($q);
      $usr=$row['id'];
      header("location:mulai_kuis.php?q=quiz&step=3&eid=$eid&n=1&t=$total&usr=$usr");
  }

  if(@$_GET['q']== 'quiz' && @$_GET['step']== 3) 
  {
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    $ans=$_POST['ans'];
    $qid=@$_GET['qid'];
    $usr=@$_GET['usr'];
    $q=mysqli_query($conn,"SELECT * FROM answer WHERE qid='$qid' " );
    while($row=mysqli_fetch_array($q) )
    {  $ansid=$row['ansid']; }
    if($ans == $ansid)
    {
      $q=mysqli_query($conn,"SELECT * FROM quiz WHERE eid='$eid' " );
      while($row=mysqli_fetch_array($q) )
      {
        $sahi=$row['sahi'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($conn,"INSERT INTO `history` (`id_users`,`email`, `eid`, `score`, `level`, `sahi`, `wrong`) VALUES('$usr','$email','$eid' ,'0','0','0','0')")or die('Error');
      }
      $q=mysqli_query($conn,"SELECT * FROM `history` WHERE eid='$eid' AND id_users='$usr' ")or die('Error115');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $r=$row['sahi'];
      }
      $r++;
      $s=$s+$sahi;
      $q=mysqli_query($conn,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  id_users = '$usr'")or die('Error124');
    } 
    else
    {
      $q=mysqli_query($conn,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');
      while($row=mysqli_fetch_array($q) )
      {
        $wrong=$row['wrong'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($conn,"INSERT INTO history (`id_users`, `email`, `eid`, `score`, `level`, `sahi`, `wrong`) VALUES('$usr', '$email','$eid' ,'0','0','0','0' )")or die('Error137');
      }
      $q=mysqli_query($conn,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $w=$row['wrong'];
      }
      $w++;
      $s=$s-$wrong;
      $q=mysqli_query($conn,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  id_users = '$usr'")or die('Error147');
    }
    if($sn != $total)
    {
      $sn++;
      header("location:mulai_kuis.php?q=quiz&step=3&eid=$eid&n=$sn&t=$total&usr=$usr")or die('Error152');
    }
    else
    {
      $q=mysqli_query($conn,"SELECT * FROM history WHERE id_users='$usr'" );
      $row = mysqli_fetch_array($q);
      $id=$row['id'];
      $user=$row['id_users'];
      header("location:mulai_kuis.php?q=result&eid=$eid&usr=$user&id=$id");
    }
  }
?>