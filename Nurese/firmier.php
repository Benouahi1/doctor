<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./firmier.css">
    <!-- link of the icon  -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- link of style  nav_bar component  -->
    <link rel="stylesheet" href="../nav_bar_P_N_PR/nav_bar.css">
    <title>Document</title>
</head>

<?php include '../Parofil_docteur/connection.php'; ?>
<?php
$sql = ' SELECT * FROM infirmieres ';
$result = mysqli_query($conn, $sql);
$infirmieres = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['edite'])) {
    $fullName = $_POST['new_name'];
    $nomA = explode(' ', $fullName);
    $birth = $_POST['new_birth'];
    $phone = $_POST['new_phone'];
    $SWork_starting_date = $_POST['new_Work_starting_date'];
    $Gmail = $_POST['new_Gmail'];
    $query = "INSERT INTO infirmieres (nom,Prenom,date_naissance,Gmail,NM, WorkStarting) VALUES ('$nomA[0]','$nomA[1]','$birth','$Gmail','$phone','$SWork_starting_date')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:firmier.php');
    };
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM infirmieres WHERE id=$id ;";
    if (mysqli_query($conn, $sql)) {
        header('location:firmier.php');
    }
}

if (isset($_POST['brakkk'])) {

    $idIF = $_GET["id"];

    $fullName = $_POST['Nname'];
    $nomC = explode(' ', $fullName);
    $birth = $_POST['Nbirth'];
    $Work = $_POST['NWork'];
    $phone = $_POST['Nphone'];
    $Gmail = $_POST['NGmail'];
    $sqli = " UPDATE infirmieres SET `nom`='$nomC[0]',`Prenom`='$nomC[1]',`date_naissance`='$birth',`Gmail`='$Gmail',`NM`='$phone',`WorkStarting`='$Work' WHERE id like $idIF ";
    $result =  mysqli_query($conn, $sqli);
    header(("location:http://localhost/ayoub/Nurese/firmier.php"));
}

?>






<body>
    <header class="header_doc">
        <div class="nav-bar">
            <img src="../index/logo.png" class="logo" />
            <ul class="menu">
                <li id="hh"><a href="../patient/patient.php">Patients</a></li>
                <li id="hh"><a href="#about">Nurses</a></li>
                <li class="active" id="hh"><a href="../Parofil_docteur/profil.php">Profile</a></li>
                <li>
                    <a href="../index/index1.html"> <button class="hoo" type="button">Log out</button></a>
                </li>
            </ul>
            <i id="Button-menu1" class='bx bx-menu'></i>
            <!-- nav bar click  -->
            <div id="menu">
                <i class='bx bx-x' id="icon-S" style='color:#ffffff'></i>
                <ul class="menuieu">
                    <li><a id="aa" href="../patient/patient.php"> Patients </a> </li>
                    <li> <a id="aa" href="./firmier.php"> Nurses</a></li>
                    <li><a id="aa" href="../Parofil_docteur/profil.php">Profile </a> </li>
                    <li> <a href="../index/index1.html"><button>Log out</button></a></li>
                </ul>
            </div>
        </div>
    </header>





    <main class="gestion_P">
        <div class="header_T">
            <div class="all">All Nurses
            </div>
            <div class="ajouter">
                <div class="add">Add Nurse :</div>
                <i class='bx bx-plus'></i>
            </div>
        </div>
        <div class="scroll">

            <table class="hi">
                <tr class="HEADER">
                    <th>Full Name</th>
                    <th>Phone </th>
                    <th>Date of birth</th>
                    <th>Gmail</th>
                    <th>Work starting date</th>
                    <th class="action_D">Action</th>
                </tr>
                <tbody>
                    <?php foreach ($infirmieres as $infirmiere) { ?>
                    <tr>
                        <td class="a"><?php echo $infirmiere["nom"] . " " . $infirmiere["Prenom"]  ?></td>
                        <td class="b"><?php echo "0" . $infirmiere["NM"]  ?></td>
                        <td class="c"><?php echo $infirmiere["date_naissance"] ?></td>
                        <td class="d"><?php echo $infirmiere["Gmail"]  ?></td>
                        <td class="e"><?php echo $infirmiere["WorkStarting"]  ?></td>
                        <td class="action_BOttonat">
                            <form action=<?php echo "firmier.php?id=" . $infirmiere["id"]  ?> action="" method="post">
                                <input type="submit" class="but1" data-id="<?= $infirmiere["id"] ?>" name="modifier"
                                    value="update"></input>
                                <input type="hidden" name="id" value="<?php echo $infirmiere["id"] ?>">
                                <input type="submit" class="but2" name="delete" value="Delete"></input>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


            <table id="table_responsive">
                <?php foreach ($infirmieres as $infirmiere) { ?>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo $infirmiere["nom"] . " " . $infirmiere["Prenom"]  ?></td>
                </tr>
                <tr>
                    <th>phone</th>
                    <td><?php echo "0" . $infirmiere["NM"]  ?></td>
                </tr>
                <tr>
                    <th>Date of birth</th>
                    <td><?php echo $infirmiere["date_naissance"] ?></td>
                </tr>
                <tr>
                    <th>GMAIL</th>
                    <td><?php echo $infirmiere["Gmail"]  ?></td>
                </tr>
                <tr>
                    <th>Work starting date</th>
                    <td><?php echo $infirmiere["WorkStarting"]  ?></td>
                </tr>
                <td class="action_BOttonat">
                    <form action=<?php echo "firmier.php?id=" . $infirmiere["id"]  ?> action="" method="post">
                        <input type="submit" class="but1" data-id="<?= $infirmiere["id"] ?>" name="modifier"
                            value="update"></input>
                        <input type="hidden" name="id" value="<?php echo $infirmiere["id"] ?>">
                        <input type="submit" class="but2" name="delete" value="Delete"></input>
                    </form>
                </td>
                <?php } ?>
                <i class='bx bx-chevrons-down' style='color:#4fa8f0' id="flex"></i>
            </table>
        </div>

    </main>
    <div class="list">
        <div class="header_T">
            <div class="all">All Nurses</div>
            <div class="ajouter">
                <div class="add">Add Nurse :</div>
                <i class='bx bx-plus'></i>
            </div>
        </div>
        <table>
            <?php foreach ($infirmieres as $infirmiere) { ?>

            <tr class="ana">
                <th><?php echo $infirmiere["nom"] . " " . $infirmiere["Prenom"]  ?> <i class='bx bx-chevrons-up'
                        style='color:#4fa8f0'></i></th>
            </tr>
            <?php } ?>
        </table>
    </div>



    <div class="amin">
        <div class="popap">
            <div class="titleee">
                <div class="P_M">Profile Modification : </div>
                <i class='bx bx-x'></i>
            </div>

            <form action="" id="form" method="POST">
                <div class="input1">
                    <div><i class='bx bx-user'></i> <input type="text" name="new_name" id="" value=""
                            placeholder="Full Name" require></div>
                    <div> <input type="date" name="new_birth" id="" value="" placeholder="Date Of Birth" require></i>
                    </div>
                </div>
                <div class="input2">
                    <div><i class='bx bx-mobile-alt'></i> <input type="text" name="new_phone" id="" value=""
                            placeholder="Phone No" require></div>
                    <div> <input type="date" name="new_Work_starting_date" id="" value=""
                            placeholder="Date Of Work starting Date" require></div>
                </div>
                <div class="input3">
                    <div><i class='bx bxl-gmail'></i> <input type="email" name="new_Gmail" id="hahahi" value=""
                            placeholder="Your Email" require></div>
                    <input type="submit" id="brak" name="edite" value="AJOUTER">
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        $sql = " SELECT * FROM infirmieres where id like $id ";
        $resu = mysqli_query($conn, $sql);
        $infirmieres = mysqli_fetch_assoc($resu);
        $fullname = $infirmieres["nom"] . " " . $infirmieres["Prenom"];
        echo '
<div class="update_popap">
<div class="popap">
    <div class="titleee">
        <div class="P_M">Profile Modification : </div>
       <a href ="./firmier.php"> <i class="bx bx-x"></i></a>
    </div>
    <form action="" id="form" method="POST">
        <div class="input1">
            <div><i class="bx bx-user"></i> <input type="text" name="Nname" id="" value="' . $fullname . '" class="A1"></div>
            <div> <input type="date" name="Nbirth" id="" value=' . $infirmieres["date_naissance"] . ' class="A2"></i></div>
        </div>
        <div class="input2">
            <div><i class="bx bx-mobile-alt"></i> <input type="text" name="Nphone" id="" value=' . $infirmieres["NM"] . ' class="A3"></div>
            <div> <input type="date" name="NWork" id="" value='. $infirmieres["WorkStarting"] . '  class="A4"></div>
        </div>
        <div class="input3">
            <div><i class="bx bxl-gmail"></i> <input type="text" name="NGmail" id="hahahi" value=' . $infirmieres["Gmail"] . ' class="A5"></div>
            <input type="submit" id="brak" name="brakkk" value="UPDATE">
        </div>
    </form>
</div>
</div>
';
    }
    ?>













    <script src="./firmier.js"></script>
</body>

</html>