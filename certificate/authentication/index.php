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
<body >
    
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

<div>
    
        <div class="d-flex flex-row container">
            <div class="col-8">
                <div>
                    <span class="header">Name:</span>
                    <span class="pl-4"><?php echo $row['std_name'] ?></span>
                </div>
                <div>
                    <span class="header">Father’s/Guardian’s Name:</span>
                    <span class="pl-4"><?php echo $row['guardian_name'] ?></span>
                </div>
                <div>
                    <span class="header">Mother’s Name:</span>
                    <span class="pl-4"><?php echo $row['guardian_name'] ?></span>
                </div>
                <div>
                    <span class="header">Date of Birth:</span>
                    <span class="pl-4"><?php echo $row['dob'] ?></span>
                </div>
                <div>
                    <span class="header">Permanent Address:</span>
                    <span class="pl-4"><?php echo $row['address'] ?></span>
                </div>
                <div>
                    <span class="header">Degree Awarded:</span>
                    <span class="pl-4"><?php echo $row['degree_awarded'] ?></span>
                </div>
                <div>
                    <span class="header">Year of Passing:</span>
                    <span class="pl-4"><?php echo $row['session'] ?></span>
                </div>
                <div>
                    <span class="header">Certificate No.:</span>
                    <span class="pl-4"><?php echo $row['cer_no'] ?></span>
                </div>
                <div>
                    <span class="header">Department:</span>
                    <span class="pl-4"><?php echo $row['deptt'] ?></span>
                </div>
                <div>
                    <span class="header">Faculty:</span>
                    <span class="pl-4"><?php echo $row['std_name'] ?></span>
                </div>
                <div>
                    <span class="header">Registration No.:</span>
                    <span class="pl-4"><?php echo $row['std_name'] ?></span>
                </div>
                <div>
                    <span class="header">Year of Admission:</span>
                    <span class="pl-4"><?php echo $row['std_name'] ?></span>
                </div>
                <div>
                    <span class="header">Title of the Thesis:</span>
                    <span class="pl-4"><?php echo $row['std_name'] ?></span>
                </div>
            </div>
            <div class="col-4" style="padding-left: 250px;">
                <div id="id-photo">+ Add Photo</div>
            </div>
        </div>
        
    </div>
    <?php
        // echo "hello"
    ?>
</body>
</html>