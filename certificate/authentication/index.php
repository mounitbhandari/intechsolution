<!DOCTYPE html>
<html lang="en">
<head>
    <!-- http://127.0.0.1/intechsolution/certificate/authentication/index.php?uid=952670f23154851a95debe27a9aa8d48 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.scss" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!-- <style>
        #heading{
            text-align: center;
            font-size: 20px;
            font-weight: bolder;
        }
    </style> -->
</head>
<body id="body-div">
    <?php 
        function tableField($field, $name){
            $ans="";
            if(strlen($field)>0){
                $ans.= '<tr>';
                $ans.= '<td class="topic">';
                $ans.= $name;
                $ans.= '</td>';
                $ans.= '<td>';
                $ans.= $field;
                $ans.= '</td>';
                $ans.= '</tr>';
                echo  $ans;
            }
        }
    ?>
    
    <div id="heading">Bidhan Chandra Krishi Viswavidyalaya</div>
    <div id="heading2">Office of the Registrar (Examination Section)</div>
    <div id="heading3">Mohanpur, P.O. - Krishi Viswavidyalaya, Dist.- Nadia, West Bengal, India, PIN - 741252</div>
    <div id="heading4">Email: registrar@bckv.edu.in; Website: www.bckv.edu.in</div>
    <div id="imgDiv"><img src="Bidhan_Chandra_Krishi_Viswavidyalaya.svg.png" alt=""></div>
    <hr>
    <div class=" details-header">Details of the Degree Holder as per the University Record</div>
    
    <br>
    <?php 
        $uid =$_GET['uid'];
        // print($uid);
    ?>
    
      <?php
        $env = parse_ini_file('.env');
        $servername = $env["DB_HOST"];
        $username = $env["DB_USERNAME"];
        $password = $env["DB_PASSWORD"];
        $database = $env["DB_DATABASE"];
        
        // laravel_10_db is database
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        }
    ?> 
    <br>
    <?php
        // echo "fetching record<br>";
        $stmt = $conn->prepare("select * from certificate_data where uid=? LIMIT 1"); 
        $stmt->execute([$uid]); 
        //$row is a single array
        $row = $stmt->fetch();
        // echo $row['uid']."<br>";
        // print($row['regn_no']);
        // print($row['std_name']);
        // echo $row['uid'];
    ?>
    
    
    <div class="outer-div pl-5 pr-5">
        <div class="d-flex flex-row">
            <div class="col-8">
                <table>

                    <?php tableField($row['std_name'],"Name: "); ?>
                    <?php tableField($row['guardian_name'],"Father’s/Guardian’s Name: "); ?>
                    <?php tableField($row['guardian_name'],"Mother’s Name: "); ?>
                    <?php tableField($row['dob'],"Date of Birth: "); ?>
                    <?php tableField($row['address'],"Permanent Address: "); ?>
                    <?php tableField($row['degree_awarded'],"Degree Awarded: "); ?>
                    <?php tableField($row['session'],"Year of Passing: "); ?>
                    <?php tableField($row['cer_no'],"Certificate No.: "); ?>
                    <?php tableField($row['deptt'],"Department: "); ?>
                    <?php tableField($row['deptt'],"Faculty: "); ?>
                    <?php tableField($row['regn_no'],"Registration No.: "); ?>
                    <?php tableField($row['session'],"Year of Admission: "); ?>
                    <?php tableField($row['thesis_title'],"Title of the Thesis1: "); ?>
                    
                </table>
            </div>
            <div class="col-4" style="padding-left: 250px;">
                <div id="id-photo"><img src="pictures/<?php echo $row['photo_filename'] ?>" alt=""></div>
            </div>
        </div>
            
    </div>
    <?php
        // echo "hello"
    ?>
</body>
</html>