<?php
//Connect to DB
  $connection = new mysqli("localhost", "root", "", "sys");
  mysqli_select_db($connection, "FantasyNameDB");

  //Create output variable template
  $output = "Your  character's name is ";

  //Randomly select one value from each table in DB under male category and concat to output variable
  if($_POST['gender'] == 'male')
  {
    $firstnameprefix = mysqli_query($connection, "SELECT prefixName FROM prefixes ORDER BY RAND() LIMIT 1;");
    while($fPre = mysqli_fetch_assoc($firstnameprefix))
    {
      $output = $output."<strong>".$fPre['prefixName'];
    }
    echo $fPre;
    $firstnamesuffix = mysqli_query($connection, "SELECT msufName FROM maleSuffixes ORDER BY RAND() LIMIT 1;");
    while($msuf = mysqli_fetch_assoc($firstnamesuffix))
    {
      $output = $output.$msuf['msufName'];
    }
    $output = $output." ";
    $lastnameprefix = mysqli_query($connection, "SELECT lpName FROM lastNamePre ORDER BY RAND() LIMIT 1;");
    while($lpre = mysqli_fetch_assoc($lastnameprefix))
    {
      $output = $output.$lpre['lpName'];
    }
    $lastnamesuffix = mysqli_query($connection, "SELECT lsName FROM lastNameSuf ORDER BY RAND() LIMIT 1;");
    while($lsuf = mysqli_fetch_assoc($lastnamesuffix))
    {
      $output = $output.$lsuf['lsName'];
    }
    $output = $output."</strong>!";
    echo $output;
  }
  //Randomly select one value from each table in DB under female category and concat to output variable
  else
    {
      $firstnameprefix = mysqli_query($connection, "SELECT prefixName FROM prefixes ORDER BY RAND() LIMIT 1;");
      while($fPre = mysqli_fetch_assoc($firstnameprefix))
      {
        $output = $output."<strong>".$fPre['prefixName'];
      }
      $firstnamesuffix = mysqli_query($connection, "SELECT fsufName FROM femaleSuffixes ORDER BY RAND() LIMIT 1;");
      while($fsuf = mysqli_fetch_assoc($firstnamesuffix))
      {
        $output = $output.$fsuf['fsufName'];
      }
      $output = $output." ";
      $lastnameprefix = mysqli_query($connection, "SELECT lpName FROM lastNamePre ORDER BY RAND() LIMIT 1;");
      while($lpre = mysqli_fetch_assoc($lastnameprefix))
      {
        $output = $output.$lpre['lpName'];
      }
      $lastnamesuffix = mysqli_query($connection, "SELECT lsName FROM lastNameSuf ORDER BY RAND() LIMIT 1;");
      while($lsuf = mysqli_fetch_assoc($lastnamesuffix))
      {
        $output = $output.$lsuf['lsName'];
      }
      $output = $output."</strong>!";
      echo $output;
    }
//Close connection
    mysqli_close($connection);

    //Display continued name generation form
?>
<html><br><br>
<header>
  <style>
  body {
    font-size: 30px;
    text-align: center;
    background-color: rgb(39, 212, 236);
  }
  form, h1, h2 {
    text-align: inherit;
    width: 50%;
    display: inline-block;
  }
  </style>
</header>
<body>
  Want to go again? Just pick a gender and resubmit!<br />
  <form action="FantasyNameDB.php" method="post">
    Please choose your character's gender:
    <fieldset>
      <legend>Gender</legend>
      <input type="radio" name="gender" value="female" checked="checked">Female<br>
      <input type="radio" name="gender" value="male">Male<br>
    </fieldset><br>
    <input type="submit" value="Name my character!">
  </form><br>
    Click <a href="FantasyNameDB.html">HERE</a> to go back to the home screen.
</body>

</html>
